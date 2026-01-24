<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeTrip | Wallet & Agent Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #00a859;
            --primary-dark: #008f4c;
            --secondary: #f8b400;
            --dark: #1a1a1a;
            --light: #f8f9fa;
            --gray: #6c757d;
            --light-gray: #e9ecef;
            --danger: #e74c3c;
            --success: #2ecc71;
            --warning: #f39c12;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            --shadow-light: 0 2px 10px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s ease;
            --border-radius: 12px;
            --border-radius-sm: 8px;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: var(--shadow-light);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
        }

        .logo {
            display: flex;
            align-items: center;
            font-size: 26px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            margin-right: 8px;
            color: var(--secondary);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            font-size: 16px;
        }

        .user-role {
            font-size: 14px;
            color: var(--gray);
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
        }

        /* Main Layout */
        .dashboard-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 30px;
            margin-top: 30px;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-light);
            padding: 25px 0;
            height: fit-content;
            position: sticky;
            top: 90px;
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin-bottom: 5px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 25px;
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: var(--transition);
            border-left: 4px solid transparent;
        }

        .nav-link:hover {
            background-color: rgba(0, 168, 89, 0.05);
            color: var(--primary);
            border-left-color: var(--primary);
        }

        .nav-link.active {
            background-color: rgba(0, 168, 89, 0.1);
            color: var(--primary);
            border-left-color: var(--primary);
            font-weight: 600;
        }

        .nav-icon {
            width: 24px;
            margin-right: 15px;
            font-size: 18px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--border-radius);
            padding: 30px;
            color: white;
            box-shadow: var(--shadow);
        }

        .welcome-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .welcome-subtitle {
            opacity: 0.9;
            margin-bottom: 25px;
        }

        .balance-display {
            background-color: rgba(255, 255, 255, 0.15);
            border-radius: var(--border-radius-sm);
            padding: 20px;
            margin-top: 20px;
        }

        .balance-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .balance-amount {
            font-size: 32px;
            font-weight: 700;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .stat-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .stat-title {
            font-weight: 600;
            color: var(--gray);
            font-size: 15px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
        }

        .stat-icon.earnings {
            background-color: var(--primary);
        }

        .stat-icon.transactions {
            background-color: var(--secondary);
        }

        .stat-icon.agents {
            background-color: #3498db;
        }

        .stat-value {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-change {
            font-size: 14px;
            font-weight: 500;
        }

        .stat-change.positive {
            color: var(--success);
        }

        .stat-change.negative {
            color: var(--danger);
        }

        /* Quick Actions */
        .section-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
        }

        .action-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            text-align: center;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            cursor: pointer;
            border: 2px solid transparent;
        }

        .action-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
            border-color: var(--primary);
        }

        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: rgba(0, 168, 89, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
            color: var(--primary);
        }

        .action-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .action-desc {
            font-size: 14px;
            color: var(--gray);
        }

        /* Services Grid */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .service-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 25px;
            box-shadow: var(--shadow-light);
            transition: var(--transition);
            cursor: pointer;
            text-align: center;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow);
        }

        .service-icon {
            font-size: 32px;
            margin-bottom: 15px;
            color: var(--primary);
        }

        .service-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .service-desc {
            font-size: 14px;
            color: var(--gray);
        }

        /* Recent Transactions */
        .transactions-table {
            background-color: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--shadow-light);
        }

        .table-header {
            padding: 20px 25px;
            border-bottom: 1px solid var(--light-gray);
            font-weight: 600;
            font-size: 18px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-all {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 15px;
        }

        .table-content {
            padding: 0;
        }

        .transaction-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 25px;
            border-bottom: 1px solid var(--light-gray);
            transition: var(--transition);
        }

        .transaction-item:hover {
            background-color: rgba(0, 168, 89, 0.03);
        }

        .transaction-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .transaction-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
        }

        .transaction-icon.received {
            background-color: var(--success);
        }

        .transaction-icon.sent {
            background-color: var(--warning);
        }

        .transaction-icon.payment {
            background-color: #3498db;
        }

        .transaction-details h4 {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .transaction-details p {
            font-size: 14px;
            color: var(--gray);
        }

        .transaction-amount {
            font-weight: 600;
            font-size: 18px;
        }

        .transaction-amount.received {
            color: var(--success);
        }

        .transaction-amount.sent {
            color: var(--danger);
        }

        /* SafeTrip Link Section */
        .SafeTrip-link-card {
            background: linear-gradient(135deg, #f8b400 0%, #e6a800 100%);
            border-radius: var(--border-radius);
            padding: 30px;
            color: var(--dark);
            box-shadow: var(--shadow);
            margin-bottom: 30px;
        }

        .link-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .link-subtitle {
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .link-input-group {
            display: flex;
            margin-top: 20px;
        }

        .link-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            border-radius: var(--border-radius-sm) 0 0 var(--border-radius-sm);
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.9);
        }

        .link-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 0 var(--border-radius-sm) var(--border-radius-sm) 0;
            padding: 0 25px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
        }

        .link-btn:hover {
            background-color: var(--primary-dark);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 2000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            border-radius: var(--border-radius);
            width: 90%;
            max-width: 500px;
            padding: 30px;
            box-shadow: var(--shadow);
            animation: modalFade 0.3s;
        }

        @keyframes modalFade {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 22px;
            font-weight: 600;
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--gray);
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            margin-top: 60px;
            padding: 50px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links a {
            color: #bbb;
            text-decoration: none;
            transition: var(--transition);
        }

        .footer-links a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 14px;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .dashboard-layout {
                grid-template-columns: 1fr;
            }

            .sidebar {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }

            .user-profile {
                flex-direction: column;
                text-align: center;
            }

            .user-info {
                text-align: center;
            }

            .welcome-title {
                font-size: 20px;
            }

            .balance-amount {
                font-size: 26px;
            }

            .link-input-group {
                flex-direction: column;
            }

            .link-input {
                border-radius: var(--border-radius-sm);
                margin-bottom: 10px;
            }

            .link-btn {
                border-radius: var(--border-radius-sm);
                padding: 15px;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .container {
                padding: 0 15px;
            }

            .stats-grid, .actions-grid, .services-grid {
                grid-template-columns: 1fr;
            }

            .transaction-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .transaction-amount {
                align-self: flex-end;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-motorcycle"></i> SafeTrip
                </a>
                
                <div class="user-profile">
                    <div class="user-info">
                        <div class="user-name">My Wallet</div>
                        <div class="user-role">Agent Dashboard</div>
                    </div>
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="dashboard-layout">
            <!-- Sidebar -->
            <aside class="sidebar">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <div class="nav-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            Find Agent
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-wallet"></i>
                            </div>
                            My Wallet
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-exchange-alt"></i>
                            </div>
                            Transactions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-cog"></i>
                            </div>
                            Settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            Send Money
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <div class="nav-icon">
                                <i class="fas fa-credit-card"></i>
                            </div>
                            Pay Bills
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Main Content Area -->
            <main class="main-content">
                <!-- Welcome Card -->
                <section class="welcome-card">
                    <h2 class="welcome-title">Welcome back, Agent!</h2>
                    <p class="welcome-subtitle">Manage your earnings, find agents, and process transactions all in one place.</p>
                    
                    <div class="balance-display">
                        <div class="balance-label">Current Balance</div>
                        <div class="balance-amount">UGX 1,450,000</div>
                    </div>
                </section>

                <!-- Stats Overview -->
                <section>
                    <h3 class="section-title">Overview</h3>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-header">
                                <h4 class="stat-title">Earnings (Today)</h4>
                                <div class="stat-icon earnings">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                            </div>
                            <div class="stat-value">UGX 124,500</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 12.5% from yesterday
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <h4 class="stat-title">Transactions</h4>
                                <div class="stat-icon transactions">
                                    <i class="fas fa-exchange-alt"></i>
                                </div>
                            </div>
                            <div class="stat-value">47</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 8.2% from last week
                            </div>
                        </div>
                        
                        <div class="stat-card">
                            <div class="stat-header">
                                <h4 class="stat-title">Active Agents</h4>
                                <div class="stat-icon agents">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="stat-value">1,247</div>
                            <div class="stat-change positive">
                                <i class="fas fa-arrow-up"></i> 3.1% this month
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Quick Actions -->
                <section>
                    <h3 class="section-title">Quick Actions</h3>
                    <div class="actions-grid">
                        <div class="action-card" onclick="openModal('sendMoneyModal')">
                            <div class="action-icon">
                                <i class="fas fa-paper-plane"></i>
                            </div>
                            <h4 class="action-title">Send Money</h4>
                            <p class="action-desc">Transfer to any mobile wallet</p>
                        </div>
                        
                        <div class="action-card" onclick="openModal('payBillsModal')">
                            <div class="action-icon">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                            <h4 class="action-title">Pay Bills</h4>
                            <p class="action-desc">Utilities, TV, internet & more</p>
                        </div>
                        
                        <div class="action-card" onclick="openModal('deliveryModal')">
                            <div class="action-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <h4 class="action-title">Deliver Package</h4>
                            <p class="action-desc">Send items across the city</p>
                        </div>
                        
                        <div class="action-card" onclick="openModal('airtimeModal')">
                            <div class="action-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h4 class="action-title">Airtime & Data</h4>
                            <p class="action-desc">Top up any phone number</p>
                        </div>
                    </div>
                </section>

                <!-- SafeBoda Link Section -->
                <section class="safeboda-link-card">
                    <h3 class="link-title">SafeBoda Link</h3>
                    <p class="link-subtitle">Share your SafeBoda link to receive payments directly from customers.</p>
                    
                    <div class="link-input-group">
                        <input type="text" class="link-input" value="https://safeboda.com/pay/agent-1247" id="safebodaLink" readonly>
                        <button class="link-btn" onclick="copyLink()">
                            <i class="fas fa-copy"></i> Copy Link
                        </button>
                    </div>
                </section>

                <!-- Services -->
                <section>
                    <h3 class="section-title">Services</h3>
                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <h4 class="service-title">Deliver Package</h4>
                            <p class="service-desc">Fast and reliable package delivery</p>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-file-invoice"></i>
                            </div>
                            <h4 class="service-title">Pay Bills</h4>
                            <p class="service-desc">Utilities, TV, internet & more</p>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-plane"></i>
                            </div>
                            <h4 class="service-title">Airlines & Travel</h4>
                            <p class="service-desc">Book flights & bus tickets</p>
                        </div>
                        
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-wifi"></i>
                            </div>
                            <h4 class="service-title">Internet & Data</h4>
                            <p class="service-desc">Broadband and mobile data</p>
                        </div>
                    </div>
                </section>

                <!-- Recent Transactions -->
                <section>
                    <div class="transactions-table">
                        <div class="table-header">
                            <h3>Recent Transactions</h3>
                            <a href="#" class="view-all">View All</a>
                        </div>
                        
                        <div class="table-content">
                            <div class="transaction-item">
                                <div class="transaction-info">
                                    <div class="transaction-icon received">
                                        <i class="fas fa-download"></i>
                                    </div>
                                    <div class="transaction-details">
                                        <h4>Payment Received</h4>
                                        <p>From John Doe • Today, 10:24 AM</p>
                                    </div>
                                </div>
                                <div class="transaction-amount received">
                                    + UGX 25,000
                                </div>
                            </div>
                            
                            <div class="transaction-item">
                                <div class="transaction-info">
                                    <div class="transaction-icon sent">
                                        <i class="fas fa-upload"></i>
                                    </div>
                                    <div class="transaction-details">
                                        <h4>Money Sent</h4>
                                        <p>To Mary Smith • Yesterday, 3:45 PM</p>
                                    </div>
                                </div>
                                <div class="transaction-amount sent">
                                    - UGX 15,000
                                </div>
                            </div>
                            
                            <div class="transaction-item">
                                <div class="transaction-info">
                                    <div class="transaction-icon payment">
                                        <i class="fas fa-bolt"></i>
                                    </div>
                                    <div class="transaction-details">
                                        <h4>Electricity Bill</h4>
                                        <p>UMEME Payment • Dec 10, 2025</p>
                                    </div>
                                </div>
                                <div class="transaction-amount sent">
                                    - UGX 42,300
                                </div>
                            </div>
                            
                            <div class="transaction-item">
                                <div class="transaction-info">
                                    <div class="transaction-icon received">
                                        <i class="fas fa-download"></i>
                                    </div>
                                    <div class="transaction-details">
                                        <h4>Package Delivery</h4>
                                        <p>Delivery payment • Dec 9, 2025</p>
                                    </div>
                                </div>
                                <div class="transaction-amount received">
                                    + UGX 12,000
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Modals -->
    <!-- Send Money Modal -->
    <div class="modal" id="sendMoneyModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Send Money</h3>
                <button class="close-modal" onclick="closeModal('sendMoneyModal')">&times;</button>
            </div>
            <form id="sendMoneyForm">
                <div class="form-group">
                    <label for="recipient">Recipient Phone Number</label>
                    <input type="tel" id="recipient" class="form-control" placeholder="Enter phone number" required>
                </div>
                <div class="form-group">
                    <label for="amount">Amount (UGX)</label>
                    <input type="number" id="amount" class="form-control" placeholder="Enter amount" required>
                </div>
                <div class="form-group">
                    <label for="network">Mobile Network</label>
                    <select id="network" class="form-control">
                        <option value="mtn">MTN</option>
                        <option value="airtel">Airtel</option>
                        <option value="africell">Africell</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; margin-top: 20px;">
                    <i class="fas fa-paper-plane"></i> Send Money
                </button>
            </form>
        </div>
    </div>

    <!-- Pay Bills Modal -->
    <div class="modal" id="payBillsModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Pay Bills</h3>
                <button class="close-modal" onclick="closeModal('payBillsModal')">&times;</button>
            </div>
            <form id="payBillsForm">
                <div class="form-group">
                    <label for="billType">Bill Type</label>
                    <select id="billType" class="form-control">
                        <option value="electricity">Electricity (UMEME)</option>
                        <option value="water">Water (NWSC)</option>
                        <option value="tv">TV Subscription (DSTV, GOtv)</option>
                        <option value="internet">Internet</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="accountNumber">Account Number</label>
                    <input type="text" id="accountNumber" class="form-control" placeholder="Enter account number" required>
                </div>
                <div class="form-group">
                    <label for="billAmount">Amount (UGX)</label>
                    <input type="number" id="billAmount" class="form-control" placeholder="Enter amount" required>
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; margin-top: 20px;">
                    <i class="fas fa-file-invoice-dollar"></i> Pay Bill
                </button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>SafeTrip</h3>
                    <ul class="footer-links">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Services</h3>
                    <ul class="footer-links">
                        <li><a href="#">Rides</a></li>
                        <li><a href="#">Wallet</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Airtime & Data</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Support</h3>
                    <ul class="footer-links">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Safety</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Download App</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fab fa-google-play"></i> Google Play</a></li>
                        <li><a href="#"><i class="fab fa-app-store"></i> App Store</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2025 SafeTrip. All rights reserved. | Designed for Uganda's digital economy</p>
            </div>
        </div>
    </footer>

    <script>
        // Modal Functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'flex';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }

        // Copy SafeBoda Link
        function copyLink() {
            const linkInput = document.getElementById('safebodaLink');
            linkInput.select();
            linkInput.setSelectionRange(0, 99999); // For mobile devices
            
            navigator.clipboard.writeText(linkInput.value)
                .then(() => {
                    const originalText = linkInput.nextElementSibling.innerHTML;
                    linkInput.nextElementSibling.innerHTML = '<i class="fas fa-check"></i> Copied!';
                    
                    setTimeout(() => {
                        linkInput.nextElementSibling.innerHTML = originalText;
                    }, 2000);
                })
                .catch(err => {
                    console.error('Failed to copy: ', err);
                });
        }

        // Form Submissions
        document.getElementById('sendMoneyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const recipient = document.getElementById('recipient').value;
            const amount = document.getElementById('amount').value;
            
            alert(`UGX ${amount} sent successfully to ${recipient}!`);
            closeModal('sendMoneyModal');
            this.reset();
        });

        document.getElementById('payBillsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const billType = document.getElementById('billType').value;
            const account = document.getElementById('accountNumber').value;
            const amount = document.getElementById('billAmount').value;
            
            alert(`Bill payment of UGX ${amount} for ${billType} (Account: ${account}) successful!`);
            closeModal('payBillsModal');
            this.reset();
        });

        // Update transaction items on click
        document.querySelectorAll('.transaction-item').forEach(item => {
            item.addEventListener('click', function() {
                const title = this.querySelector('h4').textContent;
                const amount = this.querySelector('.transaction-amount').textContent;
                const details = this.querySelector('p').textContent;
                
                alert(`Transaction Details:\n\n${title}\n${details}\nAmount: ${amount}`);
            });
        });

        // Sidebar navigation active state
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                this.classList.add('active');
                
                // In a real app, this would load the corresponding page content
                const pageTitle = this.textContent.trim();
                document.querySelector('.welcome-title').textContent = `Welcome to ${pageTitle}`;
            });
        });
    </script>
</body>
</html>