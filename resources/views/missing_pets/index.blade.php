<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Pets</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F7E9DE; /* Light grey background */
            color: #333;
            padding: 20px;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 100vh;
        }
        .back-to-dashboard {
    background-color: #ff6600;
    color: white;
    padding: 10px 20px;
    border-radius: 50px;
    text-decoration: none;
    position: absolute; /* Changed from fixed to absolute */
    top: 20px;
    left: 20px;
    font-weight: bold;
    z-index: 100;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.back-to-dashboard:hover {
    background-color: #e65a00;
}

/* Media query for small screens */
@media (max-width: 768px) {
    .back-to-dashboard {
        position: absolute; /* Ensures the button stays at the top */
        top: 10px; /* Adjust for small screens */
        left: 10px; /* Adjust for small screens */
    }
}


        .main-container {
            max-width: 1200px;
            width: 100%;
            margin-top: 80px; /* Space for the back-to-dashboard button */
            padding: 20px;
            background-color: #fff; /* White card background */
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 2.5rem;
            color: #fff;
            text-align: center;
            margin-bottom: 20px;
            background-color: #ff6600; /* Orange */
            padding: 15px 20px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-transform: uppercase;
        }

        @media (min-width: 768px) {
            h1 {
                font-size: 3rem;
                padding: 20px 30px;
                margin-bottom: 30px;
            }
        }

        @media (min-width: 1024px) {
            h1 {
                font-size: 3.5rem;
                padding: 20px 40px;
                margin-bottom: 40px;
            }
        }

        .alert-success {
            background-color: #4CAF50; /* Green success */
            color: #FFF;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 1.1rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .alert-success i {
            margin-right: 10px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin: 20px 0;
        }

        .btn-view-map,
        .btn-view-sightings {
            background-color: #00ACC1; /* Unique cyan color */
            padding: 12px 20px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            color: #fff;
            font-size: 1.3rem;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
            text-transform: uppercase;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 250px;
        }

        @media (min-width: 768px) {
            .btn-view-map,
            .btn-view-sightings {
                font-size: 1.5rem;
                padding: 15px 30px;
                max-width: 300px;
            }
        }

        .btn-view-map i,
        .btn-view-sightings i {
            margin-right: 10px;
        }

        .btn-view-map:hover,
        .btn-view-sightings:hover {
            background-color: #00838F; /* Darker cyan */
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center; /* Center the cards horizontally */
            margin-bottom: 20px;
        }

        .col-md-4 {
            flex: 1 1 calc(33.333% - 20px);
            background-color: #FFF;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            max-width: 300px;
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 1 1 calc(50% - 20px);
            }
        }

        @media (max-width: 480px) {
            .col-md-4 {
                flex: 1 1 calc(100% - 20px);
            }
        }

        .col-md-4:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 5px solid #ff6600;
        }

        .card-body {
            padding: 20px;
            background-color: #FFBE98; /* Peach Fuzz */
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            color: #ff6600; /* Orange */
            margin-bottom: 15px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 768px) {
            .card-title {
                font-size: 1.8rem;
            }
        }

        .card-title i {
            margin-right: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #333;
            margin-bottom: 20px;
            line-height: 1.6;
        }

        .card-text i {
            color: #ff6600;
            margin-right: 6px;
        }

        .btn-primary {
            background-color: #ff6600; /* Carnation */
            color: white;
            text-align: center;
            padding: 12px 20px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            max-width: 250px;
            margin-left: auto;
            margin-right: auto; /* Center the button */
        }

        @media (min-width: 768px) {
            .btn-primary {
                font-size: 1.2rem;
            }
        }

        .btn-primary i {
            margin-right: 8px;
        }

        .btn-primary:hover {
            background-color: #F15F61; /* Terra Cotta */
        }

        .no-pets {
            text-align: center;
            font-size: 1.5rem;
            color: #666;
            margin-top: 40px;
        }

        @media (min-width: 768px) {
            .no-pets {
                font-size: 1.7rem;
            }
        }
    </style>
</head>

<body>

    <a href="{{ route('pet-owner.dashboard') }}" class="back-to-dashboard">Back to Dashboard</a>

    <div class="main-container">
        <h1><i class="fas fa-paw"></i> Missing Pets</h1>

        @if (session('success'))
            <div class="alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="btn-container">
            <a href="{{ route('missing_pets.map') }}" class="btn-view-map"><i class="fas fa-map-marker-alt"></i> View Map</a>
            <a href="{{ route('found_reports.index') }}" class="btn-view-sightings"><i class="fas fa-binoculars"></i> View Sightings</a>
        </div>

        @if ($missingPets->isEmpty())
            <p class="no-pets"><i class="fas fa-sad-tear"></i> No missing pets reported yet.</p>
        @else
            <div class="row">
                @foreach ($missingPets as $missingPet)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ Storage::url($missingPet->photo) }}" class="card-img-top" alt="Missing Pet Photo">
                            <div class="card-body">
                                <h5 class="card-title"><i class="fas fa-dog"></i> {{ $missingPet->pet->pet_name }}</h5>
                                <p class="card-text">
                                    <i class="fas fa-map-marker-alt"></i><strong>Last Seen:</strong> {{ $missingPet->last_seen_location }}<br>
                                    <i class="fas fa-calendar-day"></i><strong>Date:</strong> {{ $missingPet->last_seen_date }}<br>
                                    <i class="fas fa-clock"></i><strong>Time:</strong> {{ $missingPet->last_seen_time }}<br>
                                    <i class="fas fa-paw"></i><strong>Distinguishing Features:</strong> {{ $missingPet->distinguishing_features }}<br>
                                    @if ($missingPet->additional_info)
                                        <i class="fas fa-info-circle"></i><strong>Additional Info:</strong> {{ $missingPet->additional_info }}
                                    @endif
                                </p>
                                <a href="{{ route('found_reports.create', ['missing_pet_id' => $missingPet->id]) }}" class="btn-primary">
                                    <i class="fas fa-binoculars"></i> Report Sighting
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
