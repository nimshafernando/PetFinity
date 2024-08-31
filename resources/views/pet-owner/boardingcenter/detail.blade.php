<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $boardingCenter->business_name }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff6600, #ff9933);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .main-container {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 60px;
            padding-bottom: 60px;
        }

        .content {
            width: calc(100% - 270px);
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            z-index: 1;
            margin-left: 270px;
            margin-top: 60px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .top-navbar .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            color: #ff6600;
            margin-left: 20px;
        }

        .top-navbar .profile {
            display: flex;
            align-items: center;
            color: #333;
            cursor: pointer;
            font-size: 18px;
            margin-right: 20px;
            font-weight: bold;
        }

        .top-navbar .profile i {
            margin-left: 10px;
            font-size: 24px;
        }

        .sidebar {
            background-color: #fff;
            width: 250px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            z-index: 10;
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
        }

        .sidebar h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            text-align: center;
            color: #ff6600;
            margin-bottom: 20px;
        }

        .sidebar nav {
            list-style: none;
            padding: 0;
            overflow-y: auto;
            height: calc(100vh - 100px);
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .sidebar nav a {
            display: block;
            padding: 15px 20px;
            color: inherit;
            text-decoration: none;
            display: flex;
            align-items: center;
            border-radius: 8px;
            margin: 0 10px;
            font-weight: bold;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
        }

        .sidebar nav a:hover {
            background-color: #ff6600;
            color: #fff;
        }

        .sidebar nav a .nav-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .navbar {
            display: none;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .navbar ul li {
            padding: 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        .title {
            text-align: center;
            color: #ff6600;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 36px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            position: relative;
            padding: 10px 20px;
            background: linear-gradient(135deg, #ff6600, #cc5200);
            border-radius: 50px;
            color: white;
            display: inline-block;
        }

        .info-card, .review-section {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
            width: 48%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            border: 1px solid #ff6600;
        }

        .info-card p, .review-card p {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        .info-card p strong {
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-card p i {
            font-size: 1.2rem;
            color: #ff6600;
        }

        .photo-gallery {
            width: 100%;
            margin-bottom: 20px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .photo-gallery img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 5%;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: #ff6600;
            border-radius: 50%;
        }

        .review-section {
            margin-top: 20px;
            width: 48%;
        }

        .review-section h2 {
            color: #ff6600;
            margin-bottom: 20px;
            text-align: center;
            font-size: 28px;
            font-weight: bold;
        }

        .review-card {
            background-color: #f8f9fa;
            border: 1px solid #ff6600;
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .review-card:hover {
            transform: translateY(-5px);
        }

        .review-rating {
            display: flex;
            align-items: center;
            font-size: 1.4rem;
            color: #ffbf00;
            margin-bottom: 10px;
        }

        .review-rating i {
            margin-right: 8px;
        }

        .review-text {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .review-meta {
            font-size: 0.9rem;
            color: #666;
        }

        .no-reviews {
            font-size: 1.2rem;
            color: #666;
            text-align: center;
            margin-top: 20px;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #ff6600;
            margin: 0 5px;
            padding: 8px 16px;
            border-radius: 5px;
            border: 1px solid #ff6600;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #ff6600;
            color: #fff;
        }

        .book-now-container {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .btn-primary, .btn-secondary {
            background-color: #ff6600;
            border: none;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
            display: inline-block;
            margin-bottom: 10px;
            width: 100%;
            max-width: 300px;
        }

        .btn-secondary {
            background-color: #ccc;
            color: black;
            margin-right: 20px;
        }

        .btn-secondary:hover {
            background-color: #999;
        }

        .btn-primary:hover {
            background-color: #cc5200;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
                margin-top: 60px;
                padding-bottom: 60px;
                flex-direction: column;
            }

            .info-card, .review-section {
                width: 100%;
            }

            .book-now-container {
                margin-top: 20px;
            }

            .navbar {
                display: flex;
                justify-content: center;
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 10;
            }

            .title {
                font-size: 24px;
                padding: 5px 10px;
                border-radius: 30px;
            }

            .photo-gallery img {
                height: 200px;
            }
        }

        @media (max-width: 480px) {
            .top-navbar {
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 10;
            }

            .sidebar {
                display: none;
            }

            .content {
                margin-top: 60px;
                margin-left: 0;
                padding: 10px;
                width: 100%;
                padding-bottom: 60px; /* Space for fixed bottom navbar */
            }

            .navbar {
                display: flex;
                justify-content: center;
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 10;
            }

            .info-card, .review-section {
                width: 100%;
            }

            .book-now-container {
                margin-top: 20px;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
            }

            .title {
                font-size: 22px;
                padding: 5px 10px;
            }

            .photo-gallery img {
                height: 150px;
            }
        }
    </style>
</head>

<body>
    <div class="top-navbar">
        <div class="logo">Petfinity</div>
        <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
    </div>

    <div class="main-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="p-4">
                <nav class="space-y-4">
                    <a href="#" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-home"></i></div>
                        Home
                    </a>

                    <a href="{{ route('mypets') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-paw"></i></div>
                        Pets
                    </a>

                    <a href="{{ route('boarding-centers.index') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-bed"></i></div>
                        Pet Boarding Centers
                    </a>

                    <a href="{{ route('appointments.upcoming') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-calendar-alt"></i></div>
                        Upcoming
                    </a>

                    <a href="{{ route('appointments.history') }}" class="nav-link">
                        <div class="nav-icon"><i class="fas fa-history"></i></div>
                        Past Bookings
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Content -->
        <div class="content">
            <h1 class="title">{{ $boardingCenter->business_name }}</h1>
            <div id="carouselExampleControls" class="carousel slide photo-gallery" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @if(is_array($boardingCenter->photos) && count($boardingCenter->photos) > 0)
                        @foreach($boardingCenter->photos as $index => $photo)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                <img src="{{ Storage::url($photo) }}" class="mx-auto d-block" alt="Facility Photo">
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active">
                            <img src="placeholder-image.jpg" class="mx-auto d-block" alt="No Image Available">
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <div class="info-card">
                <p><strong><i class="fas fa-envelope"></i> Email:</strong> {{ $boardingCenter->email }}</p>
                <p><strong><i class="fas fa-map-marker-alt"></i> Location:</strong> {{ $boardingCenter->city }}</p>
                <p><strong><i class="fas fa-clock"></i> Operating Hours:</strong> {{ $boardingCenter->operating_hours }}</p>
                <p><strong><i class="fas fa-dollar-sign"></i> Price Per Night:</strong> ${{ number_format($boardingCenter->price_per_night, 2) }}</p>
                <p><strong><i class="fas fa-link"></i> Social Media Links:</strong> {{ $boardingCenter->socialmedia_links }}</p>
                <p><strong><i class="fas fa-couch"></i> Special Amenities:</strong> {{ $boardingCenter->special_amenities }}</p>
                <p><strong><i class="fas fa-phone"></i> Phone Number:</strong> {{ $boardingCenter->phone_number }}</p>
                <p><strong><i class="fas fa-paw"></i> Types of Pets Boarded:</strong> {{ $boardingCenter->animal_types }}</p>
            </div>

            <!-- Reviews and Ratings Section -->
            <div class="review-section">
                <h2>Reviews & Ratings</h2>
                @if(count($reviews) > 0)
                    @foreach($reviews as $review)
                        <div class="review-card">
                            <div class="review-rating">
                                <i class="fas fa-star"></i> {{ $review->rating }} Stars
                            </div>
                            <div class="review-text">
                                {{ $review->review }}
                            </div>
                            <div class="review-meta">
                                Reviewed by: {{ $review->petowner->first_name }}
                                @if($review->created_at)
                                    on {{ $review->created_at->format('d M Y') }}
                                @else
                                    on an unknown date
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="pagination">
                        {{ $reviews->links() }}
                    </div>
                @else
                    <p class="no-reviews">No reviews have been left yet.</p>
                @endif
            </div>

            <!-- Book Now Button -->
            <div class="book-now-container">
                <a href="{{ route('boarding-centers.index') }}" class="btn btn-secondary">Back to List</a>
                <a href="{{ route('booking.create', $boardingCenter->id) }}" class="btn btn-primary">Book Now</a>
            </div>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}"><i class="fas fa-bed"></i> Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
