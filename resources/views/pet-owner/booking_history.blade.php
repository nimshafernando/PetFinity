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

        .main-container {
            padding: 20px;
            background-color: #F7E9DE;
            min-height: 100vh;
        }

        .content {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 2.5rem;
            color: #ff6600;
            margin-bottom: 20px;
            text-align: center;
        }

        .no-bookings {
            font-size: 1.5rem;
            color: #666;
            text-align: center;
            margin-top: 40px;
        }

        .card {
            margin-bottom: 20px;
            padding: 20px;
            background-color: #ffe6cc;
            border: none;
            border-radius: 20px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .card div {
            margin-bottom: 10px;
        }

        .heading {
            font-weight: bold;
            color: #ff6600;
            margin-right: 10px;
        }

        .status {
            font-weight: bold;
            color: #434343;
            padding: 5px 10px;
            border-radius: 10px;
            display: inline-block;
        }

        .status.completed {
            background-color: #4CAF50;
        }

        .status.cancelled {
            background-color: #F44336;
        }

        .status.pending {
            background-color: #FFC107;
        }

        .review-button {
            text-align: center;
            margin-top: 20px;
        }

        .review-button a {
            background-color: #ff6600;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .review-button a:hover {
            background-color: #F15F61;
        }
    </style>
</head>

<body>

    <x-sidebar-nav />

    <div class="main-container">

        <!-- Booking History Content -->
        <div class="content">
            <h1>Booking History</h1>
            @if ($appointments->isEmpty())
            <p class="no-bookings">No past bookings.</p> <!-- Updated to reflect any past bookings -->
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
                        <span class="heading">Payment Method:</span> <span>{{ $appointment->payment_method ?? 'N/A' }}</span> <!-- Default to N/A if payment method isn't implemented -->
                    </div>
                    
                    <div>
                        <span class="heading">Total Price:</span> <span>${{ number_format($appointment->total_price, 2) }}</span>
                    </div>
                    
                    {{-- <div class="status {{ $appointment->status }}">
                        <span class="heading">Status:</span> <span>{{ ucfirst($appointment->status) }}</span>
                    </div> --}}
                    
                    <!-- Leave a Review Button -->
                    @if(Carbon\Carbon::parse($appointment->end_date)->isPast())
                    <div class="review-button">
                        <a href="{{ route('reviews.create', $appointment->id) }}" class="btn btn-primary">Leave a Review</a>
                    </div>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    @vite(['resources/js/pet_owner_js/bookinghistory.js'])
</body>

</html>
