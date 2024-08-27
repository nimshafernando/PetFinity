<!-- resources/views/petowner/analytics/lostandfound.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #ff6600;
            font-weight: bold;
            font-size: 2.5rem;
        }

        .summary-cards {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .summary-card {
            flex: 1;
            padding: 20px;
            background-color: #ff6600;
            color: white;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            min-width: 250px;
            margin-bottom: 20px;
        }

        .summary-card:hover {
            transform: translateY(-5px);
        }

        .summary-card i {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .summary-card h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
        }

        .summary-card p {
            margin: 5px 0 0;
            font-size: 1.2rem;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background-color: #ff6600;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .card-header i {
            font-size: 24px;
            margin-right: 10px;
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th,
        table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            text-align: left;
            font-size: 1rem;
        }

        table th {
            background-color: #ff6600;
            color: white;
            font-size: 16px;
            text-transform: uppercase;
        }

        table tbody tr:hover {
            background-color: #f9f9f9;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .card-header,
            .card-body {
                padding: 10px;
            }

            table th,
            table td {
                padding: 10px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Lost and Found Analytics Dashboard</h1>

        <!-- Summary Cards Section -->
        <div class="summary-cards">
            <div class="summary-card">
                <i class="fas fa-dog"></i>
                <h2 id="missingPetsCount">0</h2>
                <p>Total Missing Pets</p>
            </div>
            <div class="summary-card">
                <i class="fas fa-map-marker-alt"></i>
                <h2 id="foundReportsCount">0</h2>
                <p>Total Found Reports</p>
            </div>
        </div>

        <!-- Missing Pets Details Section -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-paw"></i> Missing Pets Details
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Pet Name</th>
                            <th>Last Seen Location</th>
                            <th>Last Seen Date</th>
                            <th>Sightings</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($missingPets as $pet)
                        <tr>
                            <td>{{ $pet->pet->name ?? 'N/A' }}</td>
                            <td>{{ $pet->last_seen_location }}</td>
                            <td>{{ \Carbon\Carbon::parse($pet->last_seen_date)->format('d/m/Y') }}</td>
                            <td>{{ $pet->sightings->count() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Found Reports Details Section -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-search-location"></i> Found Reports Details
            </div>
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Description</th>
                            <th>Reported For Pet ID</th>
                            <th>Date Reported</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foundReports as $report)
                        <tr>
                            <td>{{ $report->location }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->missing_pet_id }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animated counter for summary cards
        function animateCounter(id, target) {
            $({ counter: 0 }).animate({ counter: target }, {
                duration: 2000,
                easing: 'swing',
                step: function () {
                    $(id).text(Math.ceil(this.counter));
                }
            });
        }

        $(document).ready(function () {
            animateCounter('#missingPetsCount', {{ $missingPets->count() }});
            animateCounter('#foundReportsCount', {{ $foundReports->count() }});
        });
    </script>
</body>

</html>