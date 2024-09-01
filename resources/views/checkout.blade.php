<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - Petfinity</title>
    <style>
        @keyframes gradientBackground {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #ff6600;            
            background-size: 400% 400%;
            animation: gradientBackground 15s ease infinite;
            color: #333;
        }

        .checkout-container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .checkout-header h1 {
            margin: 0;
            color: #ff6600;
            font-size: 28px;
        }

        .section {
            margin-bottom: 30px;
        }

        .section h2 {
            font-size: 22px;
            margin-bottom: 10px;
            color: #333;
            border-bottom: 2px solid #ff6600;
            padding-bottom: 5px;
        }

        .section p {
            margin: 5px 0;
            font-size: 16px;
            line-height: 1.6;
        }

        .section .price {
            font-size: 20px;
            font-weight: bold;
            color: #ff6600;
        }

        .payment-options {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .payment-option {
            display: flex;
            align-items: center;
            cursor: pointer;
            padding: 15px;
            border: 2px solid #ddd;
            border-radius: 10px;
            transition: all 0.3s ease;
            width: 48%;
            text-align: center;
            background-color: #fafafa;
        }

        .payment-option img {
            width: 40px;
            height: 40px;
            margin-bottom: 10px;
        }

        .payment-option:hover, .payment-option.selected {
            background-color: #ff6600;
            color: #fff;
            border-color: #ff6600;
            transform: scale(1.05);
        }

        .review-section {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .review-section h2 {
            margin-bottom: 10px;
            font-size: 20px;
            color: #555;
        }

        .review-section p {
            margin: 5px 0;
            font-size: 16px;
            color: #333;
        }

        .payment-button {
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center;     /* Center vertically */
            margin-top: 30px;
        }

        .payment-button button {
            background-color: #ff6600;
            color: #fff;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .payment-button button:hover {
            background-color: #e55b00;
            transform: scale(1.05);
        }
    </style>
</head>

<body>

    <div class="checkout-container">
        <div class="checkout-header">
            <h1>Checkout - Petfinity</h1>
        </div>

        <div class="container">
            @if(isset($appointment))
                <h1>Checkout for {{ $appointment->pet->pet_name }}</h1>
                <p>Service: {{ $appointment->pet->type }}</p>
                <p>Date: {{ $appointment->start_date }} to {{ $appointment->end_date }}</p>
                <p>Boarding Center: {{ $appointment->boardingCenter->business_name }}</p>
                <p>Total Price: LKR {{ $appointment->total_price }}</p>
                <!-- Additional details can be added here -->
            @else
                <p>Appointment details not available.</p>
            @endif
        </div>

        <div class="section">
            <h2>Payment Method</h2>
            <p>Select your payment method:</p>
            <div class="payment-options">
                <div class="payment-option" id="card-option" onclick="selectPayment('card')">
                    <img src="https://img.icons8.com/ios-filled/50/000000/bank-card-front-side.png" alt="Card">
                    <span>Card Payment</span>
                </div>
                <div class="payment-option" id="cash-option" onclick="selectPayment('cash')">
                    <img src="https://img.icons8.com/ios-filled/50/000000/money.png" alt="Cash">
                    <span>Cash Payment</span>
                </div>
            </div>
        </div>

        <form action="{{ route('stripe') }}" method="post">
            @csrf
            <input type="hidden" name="product_name" value="Pet Boarding - Bella">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="price" value="7500">
            <input type="hidden" name="payment_method" id="payment-method" value="">
        
            <div class="payment-button">
                <button type="submit" id="stripe-payment-button" style="display: none;">Complete Payment</button>
                <button type="button" id="cash-payment-button" style="display: none;">Complete Appointment</button>
            </div>
        </form>
        

        <script>
            function selectPayment(method) {
                const paymentMethodInput = document.getElementById('payment-method');
                const stripeButton = document.getElementById('stripe-payment-button');
                const cashButton = document.getElementById('cash-payment-button');
        
                paymentMethodInput.value = method; // Set the payment method
        
                // Reset styles for all options
                document.getElementById('card-option').classList.remove('selected');
                document.getElementById('cash-option').classList.remove('selected');
        
                // Hide both buttons initially
                stripeButton.style.display = 'none';
                cashButton.style.display = 'none';
        
                // Conditionally display buttons and set actions
                if (method === 'card') {
                    document.getElementById('card-option').classList.add('selected');
                    stripeButton.style.display = 'block'; // Show only Stripe button
                } else if (method === 'cash') {
                    document.getElementById('cash-option').classList.add('selected');
                    cashButton.style.display = 'block'; // Show only Cash button
                    cashButton.onclick = function() {
                        window.location.href = '/cash'; // Redirect to the cash page when clicked
                    };
                }
            }
        </script>
        

</body>

</html>
