    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

            body {
                background-image: url('https://your-image-url.com/pet-background.jpg');
                background-size: cover;
                background-repeat: no-repeat;
                background-attachment: fixed;
                font-family: 'Nunito', sans-serif;
                margin: 0;
                padding: 0;
                color: #333;
                display: flex;
                flex-direction: column;
                min-height: 100vh;
            }

            .top-navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: rgba(255, 255, 255, 0.9);
                padding: 10px 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                position: fixed;
                top: 0;
                width: 100%;
                z-index: 10;
                backdrop-filter: blur(10px);
            }

            .top-navbar .logo {
                font-family: 'Fredoka One', cursive;
                font-size: 32px;
                color: #035a2e;
            }

            .top-navbar .profile {
                display: flex;
                align-items: center;
                color: #333;
                cursor: pointer;
                font-size: 18px;
                margin-left: auto;
                font-weight: bold;
            }

            .top-navbar .profile i {
                margin-left: 10px;
                font-size: 24px;
            }

            .sidebar {
                background-color: rgba(255, 255, 255, 0.95);
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
                overflow-y: auto;
                backdrop-filter: blur(10px);
            }

            .sidebar ul {
                list-style: none;
                padding: 0;
                margin: 0;
            }

            .sidebar ul li {
                padding: 15px 20px;
                cursor: pointer;
                transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
                border-radius: 8px;
                margin: 0 10px;
                font-weight: bold;
            }

            .sidebar ul li:hover {
                background-color: #0d8c0b;
                color: #fff;
            }

            .sidebar ul li a {
                text-decoration: none;
                color: inherit;
                display: flex;
                align-items: center;
            }

            .sidebar ul li a i {
                margin-right: 10px;
                font-size: 20px;
            }

            .main-content {
                margin-left: 250px;
                margin-top: 60px;
                padding: 20px;
                flex-grow: 1;
                overflow-y: auto;
                width: calc(100% - 250px);
                backdrop-filter: blur(10px);
            }

            .welcome-message {
                background: linear-gradient(to right, #4CAF50, #2196F3);
                color: white;
                padding: 40px;
                border-radius: 8px;
                margin-top: 20px;
                font-size: 60px;
                font-family: 'Fredoka One', cursive;
                text-align: center;
                animation: fadeIn 1s ease-in-out;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                line-height: 1.2;
                overflow-wrap: break-word;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .section-header {
                font-size: 28px;
                font-family: 'Fredoka One', cursive;
                color: #4CAF50;
                margin-top: 40px;
                text-align: center;
                text-transform: uppercase;
                letter-spacing: 2px;
            }

            .card {
                background-color: #e0f7fa;
                border: none;
                border-radius: 20px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
                padding: 20px;
                text-align: center;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .card p {
                text-align: center;
                margin-bottom: 10px;
            }

            .card:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }

            .card-header {
                font-size: 1.7rem;
                color: #035a2e;
                font-family: 'Fredoka One', cursive;
                margin-bottom: 15px;
                text-align: center;
            }

            .card img {
                max-width: 180px;
                height: auto;
                border-radius: 10px;
                margin: 0 auto 20px auto;
                display: block;
                transition: transform 0.3s ease-in-out;
            }

            .card img:hover {
                transform: scale(1.05);
            }

            .btn-primary {
                background-color: #035a2e;
                border: none;
                padding: 12px 25px;
                border-radius: 20px;
                font-size: 1.2rem;
                font-weight: bold;
                color: #fff;
                cursor: pointer;
                transition: background-color 0.3s ease, transform 0.3s ease;
                margin-top: 15px;
            }

            .btn-primary:hover {
                background-color: #02874a;
                transform: scale(1.05);
            }

            .two-rows-of-two-cards .card {
                margin-bottom: 20px;
            }

            .additional-sections .section {
                background-color: #e0f7fa;
                border-radius: 15px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                padding: 20px;
                margin-bottom: 30px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            }

            .additional-sections .section:hover {
                transform: translateY(-10px);
                box-shadow: 0 15px 25px rgba(0, 0, 0, 0.2);
            }

            .additional-sections .section img {
                max-width: 150px;
                border-radius: 10px;
                margin-right: 20px;
            }

            .additional-sections .section .text-content {
                flex-grow: 1;
                padding: 10px;
            }

            .additional-sections .section .text-content h3 {
                font-size: 1.5rem;
                color: #035a2e;
                font-family: 'Fredoka One', cursive;
                margin-bottom: 10px;
            }

            .additional-sections .section .text-content p {
                color: #666;
                margin-bottom: 15px;
            }

            .additional-sections .section .btn-primary {
                margin-left: auto;
                background-color: #f57c00;
                transition: background-color 0.3s ease, transform 0.3s ease;
            }

            .additional-sections .section .btn-primary:hover {
                background-color: #ef6c00;
                transform: scale(1.05);
            }

            .bottom-navbar {
                display: none;
                background-color: #fff;
                box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
                position: fixed;
                bottom: 0;
                width: 100%;
                z-index: 10;
            }

            .bottom-navbar ul {
                list-style: none;
                display: flex;
                justify-content: space-around;
                padding: 0;
                margin: 0;
            }

            .bottom-navbar ul li {
                padding: 10px;
            }

            .bottom-navbar ul li a {
                text-decoration: none;
                color: #333;
                display: flex;
                flex-direction: column;
                align-items: center;
                transition: color 0.3s ease-in-out;
            }

            .bottom-navbar ul li a:hover {
                color: #035a2e;
            }

            .bottom-navbar ul li a i {
                margin-bottom: 5px;
                font-size: 20px;
            }

            .profile {
                text-decoration: none;
            }

            table {
        width: 100%;
        max-width: 900px;
        margin: 30px auto;
        border-collapse: collapse;
        text-align: center;
        background-color: #ffffff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    table thead {
        background-color: #4CAF50;
        color: white;
        font-weight: bold;
    }

    table th, table td {
        padding: 15px 20px;
        border-bottom: 1px solid #ddd;
    }

    table th {
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 1px;
    }

    table td {
        font-size: 0.95rem;
        color: #555;
    }

    table tr:hover {
        background-color: #f2f2f2;
    }

    table tbody tr:last-child td {
        border-bottom: none;
    }

    table button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    table button:hover {
        background-color: #45a049;
    }
    

            @media (max-width: 1200px) {
                .main-content {
                    margin-left: 0;
                    margin-top: 60px;
                    padding: 20px;
                    width: 100%;
                }

                .sidebar {
                    display: none;
                }

                .bottom-navbar {
                    display: flex;
                    justify-content: center;
                }
            }

            @media (max-width: 768px) {
                .two-rows-of-two-cards .card {
                    flex-direction: column;
                    max-width: 100%;
                }

                .two-rows-of-two-cards .row {
                    flex-direction: column;
                }

                .additional-sections .section {
                    flex-direction: column;
                    text-align: center;
                }

                .additional-sections .section img {
                    margin-bottom: 20px;
                }

                .top-navbar .profile {
                    position: absolute;
                    right: 20px;
                    top: 10px;
                }

                .welcome-message {
                    font-size: 58px;
                }
            }

            @media (max-width: 480px) {
                .welcome-message {
                    font-size: 56px;
                    padding: 20px;
                }
            }
        </style>
    </head>

    <body>
        <div class="top-navbar">
            <div class="logo">PetFinity</div>
            <h8>Admin Dashboard</h8>
            {{-- <a href="{{ route('boarding-center.profile')}}" class="profile">
                <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
            </a> --}}
        </div>

        
        <div class="sidebar">
            <ul>
                <li><a href="{{ route('admin.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.approveratings') }}"><i class="fas fa-clock"></i>Approve Reviews</a></li>
                {{-- <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
                <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
                <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>
            </ul> --}}
        </ul>
        </div>

        <div class="main-content">
        
            @if($reviews->isEmpty())
    <p>No pending reviews.</p>
@else
    <table class="table text-center table-bordered table-hover">
        <thead>
            <tr>
                <th>Rating</th>
                <th>Review</th>
                <th>Pet Owner</th>
                <th>Boarding Center</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>
                        @for ($i = 1; $i <= $review->rating; $i++)
                             ⭐
                        @endfor
                        <br>
                        ({{ $review->rating }})
                    </td>
                                        <td>{{ $review->review }}</td>
                    <td>{{ $review->petowner->first_name }}</td>
                    <td>{{ $review->boardingcenter->business_name }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('reviews.approve', $review->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                            <form action="{{ route('reviews.decline', $review->id) }}" method="POST" class="ml-2">
                                @csrf
                                <button type="submit" class="btn btn-danger">Decline</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

        <div class="bottom-navbar">
            <ul>
                <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="{{ route('admin.approveratings') }}"><i class="fas fa-clock"></i>Approve Reviews</a></li>
                {{-- <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> Schedule</a></li>
                <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
                <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> History</a></li> --}}
            </ul>
        </div>
    </body>

    </html>
