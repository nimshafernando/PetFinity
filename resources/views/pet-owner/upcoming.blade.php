<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upcoming Boarding Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.3.1/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/upcoming.css', 'resources/js/pet_owner_js/upcoming.js'])
</head>
<body class="bg-gray-50">
    <x-sidebar-nav />

    <div class="container min-h-screen">
        <div class="content">
            <h1 class="upcoming-heading">Upcoming Boarding Appointments</h1>
            @if ($appointments->isEmpty())
                <p class="no-appointments">No upcoming boarding appointments.</p>
            @else
                <div class="list-group">
                    @foreach ($appointments as $appointment)
                        <div class="card">
                            <div class="service-type">
                                <p class="heading">Service Type</p>
                                <p>Boarding</p>
                            </div>
                            <div>
                                <p class="heading">Pet Name</p>
                                <p>{{ $appointment->pet_name }}</p>
                            </div>
                            <div>
                                <p class="heading">Boarding Center</p>
                                <p>{{ $appointment->boarding_center_name }}</p>
                            </div>
                            <div>
                                <p class="heading">Start Date</p>
                                <p>{{ Carbon\Carbon::parse($appointment->start_date)->format('d-m-Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="heading">End Date</p>
                                <p>{{ Carbon\Carbon::parse($appointment->end_date)->format('d-m-Y H:i') }}</p>
                            </div>
                            <div>
                                <p class="heading">Check-in Time</p>
                                <p>{{ Carbon\Carbon::parse($appointment->check_in_time)->format('H:i') }}</p>
                            </div>
                            <div>
                                <p class="heading">Check-out Time</p>
                                <p>{{ Carbon\Carbon::parse($appointment->check_out_time)->format('H:i') }}</p>
                            </div>
                            <div>
                                <p class="heading">Payment Method</p>
                                <p>{{ $appointment->payment_method }}</p>
                            </div>
                            <div class="countdown">
                                <p class="heading">Countdown</p>
                                <span class="countdown-timer" data-date="{{ $appointment->start_date }}"></span>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</body>
</html>
