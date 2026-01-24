<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safe Trip | Boda Boda Ride Service</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        :root {
            --primary: #00a859;
            --primary-dark: #008f4c;
            --secondary: #f8b400;
            --dark: #1a1a1a;
            --light: #f8f9fa;
            --gray: #6c757d;
            --danger: #e74c3c;
            --shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            line-height: 1.6;
            color: var(--dark);
            background-color: var(--light);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header Styles */
        header {
            background-color: white;
            box-shadow: var(--shadow);
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
            font-size: 24px;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        .logo i {
            margin-right: 8px;
            color: var(--secondary);
        }

        .nav-links {
            display: flex;
            list-style: none;
        }

        .nav-links li {
            margin-left: 30px;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 600;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .btn {
            display: inline-block;
            padding: 10px 25px;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-3px);
        }

        .btn-secondary {
            background-color: var(--secondary);
            color: var(--dark);
        }

        .btn-secondary:hover {
            background-color: #e6a800;
            transform: translateY(-3px);
        }

        .btn-outline {
            background-color: transparent;
            color: var(--primary);
            border: 2px solid var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .mobile-menu-btn {
            display: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--dark);
        }

        /* Hero Section */
        .hero {
            padding: 100px 0;
            background: linear-gradient(135deg, rgba(0, 168, 89, 0.1) 0%, rgba(248, 180, 0, 0.05) 100%);
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .hero-text h1 span {
            color: var(--primary);
        }

        .hero-text p {
            font-size: 18px;
            color: var(--gray);
            margin-bottom: 30px;
        }

        .hero-btns {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .hero-image {
            text-align: center;
        }

        .hero-image img {
            max-width: 100%;
            border-radius: 20px;
            box-shadow: var(--shadow);
        }

        /* Features Section */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 36px;
            color: var(--dark);
            margin-bottom: 15px;
        }

        .section-title p {
            color: var(--gray);
            max-width: 600px;
            margin: 0 auto;
        }

        .features {
            padding: 80px 0;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background-color: rgba(0, 168, 89, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .feature-icon i {
            font-size: 36px;
            color: var(--primary);
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--dark);
        }

        /* How It Works */
        .how-it-works {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 50px;
        }

        .step {
            flex: 1;
            min-width: 250px;
            margin: 15px;
            text-align: center;
            position: relative;
        }

        .step-number {
            width: 60px;
            height: 60px;
            background-color: var(--primary);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: 700;
            margin: 0 auto 20px;
        }

        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 30px;
            right: -30px;
            width: 60px;
            height: 2px;
            background-color: var(--primary);
        }

        /* Ride Booking */
        .booking {
            padding: 80px 0;
        }

        .booking-container {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: var(--shadow);
            max-width: 800px;
            margin: 0 auto;
        }

        .booking-tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 2px solid #eee;
        }

        .tab-btn {
            padding: 15px 30px;
            background: none;
            border: none;
            font-size: 18px;
            font-weight: 600;
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
            position: relative;
        }

        .tab-btn.active {
            color: var(--primary);
        }

        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: var(--transition);
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Map Container */
        .map-container {
            height: 300px;
            background-color: #eee;
            border-radius: 10px;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray);
        }

        /* Available Riders */
        .riders {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .riders-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .rider-card {
            background-color: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: var(--shadow);
            text-align: center;
        }

        .rider-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 5px solid var(--light);
        }

        .rating {
            color: var(--secondary);
            margin: 10px 0;
        }

        /* Footer */
        footer {
            background-color: var(--dark);
            color: white;
            padding: 70px 0 20px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            color: white;
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
            color: var(--primary);
        }

        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
        }

        .social-icons a:hover {
            background-color: var(--primary);
            transform: translateY(-5px);
        }

        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #bbb;
            font-size: 14px;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .step:not(:last-child)::after {
                display: none;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 70px;
                left: 0;
                background-color: white;
                width: 100%;
                flex-direction: column;
                align-items: center;
                padding: 20px 0;
                box-shadow: var(--shadow);
                transform: translateY(-100%);
                opacity: 0;
                transition: var(--transition);
                z-index: 999;
            }

            .nav-links.active {
                transform: translateY(0);
                opacity: 1;
            }

            .nav-links li {
                margin: 15px 0;
            }

            .hero-text h1 {
                font-size: 32px;
            }

            .hero-btns {
                justify-content: center;
            }

            .section-title h2 {
                font-size: 28px;
            }
        }

        @media (max-width: 576px) {
            .hero {
                padding: 60px 0;
            }

            .features, .how-it-works, .booking, .riders {
                padding: 60px 0;
            }

            .booking-container {
                padding: 25px;
            }

            .tab-btn {
                padding: 15px;
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container">
            <nav class="navbar">
                <a href="#" class="logo">
                    <i class="fas fa-motorcycle"></i> Safe Trip
                </a>
                
                <div class="mobile-menu-btn">
                    <i class="fas fa-bars"></i>
                </div>
                
                <ul class="nav-links">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#how-it-works">How It Works</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#riders">Riders</a></li>
                    <li><a href="#booking">Book a Ride</a></li>
                    <li><a href="#" class="btn btn-outline">Become a Rider</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Safe & Reliable <span>Boda Boda</span> Rides</h1>
                    <p>Book a safe motorcycle ride in minutes. Safe Trip connects you with trained and verified boda boda riders for convenient and affordable transportation across the city.</p>
                    <div class="hero-btns">
                        <a href="ordersafe.php" class="btn btn-primary">Book a Ride</a>
                        <a href="paysafe.php" class="btn btn-secondary">Become a Rider</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" alt="Safe Trip Rider">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Why Choose Safe Trip</h2>
                <p>We prioritize your safety and convenience with our innovative boda boda service</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Safe & Verified Riders</h3>
                    <p>All our riders are thoroughly vetted, trained, and insured for your safety and peace of mind.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Fast Pickup</h3>
                    <p>Get a ride in minutes with our extensive network of riders available 24/7 across the city.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Affordable Pricing</h3>
                    <p>Transparent, upfront pricing with no hidden charges. Pay with cash or mobile money.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works" id="how-it-works">
        <div class="container">
            <div class="section-title">
                <h2>How Safe Trip Works</h2>
                <p>Getting a ride is simple with our easy-to-use platform</p>
            </div>
            
            <div class="steps">
                <div class="step">
                    <div class="step-number">1</div>
                    <h3>Book a Ride</h3>
                    <p>Enter your pickup and destination locations on our website or mobile app.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">2</div>
                    <h3>Choose Your Rider</h3>
                    <p>Select from available nearby riders based on ratings, distance, and vehicle type.</p>
                </div>
                
                <div class="step">
                    <div class="step-number">3</div>
                    <h3>Track & Ride</h3>
                    <p>Track your rider's arrival in real-time, enjoy a safe ride, and pay conveniently.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Ride Booking Section -->
    <section class="booking" id="booking">
        <div class="container">
            <div class="section-title">
                <h2>Book a Ride</h2>
                <p>Request a boda boda ride in just a few clicks</p>
            </div>
            
            <div class="booking-container">
                <div class="booking-tabs">
                    <button class="tab-btn active" data-tab="passenger">Passenger</button>
                    <button class="tab-btn" data-tab="rider">Rider</button>
                </div>
                
                <!-- Passenger Tab -->
                <div class="tab-content active" id="passenger-tab">
                    <form id="rideBookingForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="pickup">Pickup Location</label>
                                <input type="text" id="pickup" class="form-control" placeholder="Enter pickup address" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="destination">Destination</label>
                                <input type="text" id="destination" class="form-control" placeholder="Enter destination address" required>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ride-type">Ride Type</label>
                                <select id="ride-type" class="form-control">
                                    <option value="standard">Standard Boda</option>
                                    <option value="premium">Premium Boda</option>
                                    <option value="delivery">Package Delivery</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="payment">Payment Method</label>
                                <select id="payment" class="form-control">
                                    <option value="cash">Cash</option>
                                    <option value="mobile-money">Mobile Money</option>
                                    <option value="card">Credit Card</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Estimated Fare: <span id="estimatedFare">2,500 UGX</span></label>
                        </div>
                        
                        <div class="map-container">
                            <i class="fas fa-map-marked-alt"></i> Interactive Map (Rider Tracking)
                        </div>
                        
                        <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">
                            <i class="fas fa-motorcycle"></i> Request Ride
                        </button>
                    </form>
                </div>
                
                <!-- Rider Tab -->
                <div class="tab-content" id="rider-tab">
                    <form id="riderLoginForm">
                        <div class="form-group">
                            <label for="rider-phone">Phone Number</label>
                            <input type="tel" id="rider-phone" class="form-control" placeholder="Enter your phone number" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="rider-password">Password</label>
                            <input type="password" id="rider-password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        
                        <div class="form-group">
                            <div class="map-container">
                                <i class="fas fa-map"></i> Rider Dashboard - Available Trips Map
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-secondary" style="width: 100%;">
                            <i class="fas fa-sign-in-alt"></i> Login to Accept Trips
                        </button>
                        
                        <p style="text-align: center; margin-top: 15px;">
                            Not a rider yet? <a href="#" style="color: var(--primary); text-decoration: none; font-weight: 600;">Sign up here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Available Riders -->
    <section class="riders" id="riders">
        <div class="container">
            <div class="section-title">
                <h2>Our Verified Riders</h2>
                <p>Meet some of our top-rated boda boda riders</p>
            </div>
            
            <div class="riders-grid">
                <div class="rider-card">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Rider" class="rider-avatar">
                    <h3>David M.</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                        <span>4.7</span>
                    </div>
                    <p>3,200+ trips</p>
                    <p><i class="fas fa-motorcycle"></i> Yamaha</p>
                </div>
                
                <div class="rider-card">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Rider" class="rider-avatar">
                    <h3>Sarah K.</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>5.0</span>
                    </div>
                    <p>2,800+ trips</p>
                    <p><i class="fas fa-motorcycle"></i> Bajaj Boxer</p>
                </div>
                
                <div class="rider-card">
                    <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="Rider" class="rider-avatar">
                    <h3>John O.</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>4.9</span>
                    </div>
                    <p>4,500+ trips</p>
                    <p><i class="fas fa-motorcycle"></i> TVS Star</p>
                </div>
                
                <div class="rider-card">
                    <img src="https://randomuser.me/api/portraits/men/22.jpg" alt="Rider" class="rider-avatar">
                    <h3>Peter W.</h3>
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <span>4.8</span>
                    </div>
                    <p>3,900+ trips</p>
                    <p><i class="fas fa-motorcycle"></i> Honda</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>Safe Trip</h3>
                    <p>Your safety is our priority. We provide reliable, affordable, and convenient boda boda transportation across the city.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#how-it-works">How It Works</a></li>
                        <li><a href="#features">Features</a></li>
                        <li><a href="#booking">Book a Ride</a></li>
                        <li><a href="#">Become a Rider</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> Kampala, Uganda</li>
                        <li><i class="fas fa-phone"></i> +256 700 123 456</li>
                        <li><i class="fas fa-envelope"></i> info@safetrip.com</li>
                        <li><i class="fas fa-clock"></i> 24/7 Support</li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Download Our App</h3>
                    <p>Get the best experience by downloading our mobile app</p>
                    <div style="margin-top: 15px;">
                        <a href="#" class="btn btn-primary" style="margin-bottom: 10px; display: block;"><i class="fab fa-google-play"></i> Google Play</a>
                        <a href="#" class="btn btn-primary"><i class="fab fa-app-store"></i> App Store</a>
                    </div>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Safe Trip. All rights reserved. | Designed with <i class="fas fa-heart" style="color: #e74c3c;"></i> for Uganda's boda boda community</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const navLinks = document.querySelector('.nav-links');
        
        mobileMenuBtn.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileMenuBtn.innerHTML = navLinks.classList.contains('active') 
                ? '<i class="fas fa-times"></i>' 
                : '<i class="fas fa-bars"></i>';
        });
        
        // Tab Switching
        const tabBtns = document.querySelectorAll('.tab-btn');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const tabId = btn.getAttribute('data-tab');
                
                // Remove active class from all buttons and contents
                tabBtns.forEach(b => b.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to clicked button and corresponding content
                btn.classList.add('active');
                document.getElementById(`${tabId}-tab`).classList.add('active');
            });
        });
        
        // Ride Booking Form Submission
        const rideBookingForm = document.getElementById('rideBookingForm');
        rideBookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const pickup = document.getElementById('pickup').value;
            const destination = document.getElementById('destination').value;
            const rideType = document.getElementById('ride-type').value;
            
            // In a real app, this would calculate fare based on distance
            const fares = {
                'standard': '2,500 UGX',
                'premium': '4,000 UGX',
                'delivery': '3,500 UGX'
            };
            
            const estimatedFare = fares[rideType] || '2,500 UGX';
            
            // Show confirmation message
            alert(`Ride requested successfully!\n\nPickup: ${pickup}\nDestination: ${destination}\nRide Type: ${rideType}\nEstimated Fare: ${estimatedFare}\n\nYour rider will arrive shortly!`);
            
            // Reset form
            rideBookingForm.reset();
            document.getElementById('estimatedFare').textContent = '2,500 UGX';
        });
        
        // Rider Login Form Submission
        const riderLoginForm = document.getElementById('riderLoginForm');
        riderLoginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const phone = document.getElementById('rider-phone').value;
            
            // Show confirmation message
            alert(`Welcome back, Rider! Redirecting to your dashboard...\n\nYou can now accept trips from passengers in your area.`);
            
            // Reset form
            riderLoginForm.reset();
        });
        
        // Update estimated fare when ride type changes
        const rideTypeSelect = document.getElementById('ride-type');
        const estimatedFareSpan = document.getElementById('estimatedFare');
        
        rideTypeSelect.addEventListener('change', function() {
            const fares = {
                'standard': '2,500 UGX',
                'premium': '4,000 UGX',
                'delivery': '3,500 UGX'
            };
            
            estimatedFareSpan.textContent = fares[this.value] || '2,500 UGX';
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if(targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if(targetElement) {
                    // Close mobile menu if open
                    navLinks.classList.remove('active');
                    mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                    
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>