@extends('layouts.app')

@section('title', 'Boarding Service')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .hero {
            background: black;
            color: white;
            padding: 100px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
            color: #ff6600;
        }

        .hero p {
            font-size: 24px;
            margin-bottom: 40px;
        }

        .hero .cta-button {
            padding: 15px 30px;
            font-size: 20px;
            border-radius: 5px;
            background-color: #ff6600;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .hero .cta-button:hover {
            background-color: #e65500;
        }

        .hero::before, .hero::after {
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

        .hero::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .hero-icons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .hero-icons i {
            font-size: 40px;
            color: #ff6600;
            transition: transform 0.3s;
        }

        .hero-icons i:hover {
            transform: scale(1.2);
            color: #e65500;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .hero .cta-button {
                font-size: 18px;
                padding: 10px 20px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero .cta-button {
                font-size: 16px;
                padding: 8px 16px;
            }

            .hero-icons i {
                font-size: 30px;
            }
        }

        .how-it-works-section {
            background: linear-gradient(to right, #ff6a00, #ffb900);
            padding: 60px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            color: white;
        }

        .how-it-works-section::before, .how-it-works-section::after {
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

        .how-it-works-section::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .how-it-works-title {
            font-size: 36px;
            color: white;
            margin-bottom: 40px;
            animation: fadeIn 1s ease-in-out;
            position: relative;
            z-index: 1;
        }

        .how-it-works-steps {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
            position: relative;
            z-index: 1;
        }

        .how-it-works-step {
            background: white;
            border: 2px solid white;
            border-radius: 10px;
            width: 80%;
            padding: 20px;
            margin: 10px 0;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: slideIn 1s ease-in-out;
            color: #ff6600;
        }

        .how-it-works-step:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            background-color: #e65500;
            color: white;
        }

        .how-it-works-step:before, .how-it-works-step:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.1);
            top: -100%;
            left: 0;
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .how-it-works-step:after {
            top: 100%;
            left: -100%;
            transform: rotate(45deg);
        }

        .how-it-works-step:hover:before {
            top: 0;
        }

        .how-it-works-step:hover:after {
            top: 0;
            left: 0;
        }

        .how-it-works-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .how-it-works-title-step {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .how-it-works-description {
            font-size: 16px;
            line-height: 1.6;
        }

        .benefits-section {
            background: #f9f9f9;
            padding: 60px 20px;
            text-align: center;
        }

        .benefits-title {
            font-size: 36px;
            color: #ff6600;
            margin-bottom: 40px;
            animation: fadeIn 1s ease-in-out;
        }

        .benefits {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .benefit {
            background: white;
            border: 2px solid #ff6600;
            border-radius: 10px;
            width: 18%;
            min-width: 280px;
            padding: 20px;
            margin: 10px 0;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: slideIn 1s ease-in-out;
            cursor: pointer;
        }

        .benefit:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            background-color: #ff6600;
            color: white;
        }

        .benefit:before, .benefit:after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(255, 102, 0, 0.1);
            top: -100%;
            left: 0;
            transform: rotate(45deg);
            transition: all 0.3s ease;
        }

        .benefit:after {
            top: 100%;
            left: -100%;
            transform: rotate(45deg);
        }

        .benefit:hover:before {
            top: 0;
        }

        .benefit:hover:after {
            top: 0;
            left: 0;
        }

        .benefit-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .benefit-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .benefit-description {
            font-size: 16px;
            line-height: 1.6;
        }

        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 20px;
        }

        footer a {
            color: #ff6600;
            text-decoration: none;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @media (max-width: 1024px) {
            .hero h1 {
                font-size: 42px;
            }

            .hero p {
                font-size: 22px;
            }

            .hero .cta-button {
                font-size: 18px;
                padding: 12px 24px;
            }

            .how-it-works-step, .benefit {
                width: 70%;
            }

            .how-it-works-title {
                font-size: 32px;
            }

            .benefits-title {
                font-size: 32px;
            }
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 36px;
            }

            .hero p {
                font-size: 18px;
            }

            .hero .cta-button {
                font-size: 16px;
                padding: 10px 20px;
            }

            .how-it-works-step, .benefit {
                width: 90%;
            }

            .how-it-works-title, .benefits-title {
                font-size: 28px;
            }

            .how-it-works-title-step {
                font-size: 22px;
            }

            .how-it-works-description, .benefit-description {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 28px;
            }

            .hero p {
                font-size: 16px;
            }

            .hero .cta-button {
                font-size: 14px;
                padding: 8px 16px;
            }

            .how-it-works-step, .benefit {
                width: 100%;
            }

            .how-it-works-title, .benefits-title {
                font-size: 24px;
            }

            .how-it-works-title-step, .benefit-title {
                font-size: 20px;
            }

            .how-it-works-description, .benefit-description {
                font-size: 12px;
            }
        }
    </style>
@endpush

@section('content')
<section class="hero">
    <div class="hero-content">
        <h1>Pet Boarding Services</h1>
        <p>Discover the best boarding services for your pets with Petfinity.</p>
        <a href="{{route('pet-boardingcenter.register')}}" class="cta-button">Join Now</a>
        <div class="hero-icons">
            <i class="fas fa-dog"></i>
            <i class="fas fa-cat"></i>
            <i class="fas fa-paw"></i>
            <i class="fas fa-home"></i>
        </div>
    </div>
</section>

    <section id="how-it-works" class="how-it-works-section">
        <h2 class="how-it-works-title">How It Works</h2>
        <div class="how-it-works-steps">
            <div class="how-it-works-step">
                <div class="how-it-works-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 1: Register</h3>
                <p class="how-it-works-description">
                    Create an account with us to start your journey. Fill in your details and you're all set!
                </p>
            </div>
            <div class="how-it-works-step">
                <div class="how-it-works-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 2: Book a Boarding Service</h3>
                <p class="how-it-works-description">
                    Choose a boarding service that fits your needs and book it through our easy-to-use platform.
                </p>
            </div>
            <div class="how-it-works-step">
                <div class="how-it-works-icon">
                    <i class="fas fa-home"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 3: Drop Off Your Pet</h3>
                <p class="how-it-works-description">
                    Drop off your pet at the boarding facility and rest assured they'll be well taken care of.
                </p>
            </div>
        </div>
    </section>

    <section id="benefits" class="benefits-section">
        <h2 class="benefits-title">Benefits of Using Petfinity for Pet Boarding</h2>
        <div class="benefits">
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3 class="benefit-title">Flexible Booking</h3>
                <p class="benefit-description">
                    Easily book boarding services that fit your schedule with our user-friendly platform.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="benefit-title">Trusted Providers</h3>
                <p class="benefit-description">
                    Choose from a list of trusted and verified boarding facilities for your pet's safety and comfort.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-bell"></i>
                </div>
                <h3 class="benefit-title">Real-Time Notifications</h3>
                <p class="benefit-description">
                    Receive real-time updates on your pet's status during their stay.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="benefit-title">Direct Communication</h3>
                <p class="benefit-description">
                    Communicate directly with the boarding facility for any specific needs or instructions.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-camera"></i>
                </div>
                <h3 class="benefit-title">Photo Updates</h3>
                <p class="benefit-description">
                    Get photo updates of your pet to see how they are doing during their stay.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-paw"></i>
                </div>
                <h3 class="benefit-title">Special Amenities</h3>
                <p class="benefit-description">
                    Many boarding facilities offer special amenities like play areas and grooming services.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="benefit-title">Personalized Care</h3>
                <p class="benefit-description">
                    Ensure your pet receives personalized care tailored to their specific needs.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="benefit-title">Progress Tracking</h3>
                <p class="benefit-description">
                    Track your pet's activities and well-being during their stay through regular updates.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-star"></i>
                </div>
                <h3 class="benefit-title">Feedback and Reviews</h3>
                <p class="benefit-description">
                    Leave reviews and ratings for boarding facilities to help other pet owners.
                </p>
            </div>
            <div class="benefit">
                <div class="benefit-icon">
                    <i class="fas fa-chart-pie"></i>
                </div>
                <h3 class="benefit-title">Analytics and History</h3>
                <p class="benefit-description">
                    Access booking history and trends to make informed decisions for your pet's boarding needs.
                </p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function openSidebar() {
            document.getElementById("sidebar").style.left = "0";
        }

        function closeSidebar() {
            document.getElementById("sidebar").style.left = "-250px";
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
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                navbar.classList.add('hidden');
            } else {
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, false);
    </script>
@endpush
