<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Payment Appointments</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Base styling */
        body {
            font-family: 'Fredoka', cursive;
            background-color: #f7f2e0;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 16px;
        }

        h1 {
            text-align: center;
            color: #035a2e;
            font-weight: bold;
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        /* Back Button */
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #035a2e;
            color: white;
            border-radius: 50px;
            text-decoration: none;
            font-weight: bold;
            position: fixed;
            top: 20px;
            left: 20px;
            transition: background-color 0.3s ease;
            z-index: 100;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: #028c4b;
        }

        /* Cash Appointments Table */
        .cash-appointments {
            margin-top: 20px;
        }

        .cash-appointments table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cash-appointments th, .cash-appointments td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .cash-appointments th {
            background-color: #035a2e;
            color: white;
            font-size: 1.1rem;
        }

        .cash-appointments td {
            font-size: 1rem;
            color: #333;
        }

        .btn-paid {
            background-color: #28a745;
            border: none;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            font-size: 1rem;
        }

        .btn-paid:hover {
            background-color: #218838;
        }

        /* Total Revenue Section */
        .total-revenue-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e0f7e9;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
        }

        .total-revenue {
            font-size: 1.5rem;
            font-weight: bold;
            color: #035a2e;
        }

        .btn-analytics {
            background-color: #035a2e;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .btn-analytics:hover {
            background-color: #028c4b;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .cash-appointments th, .cash-appointments td {
                font-size: 0.9rem;
            }

            .btn-paid {
                padding: 8px 12px;
                font-size: 0.9rem;
            }

            .total-revenue-container {
                flex-direction: column;
                text-align: center;
            }

            .total-revenue {
                font-size: 1.2rem;
            }

            .btn-analytics {
                margin-top: 10px;
            }

            /* Adjust table for mobile */
            .cash-appointments table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }

            .cash-appointments th, .cash-appointments td {
                white-space: nowrap;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.8rem;
            }

            .cash-appointments th, .cash-appointments td {
                font-size: 0.8rem;
            }

            .btn-paid {
                padding: 6px 10px;
                font-size: 0.8rem;
            }

            .total-revenue {
                font-size: 1rem;
            }

            .btn-analytics {
                padding: 8px 16px;
            }

            .back-button {
                position: static;
                display: block;
                text-align: center;
                margin-bottom: 20px;
            }

            /* Adjust table for mobile */
            .cash-appointments table {
                display: block;
                width: 100%;
                overflow-x: auto;
                white-space: nowrap;
            }

            .cash-appointments th, .cash-appointments td {
                white-space: nowrap;
            }
        }
    </style>
</head>

<body>
    <!-- Back to Dashboard Button -->
    <a href="{{ route('pet-boardingcenter.dashboard') }}" class="back-button">Back to Dashboard</a>

    <div class="container">
        <h1>On-visit Cash Payment Appointments</h1>

        <!-- Cash Appointments Section -->
        <div class="cash-appointments">
            @if($cashAppointments->isEmpty())
                <p>No cash payment appointments available.</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>Pet Owner</th>
                            <th>Pet Name</th>
                            <th>Total Price (LKR)</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Check-in Time</th>
                            <th>Check-out Time</th>
                            <th>Special Notes</th>
                            <th>Mark as Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cashAppointments as $appointment)
                            <tr>
                                <td>{{ $appointment->petowner->first_name }}</td> <!-- Pet owner's name -->
                                <td>{{ $appointment->pet->pet_name }}</td>
                                <td>{{ $appointment->total_price }}</td>
                                <td>{{ $appointment->start_date }}</td> <!-- Start Date -->
                                <td>{{ $appointment->end_date }}</td> <!-- End Date -->
                                <td>{{ $appointment->check_in_time }}</td> <!-- Check-in Time -->
                                <td>{{ $appointment->check_out_time }}</td> <!-- Check-out Time -->
                                <td>{{ $appointment->special_notes ?? 'None' }}</td> <!-- Special Notes -->
                                <td>
                                    <form action="{{ route('boarding-center.mark-as-paid', $appointment->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn-paid">Mark as Paid</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Total Revenue Section with Analytics Button -->
        <div class="total-revenue-container">
            <div class="total-revenue">
                Current Total Revenue : LKR {{ number_format($totalRevenue, 2) }}
            </div>
            <a href="{{ route('petboarder.analytics') }}" class="btn-analytics">Go to Analytics</a>
        </div>
        
    </div>
</body>

</html>