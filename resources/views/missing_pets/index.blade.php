<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Missing Pets</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F7E9DE; /* Albescent White */
            color: #333;
            padding: 20px;
            margin: 0;
        }

        h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 3rem;
            color: #ff2051; /* Terra Cotta */
            text-align: center;
            margin-bottom: 40px;
            background-color: #FFBE98; /* Peach Fuzz */
            padding: 20px;
            border-radius: 15px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .alert-success {
            background-color: #F0BBB4; /* Spanish Pink */
            color: #FFF;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .col-md-4 {
            flex: 1 1 calc(33.333% - 40px);
            margin: 10px;
            max-width: calc(33.333% - 40px);
            background-color: #FFF;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .col-md-4:hover {
            transform: translateY(-10px);
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            background-color: #FFBE98; /* Peach Fuzz */
        }

        .card-title {
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            color: #ff6600; /* Terra Cotta */
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 1rem;
            color: #333;
            margin-bottom: 20px;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #ff6600; /* Carnation */
            color: #FFF;
            text-align: center;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1.2rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #F15F61; /* Terra Cotta */
        }

        /* Add some background texture or pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://www.transparenttextures.com/patterns/french-stucco.png');
            opacity: 0.4;
            z-index: -1;
        }

        @media (max-width: 768px) {
            .col-md-4 {
                flex: 1 1 calc(100% - 40px);
                max-width: calc(100% - 40px);
            }

            h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
                padding: 10px;
            }

            .btn-primary {
                font-size: 1rem;
            }

            .card-body {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1 style="background-color: #FFBE98;">Missing Pets</h1>

    @if (session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('missing_pets.map') }}" class="mb-3 btn-primary">View Map</a>

    @if ($missingPets->isEmpty())
        <p>No missing pets reported yet.</p>
    @else
        <div class="row">
            @foreach ($missingPets as $missingPet)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ Storage::url($missingPet->photo) }}" class="card-img-top" alt="Missing Pet Photo">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #ff6600;">{{ $missingPet->pet->pet_name }}</h5>
                            <p class="card-text">
                                <strong>Last Seen:</strong> {{ $missingPet->last_seen_location }}<br>
                                <strong>Date:</strong> {{ $missingPet->last_seen_date }}<br>
                                <strong>Time:</strong> {{ $missingPet->last_seen_time }}<br>
                                <strong>Distinguishing Features:</strong> {{ $missingPet->distinguishing_features }}<br>
                                @if ($missingPet->additional_info)
                                    <strong>Additional Info:</strong> {{ $missingPet->additional_info }}
                                @endif
                            </p>
                            <a href="{{ route('found_reports.create', ['missing_pet_id' => $missingPet->id]) }}" class="btn-primary">Report Sighting</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

</body>
</html>
