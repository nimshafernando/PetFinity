<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        body {
            background-image: url('https://your-image-url.com/pet-background.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
            backdrop-filter: blur(10px);
        }

        .top-navbar .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            color: #035a2e;
        }

        .top-navbar .profile {
            display: flex;
            align-items: center;
            color: #333;
            cursor: pointer;
            font-size: 18px;
            margin-left: auto;
            font-weight: bold;
        }

        .top-navbar .profile i {
            margin-left: 10px;
            font-size: 24px;
        }

        .sidebar {
            background-color: rgba(255, 255, 255, 0.95);
            width: 250px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            z-index: 10;
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            overflow-y: auto;
            backdrop-filter: blur(10px);
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
            border-radius: 8px;
            margin: 0 10px;
            font-weight: bold;
        }

        .sidebar ul li:hover {
            background-color: #0d8c0b;
            color: #fff;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            margin-right: 10px;
            font-size: 20px;
        }

        .main-content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
            width: calc(100% - 250px);
            backdrop-filter: blur(10px);
        }

        .navbar {
            background-color: rgba(33, 150, 243, 0.9);
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 10px;
        }

        .welcome-message {
            background: linear-gradient(to right, #4CAF50, #2196F3);
            color: white;
            padding: 40px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 60px;
            font-family: 'Fredoka One', cursive;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            line-height: 1.2;
            overflow-wrap: break-word;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section-header {
            font-size: 28px;
            font-family: 'Fredoka One', cursive;
            color: #4CAF50;
            margin-top: 40px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .card {
    background-color: #e0f7fa;
    border: none;
    border-radius: 20px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    padding: 20px; /* Adjusted padding for more space within the card */
    text-align: center;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Ensure even spacing between elements */
}

.card p {
    text-align: center; /* Center align the text */
    margin-bottom: 10px; /* Add some space below the text */
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
}

.card-header {
    font-size: 1.7rem;
    color: #035a2e;
    font-family: 'Fredoka One', cursive;
    margin-bottom: 15px;
    text-align: center;
}

.card img {
    max-width: 180px; /* Set a maximum width */
    height: auto; /* Maintain the aspect ratio */
    border-radius: 10px; /* Add rounded corners */
    margin: 0 auto 20px auto; /* Add space below the image */
    display: block; /* Ensure the image is a block element */
    transition: transform 0.3s ease-in-out;
}

.card img:hover {
    transform: scale(1.05); /* Enlarge the image on hover */
}

.btn-primary {
    background-color: #035a2e;
    border: none;
    padding: 12px 25px;
    border-radius: 20px;
    font-size: 1.2rem;
    font-weight: bold;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    margin-top: 15px; /* Ensure there is space above the button */
}

.btn-primary:hover {
    background-color: #02874a;
    transform: scale(1.05);
}

        /* Two Rows of Two Cards */
        .two-rows-of-two-cards .card {
            margin-bottom: 20px;
        }

        /* Additional Section Styling */
        .additional-sections .section {
            background-color: #e0f7fa;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .additional-sections .section:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
        }

        .additional-sections .section img {
            max-width: 150px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .additional-sections .section .text-content {
            flex-grow: 1;
            padding: 10px;
        }

        .additional-sections .section .text-content h3 {
            font-size: 1.5rem;
            color: #035a2e;
            font-family: 'Fredoka One', cursive;
            margin-bottom: 10px;
        }

        .additional-sections .section .text-content p {
            color: #666;
            margin-bottom: 15px;
        }

        .additional-sections .section .btn-primary {
            margin-left: auto;
            background-color: #f57c00;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .additional-sections .section .btn-primary:hover {
            background-color: #ef6c00;
            transform: scale(1.05);
        }

        .bottom-navbar {
            display: none;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .bottom-navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .bottom-navbar ul li {
            padding: 10px;
        }

        .bottom-navbar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .bottom-navbar ul li a:hover {
            color: #035a2e;
        }

        .bottom-navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        .profile {
            text-decoration: none;
        }

        @media (max-width: 1200px) {
            .main-content {
                margin-left: 0;
                margin-top: 60px;
                padding: 20px;
                width: 100%;
            }

            .sidebar {
                display: none;
            }

            .bottom-navbar {
                display: flex;
                justify-content: center;
            }
        }

        @media (max-width: 768px) {
            .two-rows-of-two-cards .card {
                flex-direction: column;
                max-width: 100%;
            }

            .two-rows-of-two-cards .row {
                flex-direction: column;
            }

            .additional-sections .section {
                flex-direction: column;
                text-align: center;
            }

            .additional-sections .section img {
                margin-bottom: 20px;
            }

            .top-navbar .profile {
                position: absolute;
                right: 20px;
                top: 10px;
            }

            .welcome-message {
                font-size: 58px;
            }
        }

        @media (max-width: 480px) {
            .welcome-message {
                font-size: 56px;
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="top-navbar">
        <div class="logo">PetFinity</div>
        <a href="{{ route('boarding-center.profile')}}" class="profile">
            <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
        </a>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
            <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
            <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div>For all your infinite needs!</div>
            <div>Available For Bookings</div>
        </div>

        <div class="welcome-message">
            Welcome to PetFinity
        </div>

        <!-- Section Headers -->
        <h2 class="section-header">Quick Access</h2>

        <!-- Two Rows of Two Cards -->
        <div class="two-rows-of-two-cards">
            <!-- Row 1 -->
            <div class="row">
                <!-- Views Analytics Card -->
                <div class="mb-4 col-md-6">
                    <div class="card card-analytics h-100">
                        <div class="card-header">
                            <span class="fas fa-chart-line"></span> View Analytics
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="flex-grow-1">Analyze your pet boarding center’s performance with detailed statistics and insights.</p>
                            <img src="{{ asset('images/boarder/analysis.png') }}" alt="Analytics">
                            <a href="{{ route('petboarder.analytics') }}" class="mt-auto btn btn-primary align-button">
                                <span class="fas fa-chart-line"></span> View Analytics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="mb-4 col-md-6">
                    <div class="card card-price h-100">
                        <div class="card-header">
                            <span class="fas fa-dollar-sign"></span> Set or Update Price Per Night
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="flex-grow-1">Adjust the pricing for your pet boarding services. Ensure your prices are up-to-date.</p>
                            <form action="{{ route('boarding-center.update-price') }}" method="POST" class="mt-auto text-center">
                                @csrf
                                <div class="form-group">
                                    <label for="price_per_night">Price Per Night (LKR)</label>
                                    <input type="number" step="0.01" name="price_per_night" id="price_per_night" class="form-control" value="{{ Auth::user()->price_per_night }}" required>
                                </div>
                                <button type="submit" class="btn btn-primary align-button">
                                    <span class="fas fa-save"></span> Update Price
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
                

            <!-- Row 2 -->
            <div class="row">
                <!-- Manage Tasks Section -->
                <div class="mb-4 col-md-6">
                    <div class="card card-tasks h-100">
                        <div class="card-header">
                            <span class="fas fa-tasks"></span> Manage Tasks
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="flex-grow-1">Organize and manage tasks related to pet care in your boarding center.</p>
                            <img src="{{ asset('images/boarder/prioritize.png') }}" alt="Manage Tasks">
                            <a href="{{ route('pet.boardingcenter.managetasks.list') }}" class="mt-auto btn btn-primary align-button">
                                <span class="fas fa-cogs"></span> Manage Tasks
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Check Reviews Section -->
                <div class="mb-4 col-md-6">
                    <div class="card card-reviews h-100">
                        <div class="card-header">
                            <span class="fas fa-star"></span> Check Reviews
                        </div>
                        <div class="card-body d-flex flex-column align-items-center">
                            <p class="flex-grow-1">View and respond to reviews left by pet owners for your boarding services.</p>
                            <img src="{{ asset('images/boarder/rating.png') }}"alt="Check Reviews">
                            <a href="{{ route('boarding-center.reviews') }}" class="mt-auto btn btn-primary align-button">
                                <span class="fas fa-eye"></span> View Reviews
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Layout for Additional Sections -->
        <div class="additional-sections">
            <!-- Section Header -->
            <h2 class="section-header">Training & Certification</h2>

            <!-- Training and Certification Section -->
            <div class="section">
                <img src="{{ asset('images/boarder/certificate.png') }}" alt="Training and Certification">
                <div class="text-content">
                    <h3>Training and Certification</h3>
                    <p>Enhance your skills and qualifications with the world-wide certified training programs. Stay updated with the latest in pet care practices.</p>
                    <a href="https://www.petboardingcertification.com/" class="btn btn-primary">
                        <span class="fas fa-graduation-cap"></span> Explore Training
                    </a>
                </div>
            </div>

            <!-- Section Header -->
            <h2 class="section-header">Upcoming Business Trends</h2>

            <!-- Upcoming Business Trends Section -->
            <div class="section">
                <img src="{{ asset('images/boarder/increase.png') }}" alt="Business Trends">
                <div class="text-content">
                    <h3>Upcoming Business Trends</h3>
                    <p>Stay ahead of the curve by learning about the latest trends in the pet boarding industry. Adapt and grow your business effectively.</p>
                    <a href="https://www.grandviewresearch.com/industry-analysis/pet-boarding-services-market-report" class="btn btn-primary">
                        <span class="fas fa-chart-line"></span> View Trends
                    </a>
                </div>
            </div>

            <!-- Section Header -->
            <h2 class="section-header">Pet Healthcare</h2>

            <!-- Pet Healthcare Section -->
            <div class="section">
                <img src="{{ asset('images/boarder/pet-care (4).png') }}" alt="Pet Healthcare">
                <div class="text-content">
                    <h3>Pet Healthcare</h3>
                    <p>Ensure the well-being of your boarded pets by following the best healthcare practices. Access resources and expert advice on pet health.</p>
                    <a href="https://www.forbes.com/councils/forbesbusinesscouncil/2024/01/18/five-emerging-trends-in-pet-health-care-for-2024-and-beyond/" class="btn btn-primary">
                        <span class="fas fa-notes-medical"></span> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-navbar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Requests</a></li>
            <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> Schedule</a></li>
            <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>
</body>

</html>