<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafeTrip | Book a Ride</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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
            --border-radius: 16px;
            --border-radius-sm: 10px;
        }

        body {
            background-color: #f5f7fa;
            color: var(--dark);
            line-height: 1.6;
            overflow-x: hidden;
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

        .time-display {
            font-size: 14px;
            color: var(--gray);
            font-weight: 500;
            background-color: var(--light-gray);
            padding: 8px 15px;
            border-radius: 20px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 15px;
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
        .booking-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            margin-top: 30px;
            min-height: calc(100vh - 120px);
        }

        @media (max-width: 1024px) {
            .booking-layout {
                grid-template-columns: 1fr;
            }
        }

        /* Left Panel - Booking Form */
        .booking-panel {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 30px;
            height: fit-content;
        }

        .panel-title {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .panel-title i {
            color: var(--primary);
        }

        /* Location Inputs */
        .location-inputs {
            margin-bottom: 30px;
        }

        .input-group {
            background-color: var(--light);
            border-radius: var(--border-radius-sm);
            padding: 20px;
            margin-bottom: 15px;
            border: 2px solid transparent;
            transition: var(--transition);
            position: relative;
        }

        .input-group:focus-within {
            border-color: var(--primary);
            background-color: white;
        }

        .input-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--gray);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .location-icon {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .location-icon.pickup {
            background-color: var(--success);
        }

        .location-icon.dropoff {
            background-color: var(--danger);
        }

        .location-input {
            flex: 1;
            border: none;
            background: transparent;
            font-size: 16px;
            font-weight: 500;
            color: var(--dark);
            outline: none;
        }

        .location-input::placeholder {
            color: #aaa;
        }

        .current-location-btn {
            background-color: rgba(0, 168, 89, 0.1);
            border: none;
            color: var(--primary);
            font-size: 14px;
            font-weight: 600;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .current-location-btn:hover {
            background-color: rgba(0, 168, 89, 0.2);
        }

        .current-location-btn i {
            margin-right: 5px;
        }

        /* Suggested Locations */
        .suggested-locations {
            margin-top: 20px;
        }

        .suggested-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
            color: var(--dark);
        }

        .location-list {
            list-style: none;
        }

        .location-item {
            padding: 15px;
            border-radius: var(--border-radius-sm);
            margin-bottom: 10px;
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .location-item:hover {
            background-color: rgba(0, 168, 89, 0.05);
            border-color: var(--primary);
            transform: translateX(5px);
        }

        .location-item i {
            color: var(--primary);
            font-size: 18px;
        }

        /* Ride Options */
        .ride-options {
            margin-bottom: 30px;
        }

        .options-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
        }

        .options-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
        }

        .ride-option {
            background-color: white;
            border: 2px solid var(--light-gray);
            border-radius: var(--border-radius-sm);
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
        }

        .ride-option:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-light);
        }

        .ride-option.selected {
            border-color: var(--primary);
            background-color: rgba(0, 168, 89, 0.05);
        }

        .ride-icon {
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--primary);
        }

        .ride-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .ride-price {
            font-weight: 700;
            color: var(--dark);
            font-size: 18px;
        }

        .ride-duration {
            font-size: 14px;
            color: var(--gray);
            margin-top: 5px;
        }

        .popular-badge {
            position: absolute;
            top: -10px;
            right: 10px;
            background-color: var(--secondary);
            color: var(--dark);
            font-size: 12px;
            font-weight: 600;
            padding: 3px 10px;
            border-radius: 10px;
        }

        /* Pricing Breakdown */
        .pricing-breakdown {
            background-color: var(--light);
            border-radius: var(--border-radius-sm);
            padding: 25px;
            margin-bottom: 30px;
        }

        .pricing-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            color: var(--dark);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .distance-display {
            font-size: 14px;
            color: var(--gray);
            font-weight: 500;
            background-color: rgba(0, 0, 0, 0.05);
            padding: 5px 15px;
            border-radius: 20px;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .price-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .price-label {
            color: var(--gray);
        }

        .price-value {
            font-weight: 600;
        }

        .price-total {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 2px solid rgba(0, 0, 0, 0.1);
            font-size: 20px;
            font-weight: 700;
        }

        .total-label {
            color: var(--dark);
        }

        .total-value {
            color: var(--primary);
        }

        /* Action Buttons */
        .action-buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            flex: 1;
            padding: 18px;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 168, 89, 0.3);
        }

        .btn-secondary {
            background-color: white;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-secondary:hover {
            background-color: rgba(0, 168, 89, 0.05);
            transform: translateY(-3px);
        }

        /* Right Panel - Map */
        .map-panel {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        .map-header {
            padding: 25px 30px;
            border-bottom: 1px solid var(--light-gray);
        }

        .map-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .map-title i {
            color: var(--primary);
        }

        .map-container {
            flex: 1;
            min-height: 500px;
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        .map-overlay {
            position: absolute;
            bottom: 30px;
            left: 30px;
            right: 30px;
            background-color: white;
            border-radius: var(--border-radius-sm);
            padding: 20px;
            box-shadow: var(--shadow);
            z-index: 1000;
        }

        .overlay-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--dark);
        }

        .eta-display {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .eta-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .eta-icon {
            width: 40px;
            height: 40px;
            background-color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
        }

        .eta-text {
            font-weight: 600;
        }

        .eta-value {
            font-size: 22px;
            font-weight: 700;
            color: var(--primary);
        }

        /* Ride Confirmation Modal */
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
            padding: 20px;
        }

        .modal-content {
            background-color: white;
            border-radius: var(--border-radius);
            width: 100%;
            max-width: 500px;
            padding: 30px;
            box-shadow: var(--shadow);
            animation: modalFade 0.3s;
            position: relative;
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
            color: var(--dark);
        }

        .close-modal {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--gray);
        }

        .driver-info {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
            padding-bottom: 25px;
            border-bottom: 1px solid var(--light-gray);
        }

        .driver-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary);
        }

        .driver-details h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .driver-rating {
            color: var(--secondary);
            margin-bottom: 8px;
        }

        .driver-vehicle {
            color: var(--gray);
            font-size: 14px;
        }

        .ride-details {
            margin-bottom: 30px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .detail-label {
            color: var(--gray);
        }

        .detail-value {
            font-weight: 600;
        }

        .track-ride-btn {
            width: 100%;
            padding: 18px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: var(--border-radius-sm);
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .track-ride-btn:hover {
            background-color: var(--primary-dark);
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
        @media (max-width: 768px) {
            .booking-panel {
                padding: 20px;
            }

            .panel-title {
                font-size: 20px;
            }

            .options-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .action-buttons {
                flex-direction: column;
            }

            .map-header {
                padding: 20px;
            }

            .map-overlay {
                left: 20px;
                right: 20px;
                bottom: 20px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .options-grid {
                grid-template-columns: 1fr;
            }

            .eta-display {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }

            .ride-option {
                padding: 15px;
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
                
                <div class="time-display">
                    <i class="far fa-clock"></i> <span id="currentTime">9:04 AM</span>
                </div>
                
                <div class="user-profile">
                    <div class="user-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="booking-layout">
            <!-- Left Panel - Booking Form -->
            <div class="booking-panel">
                <h2 class="panel-title">
                    <i class="fas fa-map-marker-alt"></i> Book Your Ride
                </h2>

                <!-- Location Inputs -->
                <div class="location-inputs">
                    <div class="input-group">
                        <label class="input-label">Pick Up</label>
                        <div class="input-content">
                            <div class="location-icon pickup">
                                <i class="fas fa-circle"></i>
                            </div>
                            <input type="text" class="location-input" id="pickupInput" placeholder="Your current location" value="Ssendawula Amos, Road, Kampala, Central Region, Uganda">
                            <button class="current-location-btn" id="useCurrentLocation">
                                <i class="fas fa-crosshairs"></i> Use Current
                            </button>
                        </div>
                    </div>

                    <div class="input-group">
                        <label class="input-label">Where To</label>
                        <div class="input-content">
                            <div class="location-icon dropoff">
                                <i class="fas fa-map-pin"></i>
                            </div>
                            <input type="text" class="location-input" id="destinationInput" placeholder="Type or select location">
                        </div>
                    </div>

                    <!-- Suggested Locations -->
                    <div class="suggested-locations">
                        <h4 class="suggested-title">Popular Destinations</h4>
                        <ul class="location-list" id="suggestedLocations">
                            <li class="location-item" data-location="JP Plaza, Nasser Road, Kampala, Uganda">
                                <i class="fas fa-building"></i>
                                <div>JP Plaza, Nasser Road, Kampala, Uganda</div>
                            </li>
                            <li class="location-item" data-location="Madhvani Group Of Companies, Kampala, Uganda">
                                <i class="fas fa-industry"></i>
                                <div>Madhvani Group Of Companies, Kampala, Uganda</div>
                            </li>
                            <li class="location-item" data-location="Mash poa parcel office, Rubaga Road, Kampala, Uganda">
                                <i class="fas fa-box-open"></i>
                                <div>Mash poa parcel office, Rubaga Road, Kampala, Uganda</div>
                            </li>
                            <li class="location-item" data-location="Lohana Complex, Lugogo By-Pass, Kampala, Uganda">
                                <i class="fas fa-store"></i>
                                <div>Lohana Complex, Lugogo By-Pass, Kampala, Uganda</div>
                            </li>
                            <li class="location-item" data-location="Ssendawula Amos, Road, Kampala, Central Region, Uganda">
                                <i class="fas fa-home"></i>
                                <div>Ssendawula Amos, Road, Kampala, Central Region, Uganda</div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Ride Options -->
                <div class="ride-options">
                    <h4 class="options-title">Choose Your Ride</h4>
                    <div class="options-grid" id="rideOptions">
                        <div class="ride-option" data-type="boda" data-price="2500">
                            <div class="ride-icon">
                                <i class="fas fa-motorcycle"></i>
                            </div>
                            <div class="ride-name">Boda Boda</div>
                            <div class="ride-price">UGX 2,500</div>
                            <div class="ride-duration">5-10 mins</div>
                        </div>
                        
                        <div class="ride-option selected" data-type="premium" data-price="4500">
                            <div class="ride-icon">
                                <i class="fas fa-motorcycle"></i>
                                <i class="fas fa-crown" style="font-size: 14px; color: var(--secondary); position: absolute; top: 10px; right: 10px;"></i>
                            </div>
                            <div class="ride-name">Premium Boda</div>
                            <div class="ride-price">UGX 4,500</div>
                            <div class="ride-duration">5-10 mins</div>
                            <div class="popular-badge">Popular</div>
                        </div>
                        
                        <div class="ride-option" data-type="delivery" data-price="3500">
                            <div class="ride-icon">
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="ride-name">Package Delivery</div>
                            <div class="ride-price">UGX 3,500</div>
                            <div class="ride-duration">10-15 mins</div>
                        </div>
                        
                        <div class="ride-option" data-type="express" data-price="6000">
                            <div class="ride-icon">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="ride-name">Express Delivery</div>
                            <div class="ride-price">UGX 6,000</div>
                            <div class="ride-duration">3-7 mins</div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Breakdown -->
                <div class="pricing-breakdown">
                    <div class="pricing-title">
                        <span>Trip Estimate</span>
                        <span class="distance-display" id="distanceDisplay">2.5 km • 8 mins</span>
                    </div>
                    
                    <div class="price-item">
                        <span class="price-label">Base Fare</span>
                        <span class="price-value" id="baseFare">UGX 1,500</span>
                    </div>
                    
                    <div class="price-item">
                        <span class="price-label">Distance (2.5 km)</span>
                        <span class="price-value" id="distanceFare">UGX 1,000</span>
                    </div>
                    
                    <div class="price-item">
                        <span class="price-label">Service Fee</span>
                        <span class="price-value">UGX 500</span>
                    </div>
                    
                    <div class="price-item">
                        <span class="price-label">SafeTrip Insurance</span>
                        <span class="price-value">UGX 300</span>
                    </div>
                    
                    <div class="price-total">
                        <span class="total-label">Total</span>
                        <span class="total-value" id="totalFare">UGX 3,300</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn btn-secondary" id="calculatePriceBtn">
                        <i class="fas fa-calculator"></i> Calculate Price
                    </button>
                    <button class="btn btn-primary" id="confirmRideBtn">
                        <i class="fas fa-motorcycle"></i> Confirm Ride
                    </button>
                </div>
            </div>

            <!-- Right Panel - Map -->
            <div class="map-panel">
                <div class="map-header">
                    <h3 class="map-title">
                        <i class="fas fa-map"></i> Your Route Map
                    </h3>
                </div>
                
                <div class="map-container">
                    <div id="map"></div>
                    
                    <div class="map-overlay">
                        <h4 class="overlay-title">Estimated Arrival</h4>
                        <div class="eta-display">
                            <div class="eta-info">
                                <div class="eta-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <div class="eta-text">Rider will arrive in</div>
                                    <div class="eta-value" id="etaValue">5 min</div>
                                </div>
                            </div>
                            <div>
                                <div class="eta-text">Nearest rider</div>
                                <div class="eta-value">0.8 km</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ride Confirmation Modal -->
    <div class="modal" id="rideConfirmationModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ride Confirmed!</h3>
                <button class="close-modal" onclick="closeModal()">&times;</button>
            </div>
            
            <div class="driver-info">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Driver" class="driver-avatar">
                <div class="driver-details">
                    <h3>David M.</h3>
                    <div class="driver-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7</span>
                    </div>
                    <div class="driver-vehicle">
                        <i class="fas fa-motorcycle"></i> Yamaha • Black/Green • KMC 123A
                    </div>
                </div>
            </div>
            
            <div class="ride-details">
                <div class="detail-item">
                    <span class="detail-label">Pickup:</span>
                    <span class="detail-value" id="confirmPickup">Ssendawula Amos, Road, Kampala</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Destination:</span>
                    <span class="detail-value" id="confirmDestination">JP Plaza, Nasser Road, Kampala</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Ride Type:</span>
                    <span class="detail-value" id="confirmRideType">Premium Boda</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Total Fare:</span>
                    <span class="detail-value" id="confirmTotalFare">UGX 4,500</span>
                </div>
                <div class="detail-item">
                    <span class="detail-label">Estimated Arrival:</span>
                    <span class="detail-value">5 minutes</span>
                </div>
            </div>
            
            <button class="track-ride-btn" onclick="startTracking()">
                <i class="fas fa-map-marker-alt"></i> Track Your Ride
            </button>
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
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">Wallet</a></li>
                        <li><a href="#">Business</a></li>
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
                <p>&copy; 2025 SafeTrip. All rights reserved. | Your safety is our priority</p>
            </div>
        </div>
    </footer>

    <!-- Leaflet JS for Map -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Initialize real-time clock
        function updateTime() {
            const now = new Date();
            let hours = now.getHours();
            let minutes = now.getMinutes();
            const ampm = hours >= 12 ? 'PM' : 'AM';
            
            hours = hours % 12;
            hours = hours ? hours : 12;
            minutes = minutes < 10 ? '0' + minutes : minutes;
            
            document.getElementById('currentTime').textContent = `${hours}:${minutes} ${ampm}`;
        }
        
        // Update time every minute
        updateTime();
        setInterval(updateTime, 60000);

        // Initialize Map
        let map;
        let userMarker, destinationMarker;
        let routeLine;
        
        function initMap() {
            // Default coordinates for Kampala, Uganda
            const kampalaCoords = [0.3136, 32.5811];
            
            // Initialize map
            map = L.map('map').setView(kampalaCoords, 13);
            
            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            // Add user location marker (default)
            userMarker = L.marker(kampalaCoords, {
                icon: L.divIcon({
                    className: 'user-marker',
                    html: '<div style="background-color: #2ecc71; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 0 10px rgba(0,0,0,0.3);"></div>',
                    iconSize: [26, 26],
                    iconAnchor: [13, 13]
                })
            }).addTo(map);
            
            // Bind popup to user marker
            userMarker.bindPopup("<b>Your Location</b><br>Ssendawula Amos, Road, Kampala").openPopup();
            
            // Add sample destination marker (JP Plaza)
            const destinationCoords = [0.3163, 32.5822];
            destinationMarker = L.marker(destinationCoords, {
                icon: L.divIcon({
                    className: 'destination-marker',
                    html: '<div style="background-color: #e74c3c; width: 20px; height: 20px; border-radius: 50%; border: 3px solid white; box-shadow: 0 0 10px rgba(0,0,0,0.3);"></div>',
                    iconSize: [26, 26],
                    iconAnchor: [13, 13]
                })
            }).addTo(map);
            
            destinationMarker.bindPopup("<b>Destination</b><br>JP Plaza, Nasser Road, Kampala");
            
            // Draw a sample route line
            routeLine = L.polyline([kampalaCoords, destinationCoords], {
                color: '#00a859',
                weight: 5,
                opacity: 0.7,
                dashArray: '10, 10'
            }).addTo(map);
            
            // Fit map to show both markers
            map.fitBounds([kampalaCoords, destinationCoords]);
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', initMap);

        // Use Current Location Button
        document.getElementById('useCurrentLocation').addEventListener('click', function() {
            if (navigator.geolocation) {
                // Show loading state
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Detecting...';
                this.disabled = true;
                
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        
                        // Update map view
                        map.setView([lat, lng], 15);
                        
                        // Update user marker
                        if (userMarker) {
                            userMarker.setLatLng([lat, lng]);
                            userMarker.bindPopup("<b>Your Current Location</b><br>Detected via GPS").openPopup();
                        }
                        
                        // Update pickup input with approximate address
                        document.getElementById('pickupInput').value = "Your current location (GPS)";
                        
                        // Update button
                        document.getElementById('useCurrentLocation').innerHTML = '<i class="fas fa-check"></i> Location Set';
                        document.getElementById('useCurrentLocation').style.backgroundColor = '#2ecc71';
                        document.getElementById('useCurrentLocation').style.color = 'white';
                        
                        // Re-enable button after 3 seconds
                        setTimeout(() => {
                            document.getElementById('useCurrentLocation').innerHTML = '<i class="fas fa-crosshairs"></i> Use Current';
                            document.getElementById('useCurrentLocation').style.backgroundColor = '';
                            document.getElementById('useCurrentLocation').style.color = '';
                            document.getElementById('useCurrentLocation').disabled = false;
                        }, 3000);
                        
                        // Recalculate pricing
                        calculatePrice();
                    },
                    function(error) {
                        // Handle error
                        alert("Unable to retrieve your location. Please enter your location manually.");
                        document.getElementById('useCurrentLocation').innerHTML = '<i class="fas fa-crosshairs"></i> Use Current';
                        document.getElementById('useCurrentLocation').disabled = false;
                    }
                );
            } else {
                alert("Geolocation is not supported by your browser. Please enter your location manually.");
            }
        });

        // Suggested location click handler
        document.querySelectorAll('.location-item').forEach(item => {
            item.addEventListener('click', function() {
                const location = this.getAttribute('data-location');
                document.getElementById('destinationInput').value = location;
                
                // Highlight selected location
                document.querySelectorAll('.location-item').forEach(i => i.style.backgroundColor = '');
                this.style.backgroundColor = 'rgba(0, 168, 89, 0.1)';
                
                // Update destination marker on map
                if (destinationMarker) {
                    // Move marker slightly for visual feedback
                    const currentLatLng = destinationMarker.getLatLng();
                    destinationMarker.setLatLng([currentLatLng.lat + 0.001, currentLatLng.lng + 0.001]);
                    
                    setTimeout(() => {
                        destinationMarker.setLatLng(currentLatLng);
                    }, 300);
                    
                    destinationMarker.bindPopup(`<b>Destination</b><br>${location}`).openPopup();
                }
                
                // Recalculate pricing
                calculatePrice();
            });
        });

        // Ride option selection
        let selectedRideType = 'premium';
        let selectedRidePrice = 4500;
        
        document.querySelectorAll('.ride-option').forEach(option => {
            option.addEventListener('click', function() {
                // Remove selected class from all options
                document.querySelectorAll('.ride-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // Add selected class to clicked option
                this.classList.add('selected');
                
                // Update selected ride type and price
                selectedRideType = this.getAttribute('data-type');
                selectedRidePrice = parseInt(this.getAttribute('data-price'));
                
                // Update pricing
                calculatePrice();
                
                // Update ETA based on ride type
                const etaElement = document.getElementById('etaValue');
                if (selectedRideType === 'express') {
                    etaElement.textContent = '3 min';
                } else if (selectedRideType === 'premium') {
                    etaElement.textContent = '5 min';
                } else {
                    etaElement.textContent = '7 min';
                }
            });
        });

        // Calculate price function
        function calculatePrice() {
            const pickup = document.getElementById('pickupInput').value;
            const destination = document.getElementById('destinationInput').value;
            
            if (!destination.trim()) {
                // No destination entered, use default pricing
                updatePricingDisplay(selectedRidePrice, 2.5);
                return;
            }
            
            // In a real app, this would calculate distance using a mapping API
            // For demo, we'll use random distances based on whether it's a short or long trip
            let distanceKm;
            let baseFare, distanceFare, totalFare;
            
            // Determine if it's a short or long trip based on destination name
            const shortTripDestinations = ['JP Plaza', 'Lohana Complex', 'Mash poa'];
            const isShortTrip = shortTripDestinations.some(name => destination.includes(name));
            
            if (isShortTrip) {
                distanceKm = (Math.random() * 3 + 1).toFixed(1); // 1-4 km
                baseFare = 1500;
                distanceFare = Math.round(distanceKm * 400);
            } else {
                distanceKm = (Math.random() * 10 + 5).toFixed(1); // 5-15 km
                baseFare = 2000;
                distanceFare = Math.round(distanceKm * 350);
            }
            
            // Calculate total based on ride type
            if (selectedRideType === 'premium') {
                baseFare += 1000;
            } else if (selectedRideType === 'express') {
                baseFare += 1500;
                distanceFare = Math.round(distanceFare * 1.2);
            }
            
            const serviceFee = 500;
            const insurance = 300;
            totalFare = baseFare + distanceFare + serviceFee + insurance;
            
            // Update display
            updatePricingDisplay(totalFare, distanceKm, baseFare, distanceFare);
        }

        function updatePricingDisplay(totalFare, distanceKm, baseFare = 1500, distanceFare = 1000) {
            // Format numbers with commas
            function formatNumber(num) {
                return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            
            // Update distance display
            document.getElementById('distanceDisplay').textContent = `${distanceKm} km • 8 mins`;
            
            // Update pricing breakdown
            document.getElementById('baseFare').textContent = `UGX ${formatNumber(baseFare)}`;
            document.getElementById('distanceFare').textContent = `UGX ${formatNumber(distanceFare)}`;
            document.getElementById('totalFare').textContent = `UGX ${formatNumber(totalFare)}`;
            
            // Update selected ride option price
            const selectedOption = document.querySelector('.ride-option.selected');
            if (selectedOption) {
                const priceElement = selectedOption.querySelector('.ride-price');
                priceElement.textContent = `UGX ${formatNumber(totalFare)}`;
                selectedOption.setAttribute('data-price', totalFare);
                selectedRidePrice = totalFare;
            }
        }

        // Calculate Price Button
        document.getElementById('calculatePriceBtn').addEventListener('click', function() {
            const destination = document.getElementById('destinationInput').value;
            
            if (!destination.trim()) {
                alert("Please enter a destination to calculate price.");
                document.getElementById('destinationInput').focus();
                return;
            }
            
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Calculating...';
            
            // Simulate API call delay
            setTimeout(() => {
                calculatePrice();
                this.innerHTML = '<i class="fas fa-check"></i> Price Calculated';
                
                // Revert button after 2 seconds
                setTimeout(() => {
                    this.innerHTML = '<i class="fas fa-calculator"></i> Calculate Price';
                }, 2000);
            }, 1000);
        });

        // Confirm Ride Button
        document.getElementById('confirmRideBtn').addEventListener('click', function() {
            const pickup = document.getElementById('pickupInput').value;
            const destination = document.getElementById('destinationInput').value;
            
            if (!destination.trim()) {
                alert("Please enter a destination for your ride.");
                document.getElementById('destinationInput').focus();
                return;
            }
            
            // Show loading state
            this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Confirming...';
            this.disabled = true;
            
            // Simulate API call delay
            setTimeout(() => {
                // Update confirmation modal with trip details
                document.getElementById('confirmPickup').textContent = pickup;
                document.getElementById('confirmDestination').textContent = destination;
                
                const selectedOption = document.querySelector('.ride-option.selected');
                const rideType = selectedOption ? selectedOption.querySelector('.ride-name').textContent : 'Premium Boda';
                document.getElementById('confirmRideType').textContent = rideType;
                
                document.getElementById('confirmTotalFare').textContent = document.getElementById('totalFare').textContent;
                
                // Show confirmation modal
                openModal();
                
                // Reset button
                this.innerHTML = '<i class="fas fa-motorcycle"></i> Confirm Ride';
                this.disabled = false;
            }, 1500);
        });

        // Modal Functions
        function openModal() {
            document.getElementById('rideConfirmationModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('rideConfirmationModal').style.display = 'none';
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal();
            }
        };

        // Start ride tracking
        function startTracking() {
            alert("Ride tracking started! You will be redirected to the tracking page.");
            closeModal();
            // In a real app, this would redirect to a tracking page
        }

        // Auto-calculate price when destination changes
        let destinationTimeout;
        document.getElementById('destinationInput').addEventListener('input', function() {
            clearTimeout(destinationTimeout);
            
            // Wait for user to stop typing for 1 second
            destinationTimeout = setTimeout(() => {
                if (this.value.trim().length > 3) {
                    calculatePrice();
                }
            }, 1000);
        });

        // Initialize pricing on page load
        document.addEventListener('DOMContentLoaded', calculatePrice);
    </script>
</body>
</html>