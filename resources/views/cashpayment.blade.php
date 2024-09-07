<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On Visit Payment - Petfinity</title>
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
            max-width: 800px;
            width: 90%;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #ff6600;
            font-size: 28px;
            margin: 0;
        }

        .back-button {
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            text-decoration: none;
        }

        .back-button:hover {
            background-color: #e05500;
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(255, 102, 0, 0.3);
        }

        .content p {
            font-size: 18px;
            color: #555;
            margin: 10px 0;
        }

        .details {
            background-color: #ffeedb;
            border-radius: 10px;
            padding: 20px;
            margin-top: 20px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .details p {
            font-size: 18px;
            color: #333;
            margin: 5px 0;
            text-align: left;
        }

        .important-note {
            background-color: #ffd3a6;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
            text-align: left;
            font-size: 16px;
            color: #555;
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
            padding: 10px 20px;
            font-size: 16px;
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

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header h1 {
                font-size: 24px;
            }

            .price {
                font-size: 22px;
            }

            .btn-download {
                font-size: 14px;
                padding: 8px 16px;
            }

            .content p {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .header h1 {
                font-size: 20px;
            }

            .price {
                font-size: 18px;
            }

            .btn-download {
                font-size: 12px;
                padding: 6px 12px;
            }

            .content p {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="header">
            <h1>Appointment Details</h1>
            <a href="{{ route('pet-owner.dashboard') }}" class="back-button">Back to Dashboard</a>
        </div>

        <div class="content">
            <div class="details">
                <p><strong>Pet Boarding Center:</strong> {{ $metadata['boarding_center'] }}</p>
<p><strong>Pet Name:</strong> {{ $metadata['pet_name'] }}</p>
<p><strong>Check-in:</strong> {{ $metadata['check_in'] }}</p>
<p><strong>Check-out:</strong> {{ $metadata['check_out'] }}</p>
<p><strong>Pet Owner:</strong> {{ $metadata['owner_first_name'] }} {{ $metadata['owner_last_name'] }}</p>
<p class="price">Total Price: LKR {{ $price }}</p>

            </div>

            <div class="important-note">
                <p><strong>Status: On Visit Payment</strong></p>
                <p>Please pay the amount mentioned above to the cashier when you arrive.</p>
                <p>Remember to safeguard the receipt as proof of payment.</p>
                <p>Ensure you bring <strong>{{ $metadata['pet_name'] }}</strong> to the location at least 10 minutes before the scheduled check-in time.</p>
            </div>

            <button id="downloadPdf" class="btn-download">Download Receipt</button>
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
            doc.setFillColor(40, 167, 69); // Green color
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
            doc.text("LKR {{ $price }}", pageWidth / 2, yPosition);
            yPosition += 20;

            // Footer Message
            doc.setFontSize(10);
            doc.setFont("helvetica", "italic");
            doc.text("Please pay the amount to the cashier on arrival.", margin, yPosition);
            yPosition += 10;
            doc.text("Safeguard the receipt as proof of payment.", margin, yPosition);
            yPosition += 10;
            doc.text("Bring your pet to the location 10 minutes before the check-in time.", margin, yPosition);

            // Save PDF
            doc.save('PetBoarding_Invoice.pdf');
        });
    </script>
</body>

</html>