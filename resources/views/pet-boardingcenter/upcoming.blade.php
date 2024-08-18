<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Appointments</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        body {
            background-color: white;
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
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .top-navbar .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            color: #035a2e;
            margin-left: 20px;
        }

        .top-navbar .profile {
            display: flex;
            align-items: center;
            color: #333;
            cursor: pointer;
            font-size: 18px;
            margin-right: 50px;
            font-weight: bold;
        }

        .top-navbar .profile i {
            margin-left: 10px;
            font-size: 24px;
        }

        .sidebar {
            background-color: #fff;
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

        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #249EA0;
            border-radius: 10px;
            background-color: white;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 28px;
        }

        .card {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            border-bottom: 2px solid #249EA0;
            padding: 20px 0;
            transition: transform 0.3s, box-shadow 0.3s;
            min-width: 280px;
        }

        .card:last-child {
            border-bottom: none;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            flex: 1;
            text-align: left;
            padding: 10px 20px;
            min-width: 280px;
        }

        .card-title {
            font-weight: bold;
            font-size: 22px;
            color: #249EA0;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-text strong {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        .icon {
            font-size: 20px;
            margin-right: 10px;
            color: #249EA0;
        }

        .no-appointments {
            text-align: center;
            font-size: 18px;
            color: #777;
            padding: 20px;
            background-color: #e0f7f7;
            border: 1px solid #b3e5e5;
            border-radius: 10px;
        }

        .navbar {
            display: none;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .navbar ul li {
            padding: 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
                margin-top: 60px;
                width: 100%;
                padding: 0 10px;
            }

            .navbar {
                display: flex;
                justify-content: center;
            }

            .container {
                width: 100%;
                padding: 10px;
                border: none;
            }

            .card {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .card-body {
                width: 100%;
                padding: 10px 0;
            }

            .card-title,
            .card-text {
                width: 100%;
                text-align: left;
            }

            .profile{
                right: 20px
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .card {
                padding: 10px;
            }

            .card-title {
                padding: 10px;
                min-width: auto;
                font-size: 20px;
            }

            .card div {
                margin: 5px 0;
            }

            .icon {
                font-size: 18px;
            }

            .profile{
                right: 20px
            }

            .profile {
                text-decoration: none;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="top-navbar">
        <div class="logo">Petfinity</div>
        <a href="{{ route('boarding-center.profile')}}" class="profile">
            <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
        </a>    </div>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
<li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
<li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
<li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
<li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>

        </ul>
    </div>

    <div class="content">
        <div class="container">
            <h2>Upcoming Appointments</h2>
            @if($appointments->isEmpty())
                <p class="no-appointments">No upcoming appointments.</p>
            @else
                @foreach($appointments as $appointment)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-calendar-alt icon"></i> Appointment for {{ $appointment->pet_name }}</h5>
                            <p class="card-text">
                                <i class="fas fa-user icon"></i> <strong>Pet Owner:</strong> {{ $appointment->pet_owner_name }}<br>
                                <i class="fas fa-calendar-day icon"></i> <strong>Start Date:</strong> {{ $appointment->start_date }}<br>
                                <i class="fas fa-calendar-day icon"></i> <strong>End Date:</strong> {{ $appointment->end_date }}<br>
                                <i class="fas fa-clock icon"></i> <strong>Check-in Time:</strong> {{ $appointment->check_in_time }}<br>
                                <i class="fas fa-clock icon"></i> <strong>Check-out Time:</strong> {{ $appointment->check_out_time }}<br>
                                <i class="fas fa-sticky-note icon"></i> <strong>Special Notes:</strong> {{ $appointment->special_notes }}
                            </p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
            <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
            <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>
            
        </ul>
    </div>
</body>

</html>
