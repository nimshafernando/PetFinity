<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>
    <style>
        @keyframes moveBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: linear-gradient(270deg, #ff6600, #e05500, #ff6600);
            background-size: 600% 600%;
            animation: moveBackground 15s ease infinite;
        }

        .container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon {
            font-size: 80px;
            color: #28a745;
            margin-bottom: 20px;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }
            70% {
                transform: scale(1.1);
                box-shadow: 0 0 15px 5px rgba(40, 167, 69, 0);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }

        h1 {
            color: #ff6600;
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .price {
            font-size: 26px;
            color: #ff6600;
            margin: 20px 0;
            font-weight: bold;
            transition: color 0.3s;
        }

        .price:hover {
            color: #e05500;
        }

        .btn-download {
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            margin-top: 20px;
            display: inline-block;
        }

        .btn-download:hover {
            background-color: #e05500;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 102, 0, 0.3);
        }

        .message {
            font-size: 16px;
            color: #777;
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            transition: color 0.3s;
        }

        .message strong {
            color: #ff6600;
        }

        .message:hover {
            color: #555;
        }

        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #ffffff;
            color: #ff6600;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }


        .back-button:hover {
            background-color: #451c00;
            color: #ffffff;

            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }



        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }

            .price {
                font-size: 22px;
            }

            .btn-download {
                font-size: 16px;
                padding: 12px 24px;
            }

            p {
                font-size: 16px;
            }

            .back-button {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 20px;
            }

            .price {
                font-size: 18px;
            }

            .btn-download {
                font-size: 14px;
                padding: 10px 20px;
            }

            p {
                font-size: 14px;
            }

            .back-button {
                font-size: 12px;
            }
        }
    </style>
</head>
<body>

    <a href="{{ route('pet-owner.dashboard') }}" class="back-button">Back to Dashboard</a>

    

    <div class="container">
        <div class="icon">✅</div> <!-- New Tick Icon -->
        <h1>Thank you for your payment!</h1>
        <p><strong>Pet Boarding Center:</strong> {{ $metadata['boarding_center'] }}</p>
        <p><strong>Pet Name:</strong> {{ $metadata['pet_name'] }}</p>
        <p><strong>Check-in:</strong> {{ $metadata['check_in'] }}</p>
        <p><strong>Check-out:</strong> {{ $metadata['check_out'] }}</p>
        <p><strong>Pet Owner:</strong> {{ $metadata['owner_first_name'] }} {{ $metadata['owner_last_name'] }}</p>
        <p class="price">Total Price: LKR {{ session('price') }}</p>

        <button id="downloadPdf" class="btn-download">Download Invoice</button>

        <div class="message">
            <p>We look forward to welcoming <strong>{{ $metadata['pet_name'] }}</strong>! We hope you have a great day!</p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
    <script>
        document.getElementById('downloadPdf').addEventListener('click', function () {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            const pageWidth = doc.internal.pageSize.getWidth();
            const margin = 15;
            let yPosition = 20;

            // Get current date and time
            const currentDateTime = new Date().toLocaleString();

            // Header Section
            doc.setFillColor(255, 102, 0); // Orange color
            doc.rect(0, 0, pageWidth, 30, 'F');

            // Title
            doc.setFontSize(18);
            doc.setTextColor(255, 255, 255); // White color
            doc.setFont("helvetica", "bold");
            doc.text("PETFINITY PAYMENT RECEIPT", pageWidth / 2, 15, null, null, 'center');

            yPosition += 40;

            // Pet Boarding Center Information
            doc.setFontSize(11);
            doc.setTextColor(0, 0, 0); // Black color
            doc.setFont("helvetica", "bold");
            doc.text("Pet Boarding Center:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("{{ $metadata['boarding_center'] }}", pageWidth / 2, yPosition);
            yPosition += 10;

            // Pet Information
            doc.setFontSize(11);
            doc.setFont("helvetica", "bold");
            doc.text("Pet Name:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("{{ $metadata['pet_name'] }}", pageWidth / 2, yPosition);
            yPosition += 10;

            // Check-in Date
            doc.setFontSize(11);
            doc.setFont("helvetica", "bold");
            doc.text("Check-in Date:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("{{ $metadata['check_in'] }}", pageWidth / 2, yPosition);
            yPosition += 10;

            // Check-out Date
            doc.setFontSize(11);
            doc.setFont("helvetica", "bold");
            doc.text("Check-out Date:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("{{ $metadata['check_out'] }}", pageWidth / 2, yPosition);
            yPosition += 10;

            // Pet Owner
            doc.setFontSize(11);
            doc.setFont("helvetica", "bold");
            doc.text("Pet Owner:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("{{ $metadata['owner_first_name'] }} {{ $metadata['owner_last_name'] }}", pageWidth / 2, yPosition);
            yPosition += 10;

            // Total Price
            doc.setFontSize(11);
            doc.setFont("helvetica", "bold");
            doc.text("Total Price:", margin, yPosition);
            doc.setFont("helvetica", "normal");
            doc.text("LKR {{ session('price') }}", pageWidth / 2, yPosition);
            yPosition += 20;

            // Footer Message
            doc.setFontSize(10);
            doc.setFont("helvetica", "italic");
            doc.text("We look forward to welcoming your pet!", margin, yPosition);
            yPosition += 10;
            doc.text("Please bring your pet to the boarding center by the check-in time.", margin, yPosition);
            yPosition += 10;
            doc.text("We hope you have a great day!", margin, yPosition);

            // Save PDF
            doc.save('PetBoarding_Invoice.pdf');
        });
    </script>
</body>
</html>