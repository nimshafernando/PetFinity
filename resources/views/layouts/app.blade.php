<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>@yield('title', 'Petfinity')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Montserrat:wght@400;700&display=swap">
    @stack('styles')
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #e1e1e1;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 99%;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            font-size: 18px;
            transition: top 0.3s;
        }

        .navbar.hidden {
            top: -100px;
        }

        .navbar .logo {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar .logo img {
            height: 60px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: flex-start;
        }

        .navbar ul li {
            position: relative;
            margin: 0 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #ffffff;
            padding: 15px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a .icon {
            margin-right: 8px;
            font-size: 20px;
        }

        .navbar ul li .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0px;
            width: 200px;
            padding: 20px;
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 1000;
        }

        .navbar ul li:hover .dropdown {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            transition: transform 0.3s;
            text-align: left;
        }

        .dropdown-item img {
            height: 50px;
            margin-right: 15px;
        }

        .dropdown-item span {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .dropdown-item p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .dropdown-item:hover {
            transform: translateX(10px);
        }

        .auth-buttons {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .auth-buttons a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            margin-left: 20px;
            border: 1px solid #ff6600;
            border-radius: 20px;
            background: #ff6600;
            transition: background 0.3s, color 0.3s;
        }

        .auth-buttons a:hover {
            background: #ffffff;
            color: #ff6600;
        }

        .menu-icon {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: #e65c00;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background: rgba(0, 0, 0, 0.9);
            padding-top: 60px;
            transition: 0.3s;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .sidebar a, .sidebar .dropdown-btn {
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            padding: 15px;
            transition: 0.3s;
            border: 1px solid transparent;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }

        .sidebar a:hover, .sidebar .dropdown-btn:hover {
            color: #ff6600;
            border: 1px solid #ff6600;
            background: rgba(255, 102, 0, 0.1);
            border-radius: 20px;
        }

        .sidebar .dropdown {
            display: none;
            flex-direction: column;
            width: 100%;
        }

        .sidebar .dropdown a {
            font-size: 18px;
            padding-left: 30px;
        }

        .sidebar .dropdown-btn {
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (min-width: 1024px) and (max-width: 1366px) {
            .navbar ul li {
                margin: 0 15px;
            }

            .navbar ul li a {
                padding: 12px;
                font-size: 17px;
            }

            .auth-buttons a {
                padding: 9px 18px;
                font-size: 15px;
            }

            .navbar .logo img {
                height: 50px;
            }
        }

        @media (max-width: 1024px) {
            .navbar ul li {
                margin: 0 10px;
            }

            .navbar ul li a {
                padding: 10px;
                font-size: 16px;
            }

            .auth-buttons a {
                padding: 8px 16px;
                font-size: 14px;
            }

            .navbar .logo img {
                height: 50px;
            }

            .menu-icon {
                display: block;
            }

            .navbar ul, .auth-buttons {
                display: none;
            }

            .navbar .logo {
                position: relative;
                left: 0;
                transform: none;
            }

            .sidebar {
                left: -250px;
            }

            .navbar.active + .sidebar {
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                justify-content: space-between;
            }

            .menu-icon {
                display: block;
            }

            .navbar ul, .auth-buttons {
                display: none;
            }

            .navbar .logo {
                position: relative;
                left: 0;
                transform: none;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 10px 20px;
            }

            .navbar ul li {
                margin: 0 5px;
            }

            .navbar ul li a {
                padding: 5px;
                font-size: 14px;
            }

            .auth-buttons a {
                padding: 5px 10px;
                font-size: 12px;
            }

            .navbar .logo img {
                height: 40px;
            }
        }

        .footer {
            background: linear-gradient(to right, #ff6a00, #ffb900);
            padding: 50px 20px;
            color: #000000;
            position: relative;
            overflow: hidden;
        }

        .footer::before, .footer::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -100%;
            left: -100%;
            background: rgba(255, 255, 255, 0.1);
            animation: rotate 30s infinite linear;
            z-index: 0;
        }

        .footer::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .footer .content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .footer .logo img {
            height: 80px;
        }

        .footer .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .footer .social-icons a:hover {
            transform: scale(1.2);
        }

        .footer .footer-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
        }

        .footer .footer-column {
            flex: 1;
            min-width: 250px;
        }

        .footer .footer-column h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer .footer-column p, .footer .footer-column ul {
            font-size: 16px;
            line-height: 1.6;
        }

        .footer .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer .footer-column ul li a {
            color: #0a0a0a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer .footer-column ul li a:hover {
            color: #333;
        }

        .footer .search-bar {
            display: flex;
            margin-top: 20px;
        }

        .footer .search-bar input {
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
            flex: 1;
        }

        .footer .search-bar button {
            padding: 10px 20px;
            border: none;
            border-radius: 0 5px 5px 0;
            background: #333;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .footer .search-bar button:hover {
            background: #ef0000;
        }

        .footer .copyright {
            margin-top: 20px;
            text-align: center;
            width: 100%;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .footer .content {
                flex-direction: column;
                align-items: left;
            }

            .footer .footer-info {
                flex-direction: column;
                align-items: left;
            }

            .footer .footer-column {
                max-width: 400px;
            }
        }
    </style>
    @stack('scripts')
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar" id="navbar">
        <span class="menu-icon" onclick="openSidebar()">&#9776;</span>
        <div class="logo">
            <img src="images/logoo.png" alt="Petfinity Logo"> 
        </div>
        <ul>
            <li><a href="/"><i class="fas fa-home icon"></i>Home</a></li>
            <li>
                <a href="#"><i class="fas fa-paw icon"></i>Services</a>
                <div class="dropdown">
                    <a class="dropdown-item" href="training">
                        <img src="images/pettrain.png" alt="Training">
                        <div>
                            <span>Training</span>
                            <p>Find and connect with pet trainers.</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="Boarding">
                        <img src="images/boarding.png" alt="Boarding">
                        <div>
                            <span>Boarding</span>
                            <p>Professional boarders for your pet.</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="lostandfound">
                        <img src="images/report.png" alt="Lost and Found">
                        <div>
                            <span>Report missing pets</span>
                            <p>Find and report lost pets.</p>
                        </div>
                    </a>
                </div>
            </li>
            <li><a href="features"><i class="fas fa-star icon"></i>Features</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('login')}}">Login</a>
            <a href="{{ route('select-role')}}">Register</a>
        </div>
    </nav>
    
    
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <a href="/">Home</a>
        <div class="dropdown-btn" onclick="toggleSidebarDropdown('sidebarServicesDropdown')">Services <i class="fa fa-caret-down"></i></div>
        <div class="dropdown" id="sidebarServicesDropdown">
            <a href="training">Training</a>
            <a href="Boarding">Boarding</a>
            <a href="lostandfound">Report Missing Pets</a>
        </div>
        <a href="features">Features</a>
        <a href="login">Login</a>
        <a href="register">Register</a>
    </div>
    
    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="content">
            <div class="logo">
                <img src="images/logoo.png" alt="Petfinity Logo">
            </div>
            <div class="social-icons">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="footer-info">
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>Petfinity is your trusted partner in pet care, offering a wide range of services to keep your pets happy and healthy.</p>
                </div>
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <p>Email: support@petfinity.com</p>
                    <p>Phone: (123) 456-7890</p>
                    <p>Address: 123 Pet Street, Pet City, PC 12345</p>
                </div>
            </div>
            <div class="search-bar">
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>
            <div class="copyright">
                <p>&copy; 2024 Petfinity. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script>
        function openSidebar() {
            document.getElementById("sidebar").style.left = "0";
        }

        function closeSidebar() {
            document.getElementById("sidebar").style.left = "-250px";
        }

        function toggleDropdown(event, dropdownId) {
            event.preventDefault();
            const dropdown = document.getElementById(dropdownId);
            const isActive = dropdown.parentElement.classList.contains('active');

            // Hide all other dropdowns
            document.querySelectorAll('.navbar ul li').forEach(li => {
                li.classList.remove('active');
            });

            // Toggle the clicked dropdown
            if (!isActive) {
                dropdown.parentElement.classList.add('active');
            }
        }

        function toggleSidebarDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const isVisible = dropdown.style.display === 'block';

            // Hide all other dropdowns
            document.querySelectorAll('.sidebar .dropdown').forEach(dd => {
                dd.style.display = 'none';
            });

            // Toggle the clicked dropdown
            if (!isVisible) {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        }

        // Navbar hide and show on scroll
        document.addEventListener('DOMContentLoaded', function() {
            let lastScrollTop = 0;
            const navbar = document.getElementById('navbar');

            window.addEventListener('scroll', function() {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                // If the user is scrolling down
                if (scrollTop > lastScrollTop) {
                    navbar.classList.add('hidden');
                } else if (scrollTop === 0) {
                    // If the user is at the top of the page
                    navbar.classList.remove('hidden');
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            }, false);
        });
    </script> 

</body>
</html>
