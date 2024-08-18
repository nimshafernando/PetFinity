<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/dashboard.css'])

    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Nunito', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, #ff6600, #ff9933);
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin: auto;
            margin-right: 120px; /* Move the container to the right */
        }

        .leftSection {
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .petSection h2 {
            font-size: 1.75rem;
            margin-bottom: 20px;
            font-family: 'Fredoka One', cursive;
            color: #333;
            position: relative;
        }

        .petSection h2:before {
          
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: -40px;
            color: #ff6600;
            font-size: 1.5rem;
        }

        .petSection ul {
            list-style: none;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
            padding: 0;
        }

        .petSection ul li {
            position: relative;
            cursor: pointer;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
        }

        .petSection ul li:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
        }

        .petSection ul li img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #ff6600;
            transition: all 0.4s ease;
        }

        .petSection ul li img:hover {
            transform: rotate(5deg);
            filter: brightness(1.1);
        }

        .addContainer {
            text-align: center;
            padding: 20px;
            border: 2px dashed #ff6600;
            border-radius: 8px;
            margin-top: 30px;
            position: relative;
            overflow: hidden;
        }

        .addContainer h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #333;
            font-family: 'Fredoka One', cursive;
            position: relative;
        }

        .addContainer h1:before {
          
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            left: -30px;
            color: #ff6600;
            font-size: 1.5rem;
        }

        .addContainer p {
            font-size: 1rem;
            color: #777;
            margin-bottom: 15px;
        }

        .addContainer p:after {
            content: "\f6d3"; /* FontAwesome paw icon */
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            position: absolute;
            right: -30px;
            color: #ff6600;
            font-size: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .btn i {
            margin-right: 8px; /* Space between icon and text */
        }

        .btn:hover {
            background-color: #e65c00;
            transform: translateY(-3px);
        }

        @media (max-width: 1024px) {
            .container {
                padding: 80px;
                margin-left: 10px;
            }

            .petSection h2 {
                font-size: 1.6rem;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
                max-width: 90%;
                margin-right: 20px; /* Adjust margin for smaller screens */
            }

            .petSection h2 {
                font-size: 1.5rem;
            }

            .petSection ul li img {
                width: 70px;
                height: 70px;
            }

            .addContainer img {
                width: 50px;
            }

            .btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }

            .btn i {
                margin-right: 6px; /* Adjust space for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 20px;
                margin-right: 10px; /* Align centered on very small screens */
            }

            .petSection ul {
                gap: 10px;
            }

            .petSection ul li img {
                width: 60px;
                height: 60px;
            }

            .addContainer img {
                width: 40px;
            }

            .btn {
                padding: 8px 15px;
                font-size: 0.8rem;
            }

            .btn i {
                margin-right: 4px; /* Adjust space for very small screens */
            }
        }
    </style>
</head>
<body>
    <x-sidebar-nav />

    <div class="container">
        <div class="leftSection">
            <div class="petSection">
                <h2>Your Pets</h2>
                <ul>
                    @foreach($pets as $pet)
                        <li data-pet-id="{{ $pet->id }}">
                            <a href="{{ route('pets.edit', $pet->id) }}">
                                <img src="{{ Storage::url($pet->profile_picture) }}" alt="{{ $pet->pet_name }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="addContainer">
                <h1>Add your pets</h1>
                <p>Manage your pet's profiles easily and keep their information up-to-date.</p>
                <a href="{{ route('pettype') }}" class="btn">
                    <i class="fas fa-plus"></i>Add Pet
                </a><br><br>
                <span>NOTE: You can add multiple pets.</span>
            </div>
        </div>
    </div>
</body>
</html>
