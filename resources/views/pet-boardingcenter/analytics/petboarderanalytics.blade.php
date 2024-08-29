<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoarder Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: 'Fredoka', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
        }

        .sidebar {
            width: 250px;
            background-color: #035a2e;
            color: white;
            position: fixed;
            height: 100%;
            padding-top: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .sidebar:hover {
            width: 300px;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #02874a;
            padding-left: 30px;
        }

        .sidebar a i {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        .sidebar .logo {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Fredoka One', cursive;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        .sidebar:hover + .content {
            margin-left: 300px;
            width: calc(100% - 300px);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #035a2e;
            font-weight: bold;
            font-size: 2.5rem;
            animation: fadeInDown 0.5s ease-in-out;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            background-color: white;
            animation: fadeInUp 0.5s ease-in-out;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #035a2e;
            color: white;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }

        .card-body {
            padding: 20px;
            background-color: #fff;
        }

        .stat {
            font-size: 2rem;
            font-weight: bold;
            margin: 10px 0;
            color: #035a2e;
            text-align: center;
            animation: countUp 2s ease-in-out forwards;
        }

        .stat-label {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
        }

        .chart-container {
            position: relative;
            margin: 20px 0;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes countUp {
            from {
                content: "0";
            }
            to {
                content: attr(data-count);
            }
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: fixed;
                bottom: 0;
                left: 0;
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 10px 0;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.1);
                z-index: 1000;
            }

            .sidebar a {
                padding: 10px;
                font-size: 1rem;
                text-align: center;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .sidebar i {
                font-size: 1.5rem;
            }

            .sidebar .logo {
                display: none;
            }

            .content {
                margin-left: 0;
                margin-bottom: 60px; /* Adjust this value depending on the height of the bottom nav */
                width: 100%;
            }

            h1 {
                font-size: 2rem;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar / Bottom Navigation -->
    <div class="sidebar">
        <div class="logo">Petfinity</div>
        <a href="#overview"><i class="fas fa-chart-line"></i> <span>Overview</span></a>
        <a href="#bookings"><i class="fas fa-calendar-alt"></i> <span>Bookings</span></a>
        <a href="#tasks"><i class="fas fa-tasks"></i> <span>Tasks</span></a>
        <a href="#reviews"><i class="fas fa-star"></i> <span>Reviews</span></a>
        <a href="#pets"><i class="fas fa-paw"></i> <span>Pets Handled</span></a>
    </div>

    <!-- Content -->
    <div class="content">
        <h1>PetBoarder Analytics Dashboard</h1>

        <!-- Overview Section -->
        <div id="overview" class="card">
            <div class="card-header">Overview</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat" data-count="{{ $totalBookings ?? 0 }}">{{ $totalBookings ?? 'No data' }}</div>
                        <div class="stat-label">Total Bookings</div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat" data-count="{{ $completedTasks ?? 0 }}">{{ $completedTasks ?? 'No data' }}</div>
                        <div class="stat-label">Tasks Completed</div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat" data-count="{{ number_format($averageRating, 2) ?? 0 }}">{{ number_format($averageRating, 2) ?? 'No data' }}</div>
                        <div class="stat-label">Average Rating</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Monthly Booking Trends -->
        <div id="bookings" class="card">
            <div class="card-header">Monthly Booking Trends</div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="monthlyBookingsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div id="reviews" class="card">
            <div class="card-header">Total Reviews</div>
            <div class="card-body">
                <div class="stat" data-count="{{ $reviewsCount ?? 0 }}">{{ $reviewsCount ?? 'No data' }}</div>
                <div class="stat-label">Reviews Received</div>
            </div>
        </div>

        <!-- Pets Handled Section -->
        <div id="pets" class="card">
            <div class="card-header">Total Pets Handled</div>
            <div class="card-body">
                <div class="stat" data-count="{{ $totalPetsHandled ?? 0 }}">{{ $totalPetsHandled ?? 'No data' }}</div>
                <div class="stat-label">Pets Handled</div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const monthlyBookingsCtx = document.getElementById('monthlyBookingsChart').getContext('2d');
        const monthlyBookingsChart = new Chart(monthlyBookingsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($monthlyBookings->pluck('month')->map(function($month) {
                    return date("F", mktime(0, 0, 0, $month, 10));
                })->toArray()) !!},
                datasets: [{
                    label: 'Bookings',
                    data: {!! json_encode($monthlyBookings->pluck('total')->toArray()) !!},
                    backgroundColor: '#ff6600',
                    borderColor: '#ff6600',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>