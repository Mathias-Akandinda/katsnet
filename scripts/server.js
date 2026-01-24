require('dotenv').config();
const express = require('express');
const axios = require('axios');
const crypto = require('crypto');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());

const FLW_SECRET = process.env.FLW_SECRET_KEY;
const PORT = process.env.PORT || 3000;

// Helper: generate unique tx ref
function txRef() { return 'tx_' + Date.now(); }

// 1) Endpoint to initiate payment
app.post('/api/pay', async (req, res) => {
  try {
    const { phone, operator, amount } = req.body;
    if (!phone || !amount || !operator) return res.status(400).json({ message: 'Missing fields' });

    // Flutterwave expects phone in format without leading 0? (can accept both) — include customer phone
    const tx_ref = txRef();

    const payload = {
      tx_ref,
      amount: String(amount),
      currency: "UGX",
      network: operator,        // for some aggregators; Flutterwave may use "provider" field or infer by phone
      redirect_url: `${process.env.BASE_URL}/payment-complete`,
      customer: {
        email: "customer@example.com",
        phonenumber: phone,
        name: "Customer"
      },
      meta: { product: "internet_bundle" },
      // type/option depends on aggregator; for Flutterwave use type=mobile_money_uganda in the endpoint URL
    };

    // Use Flutterwave's charge endpoint for Uganda Mobile Money
    // Note: Flutterwave uses a single endpoint with query param ?type=mobile_money_uganda
    const resp = await axios.post('https://api.flutterwave.com/v3/charges?type=mobile_money_uganda', payload, {
      headers: { Authorization: `Bearer ${FLW_SECRET}`, 'Content-Type': 'application/json' }
    });

    const data = resp.data;
    // Data typically contains status and a message telling the user to expect an OTP/STK prompt
    // Save tx_ref in DB here (omitted)
    return res.json({ message: data.message || 'Payment initiated', data });
  } catch (err) {
    console.error(err?.response?.data || err.message || err);
    return res.status(500).json({ message: 'Server error', error: err?.response?.data || err.message });
  }
});

// 2) Webhook to receive verification of payment (configure this URL in your provider dashboard)
app.post('/webhook', (req, res) => {
  // Some providers sign the webhook payload. For Flutterwave you can verify signature
  // Example: verify using FLW_SECRET or provided signature header if given
  // Minimal: accept and process
  console.log('Webhook received', req.body);

  // TODO: verify event signature, then update order/payment status in DB
  res.status(200).send('ok');
});

app.listen(PORT, () => console.log(`Server running on ${PORT}`));
