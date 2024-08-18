<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Appointments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f0f8ff;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 2px solid #007bff;
        }

        h2 {
            font-family: 'Fredoka One', cursive;
            color: #007bff;
            text-align: center;
            font-size: 28px;
            margin-bottom: 30px;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        li {
            background-color: #e6f7ff;
            border: 1px solid #ddd;
            border-radius: 12px;
            margin-bottom: 15px;
            padding: 20px;
            transition: box-shadow 0.3s ease, background-color 0.3s ease;
        }

        li:hover {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
            background-color: #d4e9ff;
        }

        h4 {
            font-size: 22px;
            color: #007bff;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }

        h4 i {
            color: #28a745;
            margin-right: 10px;
        }

        p {
            font-size: 16px;
            color: #555;
            margin-bottom: 8px;
        }

        a {
            display: inline-block;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 16px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        a:hover {
            background-color: #ff018d;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 24px;
            }

            h4 {
                font-size: 20px;
            }

            p {
                font-size: 14px;
            }

            a {
                font-size: 14px;
                padding: 8px 16px;
            }

            li {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            h2 {
                font-size: 20px;
            }

            h4 {
                font-size: 18px;
            }

            p {
                font-size: 12px;
            }

            a {
                font-size: 12px;
                padding: 6px 12px;
            }

            li {
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Ongoing Appointments</h2>
        <ul>
            @foreach($ongoingAppointments as $appointment)
            <li>
                <h4><i class="fas fa-paw"></i>{{ $appointment->pet->pet_name }}</h4>
                <p><strong>Check-in Time:</strong> {{ $appointment->check_in_time }}</p>
                <p><strong>Check-out Time:</strong> {{ $appointment->check_out_time }}</p>
                <p><strong>Special Notes:</strong> {{ $appointment->special_notes }}</p>
                <a href="{{ route('pet.boardingcenter.managetasks', $appointment->id) }}">Manage Tasks</a>
            </li>
            @endforeach
        </ul>
    </div>
</body>

</html>
