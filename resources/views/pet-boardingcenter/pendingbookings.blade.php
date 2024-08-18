<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Booking Requests</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- FontAwesome -->
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
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            border: none;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            color: #007bff;
            margin-bottom: 15px;
        }

        .card-text {
            color: #555;
        }

        .btn {
            border-radius: 50px;
            padding: 10px 20px;
            margin-right: 10px;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            border-radius: 50px;
            padding: 10px 15px;
        }

        .btn-container {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        @media (max-width: 576px) {
            .container {
                padding: 15px;
            }

            .card-body {
                padding: 15px;
            }
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

            .profile {
                text-decoration: none
            }
        }
    </style>
</head>

<body>
    <div class="top-navbar">
        <div class="logo">PetFinity</div>
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
            <h2>Pending Booking Requests</h2>
            @if($pendingAppointments->isEmpty())
            <p>No pending bookings.</p>
            @else
            @foreach($pendingAppointments as $appointment)
            <div class="card mb-3" id="appointment-{{ $appointment->id }}">
                <div class="card-body">
                    <h5 class="card-title">Booking Request for Pet : {{ $appointment->pet_name }}</h5>
                    <h5 class="card-title">Pet Type : {{ $appointment->pet_type }}</h5>
                    <p class="card-text">
                        <strong>Pet Owner:</strong> {{ $appointment->pet_owner_name }}<br>
                        <strong>Start Date:</strong> {{ $appointment->start_date }}<br>
                        <strong>End Date:</strong> {{ $appointment->end_date }}<br>
                        <strong>Check-in Time:</strong> {{ $appointment->check_in_time }}<br>
                        <strong>Check-out Time:</strong> {{ $appointment->check_out_time }}<br>
                        <strong>Special Notes:</strong> {{ $appointment->special_notes }}
                    </p>
                    <div class="btn-container">
                        <form action="{{ route('appointment.accept', $appointment->id) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                        <form action="{{ route('appointment.decline', $appointment->id) }}" method="POST"
                            class="d-inline" onsubmit="return validateDeclineReason({{ $appointment->id }})">
                            @csrf
                            <input type="hidden" name="declined_reason" id="declined_reason_hidden-{{ $appointment->id }}"
                                value="">
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </form>
                    </div>
                    <div class="form-group mt-2">
                        <label for="declined_reason-{{ $appointment->id }}">Reason for Declination</label>
                        <select id="declined_reason-{{ $appointment->id }}" class="form-control" required
                            onchange="toggleOtherReasonField({{ $appointment->id }})">
                            <option value="">Select a reason</option>
                            <option value="Not available">Not available</option>
                            <option value="Overbooked">Overbooked</option>
                            <option value="Other">Other</option>
                        </select>
                        <div class="error-message" id="error-message-{{ $appointment->id }}">Please select a reason for
                            declining the booking.</div>
                    </div>
                    <div class="form-group mt-2" id="other-reason-field-{{ $appointment->id }}" style="display: none;">
                        <label for="other_reason-{{ $appointment->id }}">Please specify</label>
                        <input type="text" name="other_reason" id="other_reason-{{ $appointment->id }}"
                            class="form-control" oninput="updateHiddenReason({{ $appointment->id }})">
                        <div class="error-message" id="other-error-message-{{ $appointment->id }}">Please provide a reason
                            for declining the booking.</div>
                    </div>
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

    <script>
        function toggleOtherReasonField(appointmentId) {
            var reasonSelect = document.getElementById('declined_reason-' + appointmentId);
            var otherReasonField = document.getElementById('other-reason-field-' + appointmentId);
            var hiddenReasonInput = document.getElementById('declined_reason_hidden-' + appointmentId);

            if (reasonSelect.value === 'Other') {
                otherReasonField.style.display = 'block';
                hiddenReasonInput.value = '';
            } else {
                otherReasonField.style.display = 'none';
                hiddenReasonInput.value = reasonSelect.value;
            }
        }

        function updateHiddenReason(appointmentId) {
            var otherReasonInput = document.getElementById('other_reason-' + appointmentId);
            var hiddenReasonInput = document.getElementById('declined_reason_hidden-' + appointmentId);

            hiddenReasonInput.value = otherReasonInput.value;
        }

        function validateDeclineReason(appointmentId) {
            var reasonSelect = document.getElementById('declined_reason-' + appointmentId);
            var hiddenReasonInput = document.getElementById('declined_reason_hidden-' + appointmentId);
            var otherReasonInput = document.getElementById('other_reason-' + appointmentId);
            var errorMessage = document.getElementById('error-message-' + appointmentId);
            var otherErrorMessage = document.getElementById('other-error-message-' + appointmentId);

            errorMessage.style.display = 'none';
            otherErrorMessage.style.display = 'none';

            if (reasonSelect.value === '') {
                errorMessage.style.display = 'block';
                return false;
            }

            if (reasonSelect.value === 'Other' && otherReasonInput.value.trim() === '') {
                otherErrorMessage.style.display = 'block';
                return false;
            }

            hiddenReasonInput.value = reasonSelect.value !== 'Other' ? reasonSelect.value : otherReasonInput.value;
            return true;
        }
    </script>
</body>

</html>
