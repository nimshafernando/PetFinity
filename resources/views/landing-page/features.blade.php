@extends('layouts.app')

@section('title', 'Features')

@push('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        .hero {
            background: linear-gradient(to right, #000, #333);
            color: white;
            padding: 100px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
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

        .cards-section {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            margin: 40px 0;
            gap: 20px;
        }

        .card {
            background: white;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s, background-color 0.3s, color 0.3s;
            width: 30%;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
        }

        .card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .card h3 {
            font-size: 24px;
            margin: 20px 0;
        }

        .card p {
            padding: 0 20px 20px;
            font-size: 16px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            background-color: #ff6600;
            color: white;
        }

        .cards-section a {
            text-decoration: none;
        }

        .features-section {
            margin: 40px 0;
            padding: 60px 20px;
            border-top: 2px solid #ddd;
        }

        .section-title {
            font-size: 36px;
            margin-bottom: 20px;
            text-align: center;
            color: #ff6600;
        }

        .section-message {
            text-align: center;
            font-size: 18px;
            margin-bottom: 40px;
            color: #333;
            max-width: 600px;
            margin: 0 auto 40px;
            line-height: 1.6;
        }

        .feature-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    gap: 20px;
}

.feature-box {
    flex: 0 0 30%;
    background: #f9f9f9;
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s, box-shadow 0.3s;
    position: relative;
    overflow: hidden;
}

.feature-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

.feature-box:before, .feature-box:after {
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

.feature-box:after {
    top: 100%;
    left: -100%;
    transform: rotate(45deg);
}

.feature-box:hover:before {
    top: 0;
}

.feature-box:hover:after {
    top: 0;
    left: 0;
}

.feature-icon {
    font-size: 50px;
    color: #ff6600;
    margin-bottom: 20px;
}

.feature-title {
    font-size: 28px;
    margin-bottom: 20px;
}

.feature-description {
    font-size: 16px;
    color: #666;
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
@media (max-width: 1024px) {
    .card, .feature-box {
        width: 45%;
    }
    .feature-box {
        flex: 0 0 45%;
    }
}

@media (max-width: 768px) {
    .cards-section, .feature-container {
        flex-direction: column;
        align-items: center;
    }

    .card, .feature-box {
        flex: 0 0 80%;
    }
}

@media (max-width: 480px) {
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

    .card, .feature-box {
        width: 80%;
    }
    .feature-box {
        flex: 0 0 80%;
    }
}


    </style>
@endpush

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>See Our Portfolio of Features in Action</h1>
            <p>Explore the features that make Petfinity the best choice for pet owners, trainers, and boarders.</p>
            <a href="{{ route('select-role')}}" class="cta-button">Explore Now</a>
        </div>
    </section>

    <section class="cards-section">
        <a href="#pet-owner-features" class="card">
            <img src="images/kkkk.jpg" alt="Pet Owner">
            <h3>Pet Owner</h3>
            <p>Manage your pets' profiles, book boarding and training appointments, and stay updated on their status.</p>
        </a>
        <a href="#pet-trainer-features" class="card">
            <img src="images/cat-training.jpg" alt="Pet Trainer">
            <h3>Pet Trainer</h3>
            <p>Offer training services, manage your schedule, and communicate directly with pet owners.</p>
        </a>
        <a href="#pet-boarder-features" class="card">
            <img src="images/ggg.jpg" alt="Pet Boarder">
            <h3>Pet Boarder</h3>
            <p>Provide boarding services, update pet statuses, and keep in touch with pet owners in real-time.</p>
        </a>
    </section>

    <div class="container" id="features">
        <!-- Pet Owners Features -->
        <section class="features-section" id="pet-owner-features">
            <h2 class="section-title">Pet Owners Features</h2>
            <p class="section-message">Join Petfinity to manage your pets' profiles, book services, and stay updated on their well-being.</p>
            <div class="feature-container">
                <div class="feature-box">
                    <i class="fas fa-dog feature-icon"></i>
                    <h3 class="feature-title">Pet Profile Management</h3>
                    <p class="feature-description">Create, update, and delete pet profiles. Optional to create a pet profile.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-calendar-alt feature-icon"></i>
                    <h3 class="feature-title">Book Boarding Appointments</h3>
                    <p class="feature-description">Select start date, check-in time, end date, and check-out time. Select pet size, provide special notes, and choose a payment method (card or cash). Pet owners receive notifications when the boarding place accepts the booking.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chalkboard-teacher feature-icon"></i>
                    <h3 class="feature-title">Book Training Appointments</h3>
                    <p class="feature-description">Select a training place, choose a training type, select a time slot based on trainer availability, provide special notes, and choose a payment method (card or cash). Pet owners receive notifications when the trainer accepts the booking.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-paw feature-icon"></i>
                    <h3 class="feature-title">Track Pet Status</h3>
                    <p class="feature-description">Real-time updates on the pet's status (e.g., fed, walked, groomed). Notifications for each status update. Messaging feature activated between the boarder and the pet owner once a booking is made.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="feature-title">View Training Progress</h3>
                    <p class="feature-description">Pet owners can track the training progress of their pets.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-search feature-icon"></i>
                    <h3 class="feature-title">Lost and Found</h3>
                    <p class="feature-description">Add missing pet profiles with last seen information. View a map of missing pets' last seen locations. Report sightings with descriptions or pictures. Remove profiles when pets are found.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-star feature-icon"></i>
                    <h3 class="feature-title">Reviews and Ratings</h3>
                    <p class="feature-description">Leave reviews and ratings for boarders and trainers.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-comments feature-icon"></i>
                    <h3 class="feature-title">Direct Messaging</h3>
                    <p class="feature-description">Communicate directly with boarders and trainers.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chart-pie feature-icon"></i>
                    <h3 class="feature-title">Analytics</h3>
                    <p class="feature-description">View booking history and trends (e.g., peak booking times, frequent services used).</p>
                </div>
            </div>
        </section>
        
        <!-- Pet Boarders Features -->
        <section class="features-section" id="pet-boarder-features">
            <h2 class="section-title">Pet Boarders Features</h2>
            <p class="section-message">Join Petfinity to provide top-notch boarding services and keep pet owners informed about their pets' well-being.</p>
            <div class="feature-container">
                <div class="feature-box">
                    <i class="fas fa-user feature-icon"></i>
                    <h3 class="feature-title">Profile Management</h3>
                    <p class="feature-description">Create and manage profile details including business information, services offered, and special amenities.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-calendar-check feature-icon"></i>
                    <h3 class="feature-title">Manage Boarding Appointments</h3>
                    <p class="feature-description">Input availability slots and manage bookings. Accept, decline, or reschedule bookings. Update the status of pets in their care with predefined tasks (e.g., fed, walked, groomed).</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-bell feature-icon"></i>
                    <h3 class="feature-title">Real-time Notifications</h3>
                    <p class="feature-description">Receive booking notifications and updates. Notify pet owners about the status of their pets.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-envelope feature-icon"></i>
                    <h3 class="feature-title">Direct Messaging</h3>
                    <p class="feature-description">Communicate directly with pet owners.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chart-bar feature-icon"></i>
                    <h3 class="feature-title">Analytics</h3>
                    <p class="feature-description">View occupancy rates, booking trends, and revenue generated from services.</p>
                </div>
            </div>
        </section>
        
        <!-- Pet Trainers Features -->
        <section class="features-section" id="pet-trainer-features">
            <h2 class="section-title">Pet Trainers Features</h2>
            <p class="section-message">Join Petfinity to offer professional training services and track the progress of pets under your care.</p>
            <div class="feature-container">
                <div class="feature-box">
                    <i class="fas fa-user feature-icon"></i>
                    <h3 class="feature-title">Profile Management</h3>
                    <p class="feature-description">Create and manage profile details including specialization, training methods, and availability.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-calendar-alt feature-icon"></i>
                    <h3 class="feature-title">Manage Training Services</h3>
                    <p class="feature-description">Input available time slots and manage bookings. Accept, decline, or reschedule training sessions. Create and share training plans with pet owners. Update and share the training progress of pets.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-bell feature-icon"></i>
                    <h3 class="feature-title">Real-time Notifications</h3>
                    <p class="feature-description">Receive booking notifications and updates. Notify pet owners about the progress of their pets' training.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-envelope feature-icon"></i>
                    <h3 class="feature-title">Direct Messaging</h3>
                    <p class="feature-description">Communicate directly with pet owners.</p>
                </div>
                <div class="feature-box">
                    <i class="fas fa-chart-line feature-icon"></i>
                    <h3 class="feature-title">Analytics</h3>
                    <p class="feature-description">View session attendance rates, popular training programs, and client feedback.</p>
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
