<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetBoarder Analytics Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <style>
        body {
            font-family: 'Fredoka', cursive;
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
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar a {
            display: block;
            padding: 15px;
            font-size: 1.2rem;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #02874a;
        }

        .sidebar .logo {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Fredoka', cursive;
            font-weight: bold;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        h1 {
            text-align: center;
            margin-bottom: 10px;
            color: #035a2e;
            font-weight: bold;
            font-size: 2.5rem;
        }

        h2.boarding-center-name {
            text-align: center;
            margin-bottom: 30px;
            color: #035a2e;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease-in-out;
            background-color: white;
        }

        .card:hover {
            transform: translateY(-5px);
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
        }

        .stat-label {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
        }

        .chart-container {
            position: relative;
            margin: 20px 0;
            height: 250px;
        }

        .pet-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 10px;
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .pet-card:hover {
            transform: translateY(-5px);
        }

        .pet-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .pet-name {
            font-weight: bold;
            color: #333;
        }

        .button-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }

        .btn-custom {
            background-color: #035a2e;
            color: rgb(250, 120, 45);
            border-radius: 5px;
            padding: 10px 20px;
            text-align: center;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #02874a;
            color: white;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .content {
                margin-left: 0;
                width: 100%;
            }

            h1 {
                font-size: 2rem;
            }
        }

        .drawer-toggle {
            display: none;
            background-color: #035a2e;
            color: white;
            padding: 10px;
            border: none;
            font-size: 1.5rem;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
        }

        @media (max-width: 768px) {
            .drawer-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar / Drawer -->
    <button id="drawerToggle" class="drawer-toggle">☰</button>
    <div class="sidebar" id="sidebar">
        <div class="logo">Petfinity</div>
        <a href="{{ route('pet-boardingcenter.dashboard') }}">Return to Dashboard</a>
        <a href="#overview">Overview</a>
        <a href="#revenue">Total Revenue</a>
        <a href="#bookings">Monthly Bookings</a>
        <a href="#stay-length">Average Length of Stay</a>
        <a href="#occupancy">Occupancy Rate</a>
        <a href="#new-vs-returning">New vs. Returning Customers</a>
        <a href="#pets">Pets Handled</a>
        <a href="#" id="downloadPdf" class="btn-custom">Download Report</a>
    </div>

    <!-- Content -->
    <div class="content" id="content">
        <h1>PetBoarder Analytics Dashboard</h1>
        <h2 class="boarding-center-name">{{ Auth::user()->business_name }}</h2>

        <!-- Overview Section -->
        <div id="overview" class="card">
            <div class="card-header">Overview</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stat">{{ $totalBookings }}</div>
                        <div class="stat-label">Total Bookings</div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat">{{ $completedTasks }}</div>
                        <div class="stat-label">Tasks Completed</div>
                    </div>
                    <div class="col-md-4">
                        <div class="stat">{{ number_format($averageRating, 2) }}</div>
                        <div class="stat-label">Average Rating</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Revenue Section -->
        <div id="revenue" class="card">
            <div class="card-header">Total Revenue</div>
            <div class="card-body">
                <div class="stat">LKR {{ number_format($totalRevenue, 2) }}</div>
                <div class="stat-label">Total Revenue Earned</div>
                <div class="chart-container">
                    <canvas id="monthlyRevenueChart"></canvas>
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

        <!-- New vs. Returning Customers -->
        <div id="new-vs-returning" class="card">
            <div class="card-header">New vs. Returning Customers</div>
            <div class="card-body">
                <div class="chart-container">
                    <canvas id="customersChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Average Length of Stay -->
        <div id="stay-length" class="card">
            <div class="card-header">Average Length of Stay</div>
            <div class="card-body">
                <div class="stat">{{ number_format($averageLengthOfStay, 2) }} days</div>
                <div class="stat-label">Average Stay Duration</div>
            </div>
        </div>

        <!-- Occupancy Rate -->
        <div id="occupancy" class="card">
            <div class="card-header">Occupancy Rate</div>
            <div class="card-body">
                <div class="stat">{{ number_format($occupancyRate, 2) }}%</div>
                <div class="stat-label">Occupancy Rate</div>
            </div>
        </div>

        <!-- Pets Handled Section -->
        <div id="pets" class="card">
            <div class="card-header">Total Pets Handled</div>
            <div class="card-body">
                <div class="row">
                    @foreach ($petsHandled as $pet)
                    <div class="col-md-4 pet-card">
                        <img src="{{ asset('storage/' . $pet->profile_picture) }}" alt="{{ $pet->pet_name }}" class="pet-image">
                        <div class="pet-name">{{ $pet->pet_name }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js Script -->
    <script>
        const { jsPDF } = window.jspdf;

        // Monthly Bookings Chart
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
                    backgroundColor: '#035a2e',
                    borderColor: '#035a2e',
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

        // Monthly Revenue Chart
        const monthlyRevenueCtx = document.getElementById('monthlyRevenueChart').getContext('2d');
        const monthlyRevenueChart = new Chart(monthlyRevenueCtx, {
            type: 'line',
            data: {
                labels: {!! json_encode($monthlyRevenue->pluck('month')->map(function($month) {
                    return date("F", mktime(0, 0, 0, $month, 10));
                })->toArray()) !!},
                datasets: [{
                    label: 'Revenue',
                    data: {!! json_encode($monthlyRevenue->pluck('total')->toArray()) !!},
                    backgroundColor: '#035a2e',
                    borderColor: '#035a2e',
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

        // Customers Chart
        const customersCtx = document.getElementById('customersChart').getContext('2d');
        const customersChart = new Chart(customersCtx, {
            type: 'pie',
            data: {
                labels: ['New Customers', 'Returning Customers'],
                datasets: [{
                    label: 'Customers',
                    data: [{{ $newCustomers }}, {{ $returningCustomers }}],
                    backgroundColor: ['#035a2e', '#28a745'],
                }]
            },
            options: {
                responsive: true
            }
        });

        // Sidebar toggle for mobile
        const sidebar = document.getElementById('sidebar');
        const toggleButton = document.getElementById('drawerToggle');
        const content = document.getElementById('content');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('active');
        });

        content.addEventListener('click', () => {
            if (sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });

        // Swipe gesture for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        document.body.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        });

        document.body.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        });

        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                sidebar.classList.remove('active');
            } else if (touchEndX > touchStartX + 50) {
                sidebar.classList.add('active');
            }
        }

    // Generate PDF
document.getElementById('downloadPdf').addEventListener('click', function () {
    const doc = new jsPDF();
    const pageWidth = doc.internal.pageSize.getWidth();
    const pageHeight = doc.internal.pageSize.getHeight();
    const margin = 10;
    let yPosition = 20;

    // Get current date and time
    const currentDateTime = new Date().toLocaleString();

    // Header Background
    doc.setFillColor(3, 90, 46); // Green color
    doc.rect(0, 0, pageWidth, 30, 'F');

    // Title
    doc.setFontSize(18);
    doc.setTextColor(255, 255, 255); // White color
    doc.setFont("helvetica", "bold");
    doc.text("PETFINITY ANALYTICS REPORT", pageWidth / 2, 15, null, null, 'center');

    // Project Information Section
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0); // Black color
    doc.text("Pet Boarding Center:", margin, yPosition + 20);
    doc.text("Generated on:", pageWidth - margin - 50, yPosition + 20);

    doc.setFontSize(11);
    doc.setFont("helvetica", "bold");
    doc.text("{{ Auth::user()->business_name }}", margin, yPosition + 25);
    doc.text(currentDateTime, pageWidth - margin - 50, yPosition + 25);

    // Address and Phone Number
    doc.setFontSize(10);
    doc.setFont("helvetica", "normal");
    doc.text("Address: {{ Auth::user()->street_name }}, {{ Auth::user()->city }}, {{ Auth::user()->postal_code }}", margin, yPosition + 30);
    doc.text("Phone: {{ Auth::user()->phone_number }}", margin, yPosition + 35);

    yPosition += 45;

    // Highlights Section
    doc.setFillColor(3, 90, 46); // Green color
    doc.rect(0, yPosition, pageWidth, 10, 'F');
    doc.setFontSize(12);
    doc.setTextColor(255, 255, 255); // White color
    doc.text("HIGHLIGHTS", margin, yPosition + 7);

    yPosition += 15;
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0); // Black color
    doc.text(Total Bookings: {{ $totalBookings }}, margin, yPosition);
    yPosition += 10;
    doc.text(Total Revenue: LKR {{ number_format($totalRevenue, 2) }}, margin, yPosition);
    yPosition += 10;
    doc.text(Average Rating: {{ number_format($averageRating, 2) }}, margin, yPosition);

    yPosition += 20;

    // Detailed Analytics Section
    doc.setFillColor(3, 90, 46); // Green color
    doc.rect(0, yPosition, pageWidth, 10, 'F');
    doc.setFontSize(12);
    doc.setTextColor(255, 255, 255); // White color
    doc.text("DETAILED ANALYTICS", margin, yPosition + 7);

    yPosition += 15;
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0); // Black color

    // Total Bookings Details
    doc.text("Total Bookings: {{ $totalBookings }}", margin, yPosition);
    yPosition += 10;
    
    // Total Revenue Details
    doc.text("Total Revenue: LKR {{ number_format($totalRevenue, 2) }}", margin, yPosition);
    yPosition += 10;
    
    // Average Rating Details
    doc.text("Average Rating: {{ number_format($averageRating, 2) }}", margin, yPosition);
    yPosition += 10;

    // Average Length of Stay
    doc.text("Average Length of Stay: {{ number_format($averageLengthOfStay, 2) }} days", margin, yPosition);
    yPosition += 10;

    // Occupancy Rate Details
    doc.text("Occupancy Rate: {{ number_format($occupancyRate, 2) }}%", margin, yPosition);
    yPosition += 10;

    // New vs. Returning Customers Details
    doc.text("New Customers: {{ $newCustomers }}", margin, yPosition);
    yPosition += 10;
    doc.text("Returning Customers: {{ $returningCustomers }}", margin, yPosition);

    yPosition += 20;

    // Pets Handled Section
    doc.setFillColor(3, 90, 46); // Green color
    doc.rect(0, yPosition, pageWidth, 10, 'F');
    doc.setFontSize(12);
    doc.setTextColor(255, 255, 255); // White color
    doc.text("PETS HANDLED", margin, yPosition + 7);

    yPosition += 15;
    doc.setFontSize(10);
    doc.setTextColor(0, 0, 0); // Black color
    @foreach ($petsHandled as $pet)
        doc.text("• {{ $pet->pet_name }}", margin + 10, yPosition);
        yPosition += 10;
    @endforeach

    // Save PDF
    doc.save('PetBoarder_Analytics_Report.pdf');
});


    </script>
</body>

</html>