<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tembo Net Group - WiFi Billing System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        :root {
            --primary-color: #1a73e8;
            --secondary-color: #0d47a1;
            --accent-color: #f57c00;
            --light-color: #f8f9fa;
            --dark-color: #202124;
            --gray-color: #5f6368;
            --success-color: #0f9d58;
            --warning-color: #f4b400;
            --danger-color: #db4437;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --border-radius: 8px;
            --transition: all 0.3s ease;
        }

        body {
            color: var(--dark-color);
            background-color: #f5f7fa;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: var(--primary-color);
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            font-weight: 600;
            transition: var(--transition);
        }

        .btn:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: var(--shadow);
        }

        .btn-accent {
            background-color: var(--accent-color);
        }

        .btn-success {
            background-color: var(--success-color);
        }

        /* Header & Navigation */
        header {
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 20px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo h1 {
            font-size: 1.8rem;
            color: var(--primary-color);
        }

        .logo-icon {
            color: var(--primary-color);
            font-size: 2rem;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 30px;
        }

        .nav-links a {
            color: var(--dark-color);
            font-weight: 500;
            transition: var(--transition);
        }

        .nav-links a:hover {
            color: var(--primary-color);
        }

        .mobile-toggle {
            display: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray-color);
        }

        /* Hero Section */
        .hero {
            padding: 80px 20px;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            text-align: center;
        }

        .hero h2 {
            font-size: 2.8rem;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }

        /* Features Section */
        .features {
            padding: 80px 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 2.2rem;
            color: var(--dark-color);
            margin-bottom: 10px;
        }

        .section-title p {
            color: var(--gray-color);
            max-width: 600px;
            margin: 0 auto;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
        }

        .feature-card {
            background-color: white;
            border-radius: var(--border-radius);
            padding: 30px;
            box-shadow: var(--shadow);
            transition: var(--transition);
            text-align: center;
        }

        .feature-card:hover {
            transform: translateY(-10px);
        }

        .feature-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }

        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--dark-color);
        }

        /* Dashboard Preview */
        .dashboard-preview {
            padding: 80px 20px;
            background-color: #f0f5ff;
        }

        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 40px;
            align-items: center;
        }

        .dashboard-text {
            flex: 1;
            min-width: 300px;
        }

        .dashboard-text h2 {
            font-size: 2.2rem;
            margin-bottom: 20px;
            color: var(--dark-color);
        }

        .dashboard-image {
            flex: 1;
            min-width: 300px;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            padding: 20px;
        }

        .dashboard-placeholder {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            height: 300px;
            border-radius: 6px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: var(--gray-color);
        }

        .dashboard-placeholder i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: var(--primary-color);
        }

        /* Login/Register Area */
        .auth-area {
            padding: 80px 20px;
            text-align: center;
        }

        .auth-container {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 40px;
        }

        .auth-container h2 {
            margin-bottom: 30px;
            color: var(--dark-color);
        }

        .auth-tabs {
            display: flex;
            margin-bottom: 30px;
            border-bottom: 1px solid #e0e0e0;
        }

        .auth-tab {
            flex: 1;
            padding: 15px;
            background: none;
            border: none;
            font-weight: 600;
            color: var(--gray-color);
            cursor: pointer;
            transition: var(--transition);
        }

        .auth-tab.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
        }

        .auth-form {
            display: none;
        }

        .auth-form.active {
            display: block;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
        }

        .form-group input:focus {
            border-color: var(--primary-color);
            outline: none;
        }

        /* Footer */
        footer {
            background-color: var(--dark-color);
            color: white;
            padding: 60px 20px 30px;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-col h3 {
            font-size: 1.3rem;
            margin-bottom: 20px;
            color: white;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 10px;
        }

        .footer-col ul li a {
            color: #b0b0b0;
            transition: var(--transition);
        }

        .footer-col ul li a:hover {
            color: white;
        }

        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid #333;
            color: #b0b0b0;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero h2 {
                font-size: 2.2rem;
            }
            
            .features-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .nav-links {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: white;
                flex-direction: column;
                padding: 20px;
                box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
                gap: 15px;
            }
            
            .nav-links.active {
                display: flex;
            }
            
            .mobile-toggle {
                display: block;
            }
            
            .hero h2 {
                font-size: 1.8rem;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-container {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            .hero {
                padding: 60px 20px;
            }
            
            .features, .dashboard-preview, .auth-area {
                padding: 60px 20px;
            }
            
            .auth-container {
                padding: 30px 20px;
            }
            
            .btn {
                padding: 10px 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="container header-container">
            <div class="logo">
                <i class="fas fa-wifi logo-icon"></i>
                <h1>Tembo Net</h1>
            </div>
            
            <div class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </div>
            
            <ul class="nav-links" id="navLinks">
                <li><a href="../index.php">Home</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#dashboard">Dashboard</a></li>
                <li><a href="#login" id="loginLink">Login</a></li>
                <li><a href="#" class="btn">Get Started</a></li>
            </ul>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <h2>Advanced WiFi Billing System for Uganda</h2>
            <p>Streamline your WiFi business with our comprehensive internet billing platform. Manage packages, vouchers, users, payments, and integrate seamlessly with MikroTik routers.</p>
            <a href="#dashboard" class="btn btn-accent">Request Demo</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="section-title">
                <h2>Powerful Features for WiFi Business</h2>
                <p>Everything you need to manage your internet service provider business efficiently</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <i class="fas fa-cube feature-icon"></i>
                    <h3>Package Management</h3>
                    <p>Create, edit, and manage internet packages with different speeds, data limits, and durations.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-ticket-alt feature-icon"></i>
                    <h3>Voucher System</h3>
                    <p>Generate and manage WiFi vouchers for prepaid customers with customizable validity periods.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-users feature-icon"></i>
                    <h3>User Management</h3>
                    <p>Create and manage admin and user accounts with different permission levels and access controls.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3>Analytics Dashboard</h3>
                    <p>Monitor network performance, user activity, revenue, and other key metrics in real-time.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-credit-card feature-icon"></i>
                    <h3>Payment Processing</h3>
                    <p>Accept payments through multiple channels including mobile money, bank transfers, and cash.</p>
                </div>
                
                <div class="feature-card">
                    <i class="fas fa-server feature-icon"></i>
                    <h3>MikroTik Integration</h3>
                    <p>Seamlessly connect with MikroTik routers for user authentication, bandwidth control, and monitoring.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dashboard Preview -->
    <section class="dashboard-preview" id="dashboard">
        <div class="container dashboard-container">
            <div class="dashboard-text">
                <h2>Comprehensive Admin & User Dashboards</h2>
                <p>Our responsive dashboards provide all the tools you need to manage your WiFi business from any device.</p>
                <br>
                <p>Admins can monitor network performance, create packages, generate reports, and manage users. Users can check their data usage, buy packages, make payments, and view transaction history.</p>
                <br>
                <a href="#login" class="btn btn-success">Access Dashboard</a>
            </div>
            
            <div class="dashboard-image">
                <div class="dashboard-placeholder">
                    <i class="fas fa-chart-bar"></i>
                    <h3>Interactive Dashboard Preview</h3>
                    <p>Real-time charts and statistics</p>
                </div>
            </div>
        </div>
    </section>

   9
    <!-- Footer -->
    <footer>
        <div class="container footer-container">
            <div class="footer-col">
                <h3>Tembo Net Group</h3>
                <p>Advanced internet billing system for WiFi businesses in Uganda. Streamline operations, increase efficiency, and grow your revenue.</p>
            </div>
            
            <div class="footer-col">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#dashboard">Dashboard</a></li>
                    <li><a href="#login">Login</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Features</h3>
                <ul>
                    <li><a href="#">Package Management</a></li>
                    <li><a href="#">Voucher System</a></li>
                    <li><a href="#">User Management</a></li>
                    <li><a href="#">MikroTik Integration</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h3>Contact Us</h3>
                <ul>
                    <li><i class="fas fa-map-marker-alt"></i> Kampala, Uganda</li>
                    <li><i class="fas fa-phone"></i> +256 709 508 211</li>
                    <li><i class="fas fa-envelope"></i> info@tembonet.com</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 Tembo Net . All rights reserved. | Internet Billing System for WiFi Business</p>
        </div>
    </footer>

    <script>
        // Mobile Navigation Toggle
        const mobileToggle = document.getElementById('mobileToggle');
        const navLinks = document.getElementById('navLinks');
        
        mobileToggle.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            mobileToggle.querySelector('i').classList.toggle('fa-bars');
            mobileToggle.querySelector('i').classList.toggle('fa-times');
        });
        
        // Login/Register Tab Switching
        const authTabs = document.querySelectorAll('.auth-tab');
        const authForms = document.querySelectorAll('.auth-form');
        
        authTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const targetTab = tab.getAttribute('data-tab');
                
                // Update active tab
                authTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Show corresponding form
                authForms.forEach(form => {
                    form.classList.remove('active');
                    if (form.id === `${targetTab}Form`) {
                        form.classList.add('active');
                    }
                });
            });
        });
        
        // Login link scroll
        document.getElementById('loginLink').addEventListener('click', (e) => {
            e.preventDefault();
            document.getElementById('login').scrollIntoView({ behavior: 'smooth' });
            
            // Activate login tab
            authTabs.forEach(t => t.classList.remove('active'));
            document.querySelector('[data-tab="login"]').classList.add('active');
            
            authForms.forEach(form => {
                form.classList.remove('active');
                if (form.id === 'loginForm') {
                    form.classList.add('active');
                }
            });
        });
        
        // Form Submission
        document.getElementById('loginForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const userType = document.getElementById('userType').value;
            alert(`Login successful! Redirecting to ${userType} dashboard...`);
            // In a real application, this would redirect to the actual dashboard
        });
        
        document.getElementById('registerForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const accountType = document.getElementById('registerType').value;
            alert(`${accountType} account created successfully! Please check your email for verification.`);
            // In a real application, this would submit the form data to the server
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                if (this.getAttribute('href') === '#') return;
                
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                    
                    // Close mobile menu if open
                    if (navLinks.classList.contains('active')) {
                        navLinks.classList.remove('active');
                        mobileToggle.querySelector('i').classList.toggle('fa-bars');
                        mobileToggle.querySelector('i').classList.toggle('fa-times');
                    }
                }
            });
        });
    </script>
</body>
</html>