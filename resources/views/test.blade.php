<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - Petfinity</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;700&display=swap');

        body {
            font-family: 'Fredoka', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ff6600;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .checkout-container {
            width: 90%;
            max-width: 800px;
            padding: 30px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            position: relative;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ff6600;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: #e55b00;
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .payment-button {
            background-color: #ff6600;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 20px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;
            margin-top: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none; /* Initially hidden */
        }

        .payment-button:hover {
            background-color: #e55b00;
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            color: #ff6600;
            font-size: 32px;
        }

        .header p {
            color: #555;
            font-size: 18px;
        }

        .details-section, .payment-method-section {
            padding: 20px;
            background-color: #ffeedb;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .details-section h2, .payment-method-section h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .payment-option {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
            background-color: #ffd3a6;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            position: relative;
        }

        .payment-option:hover, .payment-option.active {
            background-color: #ffc087;
            transform: translateY(-10px);
        }

        .payment-option svg {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
            fill: #ff6600;
        }

        .payment-option span {
            font-size: 18px;
            color: #333;
            font-weight: bold;
        }

        .grid-container {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        @media (max-width: 768px) {
            .grid-container {
                flex-direction: column;
                align-items: center;
            }
        }

        .card-label {
            position: absolute;
            top: -15px;
            right: -15px;
            background-color: #ff6600;
            color: #fff;
            padding: 5px 10px;
            border-radius: 50%;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="checkout-container">
        <!-- Header -->
        <div class="header">
            <h1>Checkout - Petfinity</h1>
            <p>You're one step away from securing your pet's appointment!</p>
        </div>

        <!-- Back to Dashboard Button -->
        <a href="{{ route('pet-owner.dashboard') }}" class="back-button">Back to Dashboard</a>

        <!-- Appointment Details Section -->
        <div class="details-section">
            <h2>Appointment Details</h2>
            @if(isset($appointment))
                <div class="details">
                    <p><strong>Pet Name:</strong> {{ $appointment->pet->pet_name }}</p>
                    <p><strong>Start Date:</strong> {{ $appointment->start_date }}</p>
                    <p><strong>Check-in Time:</strong> {{ $appointment->check_in_time}}</p>
                    <p><strong>End Date:</strong> {{ $appointment->end_date }}</p>
                    <p><strong>Check-out Time:</strong> {{ $appointment->check_out_time }}</p>
                    <p><strong>Boarding Center:</strong> {{ $appointment->boardingCenter->business_name }}</p>
                    <p><strong>Total Price:</strong> LKR {{ $appointment->total_price }}</p>
                </div>
            @else
                <p>Appointment details not available.</p>
            @endif
        </div>

        <!-- Payment Method Section -->
        <div class="payment-method-section">
            <h2>Choose Your Payment Method</h2>
            <p style="text-align: center; margin-bottom: 20px; font-size: 18px; color: #555;">
                Select your preferred payment method below to complete your booking.
            </p>
            <div class="grid-container">
                <!-- Card Payment Option -->
                <div id="card-option" class="payment-option" onclick="selectPayment('card')">
                    <div class="card-label">Credit/Debit</div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M3 10.5h18M3 14.25h18M4.5 6h15A2.25 2.25 0 0121.75 8.25v7.5A2.25 2.25 0 0119.5 18h-15A2.25 2.25 0 014.5 15.75v-7.5A2.25 2.25 0 014.5 6z" />
                    </svg>
                    <span>Pay with Card</span>
                </div>

                <!-- Cash Payment Option -->
                <div id="cash-option" class="payment-option" onclick="selectPayment('cash')">
                    <div class="card-label">Cash</div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 8.25c-1.794 0-3.25 1.455-3.25 3.25s1.456 3.25 3.25 3.25 3.25-1.455 3.25-3.25-1.456-3.25-3.25-3.25zM19.25 7.75A2.25 2.25 0 0121.5 10v4a2.25 2.25 0 01-2.25 2.25H4.75A2.25 2.25 0 012.5 14v-4A2.25 2.25 0 014.75 7.75h14.5zM4.5 5.25A1.5 1.5 0 006 3.75h12a1.5 1.5 0 011.5 1.5v1.5H4.5V5.25zM4.5 16.5v1.5a1.5 1.5 0 001.5 1.5h12a1.5 1.5 0 001.5-1.5v-1.5H4.5z" />
                    </svg>
                    <span>Pay with Cash</span>
                </div>
            </div>
        </div>

        <!-- Submit Button Section -->
        <form action="{{ route('stripe') }}" method="post">
            @csrf
            <!-- Include product details and user details in hidden fields -->
            <input type="hidden" name="product_name" value="Pet Boarding - {{ $appointment->pet->pet_name }}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="price" value="{{ $appointment->total_price }}">
            
            <!-- Additional details to be sent as metadata -->
            <input type="hidden" name="pet_name" value="{{ $appointment->pet->pet_name }}">
            <input type="hidden" name="check_in" value="{{ $appointment->start_date }}">
            <input type="hidden" name="check_out" value="{{ $appointment->end_date }}">
            <input type="hidden" name="boarding_center" value="{{ $appointment->boardingCenter->business_name }}">
            <input type="hidden" name="profile_pic_url" value="{{ $appointment->boardingCenter->profile_photo_url }}">
            <input type="hidden" name="owner_first_name" value="{{ $appointment->petOwner->first_name }}">
            <input type="hidden" name="owner_last_name" value="{{ $appointment->petOwner->last_name }}">
        
            <!-- Submit buttons -->
            <button type="submit" class="payment-button" id="stripe-payment-button">Complete Payment</button>
            <button type="button" class="payment-button" id="cash-payment-button">Complete Appointment</button>
        </form>
        
    </div>

    <script>
        function selectPayment(method) {
            const stripeButton = document.getElementById('stripe-payment-button');
            const cashButton = document.getElementById('cash-payment-button');

            // Reset styles for all options
            document.getElementById('card-option').classList.remove('active');
            document.getElementById('cash-option').classList.remove('active');

            // Hide both buttons initially
            stripeButton.style.display = 'none';
            cashButton.style.display = 'none';

            // Conditionally display the selected button and set active class
            if (method === 'card') {
                document.getElementById('card-option').classList.add('active');
                stripeButton.style.display = 'block';
            } else if (method === 'cash') {
                document.getElementById('cash-option').classList.add('active');
                cashButton.style.display = 'block';
                cashButton.onclick = function () {
                    window.location.href = '{{ route("cash.payment") }}';
                };
            }
        }
    </script>

</body>

</html>
