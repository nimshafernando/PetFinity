<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.3.1/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/bookinghistory.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
    </style>
</head>

<body>

    <x-sidebar-nav />

    <div class="main-container">

        <!-- Booking History Content -->
        <div class="content">
            <h1>Booking History</h1>
            @if ($appointments->isEmpty())
            <p class="no-bookings">No completed bookings.</p>
            @else
            <div class="list-group">
                @foreach ($appointments as $index => $appointment)
                <div class="card">
                    
                    <div>
                        <span class="heading">Pet Name:</span> <span>{{ $appointment->pet_name }}</span>
                    </div>
                    <div>
                        <span class="heading">Boarding Center:</span> <span>{{ $appointment->boarding_center_name }}</span>
                    </div>
                    <div>
                        <span class="heading">Start Date:</span> <span>{{ Carbon\Carbon::parse($appointment->start_date)->format('d-m-Y H:i') }}</span>
                    </div>
                    <div>
                        <span class="heading">End Date:</span> <span>{{ Carbon\Carbon::parse($appointment->end_date)->format('d-m-Y H:i') }}</span>
                    </div>
                    <div>
                        <span class="heading">Check-in Time:</span> <span>{{ Carbon\Carbon::parse($appointment->check_in_time)->format('H:i') }}</span>
                    </div>
                    <div>
                        <span class="heading">Check-out Time:</span> <span>{{ Carbon\Carbon::parse($appointment->check_out_time)->format('H:i') }}</span>
                    </div>
                    <div>
                        <span class="heading">Payment Method:</span> <span>{{ $appointment->payment_method }}</span>
                    </div>
                    <div class="status {{ $appointment->status }}">
                        <span class="heading">Status:</span> <span>{{ ucfirst($appointment->status) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    @vite(['resources/js/pet_owner_js/bookinghistory.js'])
</body>

</html>
