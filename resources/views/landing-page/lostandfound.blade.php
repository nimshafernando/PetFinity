@extends('layouts.app')

@section('title', 'Report Missing Pet')

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
            transition: transform 0.3s;
        }

        .how-it-works-step:hover .how-it-works-icon {
            transform: rotate(360deg);
        }

        .how-it-works-title-step {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .how-it-works-description {
            font-size: 16px;
            line-height: 1.6;
        }

        .features-section {
            background: #f9f9f9;
            padding: 60px 20px;
            text-align: center;
        }

        .features-title {
            font-size: 36px;
            color: #ff6600;
            margin-bottom: 40px;
            animation: fadeIn 1s ease-in-out;
        }

        .features-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .feature-item {
            background: white;
            border: 2px solid #ff6600;
            border-radius: 10px;
            width: 300px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            animation: slideIn 1s ease-in-out;
            cursor: pointer;
        }

        .feature-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            background-color: #ff6600;
            color: white;
        }

        .feature-item:before, .feature-item:after {
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

        .feature-item:after {
            top: 100%;
            left: -100%;
            transform: rotate(45deg);
        }

        .feature-item:hover:before {
            top: 0;
        }

        .feature-item:hover:after {
            top: 0;
            left: 0;
        }

        .feature-icon {
            font-size: 40px;
            margin-bottom: 10px;
            transition: transform 0.3s;
        }

        .feature-title-item {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .feature-description {
            font-size: 16px;
            line-height: 1.6;
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

            .how-it-works-step, .feature-item {
                width: 70%;
            }

            .how-it-works-title, .features-title {
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

            .how-it-works-step, .feature-item {
                width: 90%;
            }

            .how-it-works-title, .features-title {
                font-size: 28px;
            }

            .how-it-works-title-step, .feature-title-item {
                font-size: 22px;
            }

            .how-it-works-description, .feature-description {
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
                font-size: 16px;
                padding: 8px 16px;
            }

            .how-it-works-step, .feature-item {
                width: 100%;
            }

            .how-it-works-title, .features-title {
                font-size: 24px;
            }

            .how-it-works-title-step, .feature-title-item {
                font-size: 20px;
            }

            .how-it-works-description, .feature-description {
                font-size: 12px;
            }
        }
    </style>
@endpush

@section('content')
<section class="hero">
    <div class="hero-content">
        <h1>Report Missing Pets</h1>
        <p>Find and report missing pets in petfinity</p>
        <a href="{{route('pet-owner.register')}}" class="cta-button">Join Now</a>
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
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 1: Search</h3>
                <p class="how-it-works-description">
                    Browse through our listings to find lost or found pets in your area.
                </p>
            </div>
            <div class="how-it-works-step">
                <div class="how-it-works-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 2: Report</h3>
                <p class="how-it-works-description">
                    Report a lost or found pet to help others in the community.
                </p>
            </div>
            <div class="how-it-works-step">
                <div class="how-it-works-icon">
                    <i class="fas fa-handshake"></i>
                </div>
                <h3 class="how-it-works-title-step">Step 3: Reunite</h3>
                <p class="how-it-works-description">
                    Connect with pet owners or finders to reunite pets with their families.
                </p>
            </div>
        </div>
    </section>

    <section class="features-section">
        <h2 class="features-title">Features</h2>
        <div class="features-grid">
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <h3 class="feature-title-item">Report Lost Pets</h3>
                <p class="feature-description">
                    Easily report lost pets to alert the community and get help in finding them.
                </p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-search"></i>
                </div>
                <h3 class="feature-title-item">Search Listings</h3>
                <p class="feature-description">
                    Search through the listings of lost and found pets to help reunite them with their owners.
                </p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3 class="feature-title-item">Location-Based Search</h3>
                <p class="feature-description">
                    Use the map to search for lost and found pets based on their last known location.
                </p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-comments"></i>
                </div>
                <h3 class="feature-title-item">Direct Communication</h3>
                <p class="feature-description">
                    Communicate directly with pet owners or finders to coordinate the reunion of pets.
                </p>
            </div>
            <div class="feature-item">
                <div class="feature-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <h3 class="feature-title-item">Community Support</h3>
                <p class="feature-description">
                    Get support from the community in finding and reuniting lost pets with their families.
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
