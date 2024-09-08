<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lost and Found Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #FFEBCC;
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

        .back-button {
    display: inline-block;
    margin-bottom: 20px;
    padding: 10px 20px;
    background-color: #ff6600;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
    position: relative; /* Needed for centering in small screens */
}

.back-button:hover {
    background-color: #e65c00;
}

@media (max-width: 768px) {
    .back-button {
        display: block;
        text-align: center;
        margin: 0 auto 20px auto; /* Centers the button horizontally */
    }
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
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
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
            color: #ffffff;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
            min-width: 250px;
            margin-bottom: 20px;
            position: relative;
            overflow: hidden;
        }

        .summary-card img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }

        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .summary-card h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: bold;
            color: #ffffff;
        }

        .summary-card p {
            margin: 5px 0 0;
            font-size: 35px;
            font-weight: bold;
            font-family: 'Fredoka', sans-serif;
            color: white;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            width: 100%;
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

        .card-body {
            padding: 20px;
            background-color: #ffefef;
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
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            .summary-cards {
                flex-direction: column;
            }
        }

        @media (max-width: 576px) {
            table th,
            table td {
                padding: 8px;
                font-size: 0.8rem;
            }
        }

        /* Custom Graph Styling */
        .graph-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .graph-card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            max-width: 100%;
        }

        .graph-card canvas {
            max-height: 300px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="container">
        <a href="{{ route('pet-owner.dashboard') }}" class="back-button">Back to Dashboard</a>

        <h1>Lost and Found Analytics Dashboard</h1>

        <!-- Summary Cards Section -->
        <div class="summary-cards">
            <div class="summary-card">
                <img src="{{ asset('images/boarder/missing.png') }}" alt="Total Missing Pets">
                <h2 id="missingPetsCount">0</h2>
                <p>Total Missing Pets</p>
            </div>
            <div class="summary-card">
                <img src="{{ asset('images/boarder/pet-shop.png') }}" alt="Total Found Reports">
                <h2 id="foundReportsCount">0</h2>
                <p>Total Found Reports</p>
            </div>
        </div>

        <!-- Graphs Section -->
        <div class="graph-container">
            <div class="graph-card">
                <h5>Pets Reported Missing Over Time</h5>
                <canvas id="missingPetsGraph"></canvas>
            </div>
            <div class="graph-card">
                <h5>Sightings Over Time</h5>
                <canvas id="sightingsGraph"></canvas>
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
                            <td>{{ $pet->pet->pet_name ?? 'N/A' }}</td>
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
                            <th>Pet Name</th>
                            <th>Date Reported</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($foundReports as $report)
                        <tr>
                            <td>{{ $report->location }}</td>
                            <td>{{ $report->description }}</td>
                            <td>{{ $report->missingPet->pet->pet_name ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($report->created_at)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap & Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Animate Counter for Cards
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
            // Animated counters for the summary cards
            animateCounter('#missingPetsCount', {{ $missingPets->count() }});
            animateCounter('#foundReportsCount', {{ $foundReports->count() }});

            // Graph Data - Process and convert dates into months for Missing Pets and Sightings
            const missingPetsData = @json($missingPets->pluck('last_seen_date')->map(function ($date) {
                return \Carbon\Carbon::parse($date)->month;
            }));
            
            const sightingsData = @json($foundReports->pluck('created_at')->map(function ($date) {
                return \Carbon\Carbon::parse($date)->month;
            }));

            // Prepare month labels for the graphs
            const monthLabels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

            // Count the occurrences of each month for Missing Pets data
            const missingPetsCountByMonth = Array(12).fill(0);
            missingPetsData.forEach(month => missingPetsCountByMonth[month - 1]++);

            // Count the occurrences of each month for Sightings data
            const sightingsCountByMonth = Array(12).fill(0);
            sightingsData.forEach(month => sightingsCountByMonth[month - 1]++);

            // Graphs

            // Line graph for Missing Pets
            const missingPetsGraph = new Chart(document.getElementById('missingPetsGraph'), {
                type: 'line',
                data: {
                    labels: monthLabels,
                    datasets: [{
                        label: 'Missing Pets',
                        data: missingPetsCountByMonth,
                        borderColor: '#ff6600',
                        backgroundColor: 'rgba(255, 102, 0, 0.2)',
                        fill: true,
                        tension: 0.1
                    }]
                }
            });

            // Bar graph for Sightings
            const sightingsGraph = new Chart(document.getElementById('sightingsGraph'), {
                type: 'bar',
                data: {
                    labels: monthLabels,
                    datasets: [{
                        label: 'Sightings',
                        data: sightingsCountByMonth,
                        backgroundColor: '#ff6600',
                    }]
                }
            });
        });
    </script>
</body>

</html>
