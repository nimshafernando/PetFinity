<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Include Bootstrap 5 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Include Bootstrap 5 JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        body {
            background-color: #FFEBCC;
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
            color: #ff6600;
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
            background-color: #ff6600;
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

        /* Button for upcoming appointments */
        .upcoming-appointments-btn {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
            text-align: center;
            transition: background-color 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .upcoming-appointments-btn:hover {
            background-color: #ff9500;
            text-decoration: none;
        }

        /* Card Styling */
        .card {
            background-color: white;
            border: 2px solid #ff6600;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
            transition: all 0.3s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
        }

        .card-body {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        .card-body div {
            margin: 10px 0;
        }

        .card-body p {
            margin: 0;
        }

        .card .heading {
            font-weight: bolder;
            font-size: 18px;
            color: #ff6600;
            display: flex;
            align-items: center;
            text-align: center;
        }

        .card .heading i {
            margin-right: 10px;
        }

        .card p {
            font-size: 16px;
            font-weight: 600;
        }

        .service-type {
            background-color: #ff6600;
            color: white;
            padding: 10px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            grid-column: span 3;
        }

        .countdown {
            font-size: 14px;
            font-weight: bold;
            background-color: transparent;
            color: #ff6600;
            padding: 5px;
            border-radius: 20px;
            min-width: 120px;
            text-align: center;
            transition: all 0.5s ease-in-out;
            grid-column: span 3;
        }

        .countdown-timer {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            padding: 5px;
            display: inline-block;
        }

        .countdown-description {
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .notification {
            font-size: 14px;
            color: #ff6600;
            margin-top: 10px;
            text-align: center;
            display: none;
        }

        .upcoming-heading {
            font-family: 'Fredoka One', cursive;
            font-size: 45px;
            font-weight: bold;
            color: #ff6600;
            text-align: center;
            margin-bottom: 20px;
        }

        .no-appointments {
            text-align: center;
            font-size: 18px;
            color: #999;
        }

        /* Bottom Navbar */
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
            color: #ff6600;
        }

        .bottom-navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        .profile {
            text-decoration: none;
        }

        /* Media Queries for Responsiveness */
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
            .card-body {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .countdown {
                margin-top: 20px;
                position: static;
            }

            .card .heading {
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .card {
                padding: 15px;
                font-size: 14px;
            }

            .upcoming-heading {
                font-size: 30px;
            }

            .top-navbar .logo {
                font-size: 24px;
            }

            .top-navbar .profile {
                font-size: 16px;
            }

            .countdown {
                font-size: 12px;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="top-navbar">
        <div class="logo">PetFinity</div>
        <a href="{{ route('pet-owner.profile.edit') }}" class="profile {{ request()->routeIs('pet-owner.profile.edit') ? 'active' : '' }}">
            <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
        </a>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}" class="{{ Route::is('pet-owner.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}" class="{{ Route::is('mypets') ? 'active' : '' }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}" class="{{ Route::is('boarding-centers.index') ? 'active' : '' }}"><i class="fas fa-bed"></i>Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}" class="{{ Route::is('appointments.upcoming') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}" class="{{ Route::is('appointments.history') ? 'active' : '' }}"><i class="fas fa-history"></i>History</a></li>
        </ul>
    </div>

    <div class="container main-content">
        <!-- Display the number of upcoming appointments -->
        <a href="#" class="upcoming-appointments-btn">
            Upcoming Appointments: {{ $appointments->count() }}
        </a>

        <h1 class="upcoming-heading">Upcoming Boarding Appointments</h1>
        @if ($appointments->isEmpty())
        <p class="no-appointments">No upcoming boarding appointments.</p>
        @else
        <div class="list-group">
            @foreach ($appointments as $appointment)
            <div class="card">
                <div class="service-type">
                    Boarding Service
                </div>
                <div class="card-body">
                    <div>
                        <p class="heading"><i class="fas fa-paw"></i> Pet Name</p>
                        <p>{{ $appointment->pet_name }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-bed"></i> Boarding Center</p>
                        <p>{{ $appointment->boarding_center_name }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-calendar-alt"></i> Start Date</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->start_date)->format('d-m-Y') }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-calendar-alt"></i> End Date</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->end_date)->format('d-m-Y') }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-clock"></i> Check-in Time</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->check_in_time)->format('H:i') }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-clock"></i> Check-out Time</p>
                        <p>{{ \Carbon\Carbon::parse($appointment->check_out_time)->format('H:i') }}</p>
                    </div>
                    <div>
                        <p class="heading"><i class="fas fa-money-bill"></i> Payment Method</p>
                        <p>{{ $appointment->payment_method }}</p>
                    </div>
                </div>
                <!-- Countdown Section -->
                <div class="countdown">
                    <p class="countdown-description">Time remaining until the appointment starts:</p>
                    <span class="countdown-timer" data-date="{{ $appointment->start_date }}"></span>
                </div>
                <div class="notification" id="notification_{{ $appointment->id }}"></div>
            </div>
            @endforeach
        </div>
        @endif
    </div>

    <!-- Bottom Navbar -->
    <div class="bottom-navbar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}" class="{{ Route::is('pet-owner.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}" class="{{ Route::is('mypets') ? 'active' : '' }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}" class="{{ Route::is('boarding-centers.index') ? 'active' : '' }}"><i class="fas fa-bed"></i> Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}" class="{{ Route::is('appointments.upcoming') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}" class="{{ Route::is('appointments.history') ? 'active' : '' }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>

    <!-- Countdown Timer Script -->
    <script>
            document.querySelectorAll('.countdown-timer').forEach(function (countdownElement) {
            const targetDate = new Date(countdownElement.getAttribute('data-date')).getTime();

            function updateCountdown() {
                const now = new Date().getTime();
                const distance = targetDate - now;

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                countdownElement.innerHTML = `${days}d ${hours}h ${minutes}m ${seconds}s`;

                countdownElement.style.color = "#333";
                countdownElement.style.fontSize = "24px";
                countdownElement.style.fontWeight = "bold";
                countdownElement.style.transition = 'color 0.5s ease-in-out';
            }

            // Initial countdown update
            updateCountdown();

            // Update every second
            setInterval(updateCountdown, 1000);
        });

    </script>

</body>

</html>