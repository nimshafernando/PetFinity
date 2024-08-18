<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            color: #ff6600;
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
        }

        .navbar {
            background-color: #2196F3;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-message {
            background: linear-gradient(to right, #4CAF50, #2196F3);
            color: white;
            padding: 40px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 24px;
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
            color: #ff6600;
        }

        .bottom-navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                margin-top: 60px;
                width: 100%;
                padding: 0 10px;
            }

            .bottom-navbar {
                display: flex;
                justify-content: center;
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
        }
        .profile {
            text-decoration: none;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="top-navbar">
        <div class="logo">PetFinity</div>
        <a href="{{ route('training-center.profile')}}" class="profile">
            <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
        </a>
    </div>

    <div class="sidebar">
        <ul>
            <li>
                {{-- <a href="{{ route('pet-boardingcenter.dashboard')}}"> --}}
                <i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                {{-- <a href="{{ route('pet-boardingcenter.pendingbookings') }}"> --}}
                    <i class="fas fa-clock"></i> Pending Requests</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.upcoming') }}"> --}}
                    <i class="fas fa-calendar-check"></i> My Schedule</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.pet-profiles') }}"> --}}
                <i class="fas fa-dog"></i> Pets</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.appointment-history') }}"> --}}
                <i class="fas fa-history"></i> Appointment History</a></li>

            <li><a href="{{ route('boarding-center.profile')}}">
                <i class="fas fa-user-circle"></i> Profile</a></li>
            
        </ul>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div>For all your infinite needs!</div>
            {{-- <div>Hello </div> --}}
            <div>Available For Training Sessions</div>
        </div>
        <div class="welcome-message">
            Welcome to PetFinity
        </div>
    </div>

    <div class="bottom-navbar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
            <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
            <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>
            <li><a href="{{ route('boarding-center.profile')}}"><i class="fas fa-user-circle"></i> Profile</a></li>
            
        </ul>
    </div>
</body>

</html>
