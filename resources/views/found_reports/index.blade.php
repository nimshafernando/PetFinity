<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reported Sightings</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F7E9DE;
            color: #333;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }

        h1 {
            text-align: center;
            color: #EA785B;
            font-size: 2.5rem;
            margin-bottom: 30px;
            font-family: 'Fredoka One', cursive;
            animation: slideIn 1s ease-in-out;
        }

        .grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .sighting-card {
            background-color: #FFF;
            border: 2px solid #EA785B;
            border-radius: 15px;
            padding: 15px;
            width: calc(33.333% - 20px); /* Adjusted width for three cards per row */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-family: 'Nunito', sans-serif;
        }

        .sighting-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .sighting-card img {
            width: 100%;
            border-radius: 10px;
            margin-top: 15px;
            height: 200px; /* Increased height for larger images */
            object-fit: cover;
        }

        .sighting-card h2 {
            color: #F15F61;
            font-size: 1.5rem;
            margin-bottom: 10px;
            font-family: 'Fredoka One', cursive;
        }

        .sighting-card p {
            font-size: 1rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @media (max-width: 768px) {
            .sighting-card {
                width: calc(50% - 20px); /* Two cards per row on medium screens */
            }
        }

        @media (max-width: 480px) {
            .sighting-card {
                width: 100%; /* Full width on small screens */
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Reported Sightings</h1>
    <div class="grid">
        @foreach($foundReports as $report)
            <div class="sighting-card">
                <h2>{{ $report->missingPet->pet->pet_name }}</h2>
                <p><strong>Location:</strong> {{ $report->location }}</p>
                <p><strong>Description:</strong> {{ $report->description }}</p>
                @if($report->photo)
                    <img src="{{ Storage::url($report->photo) }}" alt="Sighting Photo">
                @endif
            </div>
        @endforeach
    </div>
</div>

</body>
</html>
