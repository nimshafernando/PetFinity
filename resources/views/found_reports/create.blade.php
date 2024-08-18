<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Sighting</title>
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #F7E9DE; /* Albescent White */
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            max-width: 600px;
            margin: 20px;
            background-color: #FFF;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            font-family: 'Fredoka One', cursive;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #EA785B;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #EA785B;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #EA785B;
            background-color: #F0BBB4;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #EA785B;
            border-color: #EA785B;
            color: white;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            border-radius: 8px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease;
            margin-top: 30px;
        }

        .btn-primary:hover {
            background-color: #F15F61;
            border-color: #F15F61;
        }

        /* Add icons to form labels */
        .form-group label i {
            margin-right: 10px;
            color: #EA785B;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8rem;
            }

            .form-group label {
                font-size: 1rem;
            }

            .btn-primary {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            h1 {
                font-size: 1.5rem;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .btn-primary {
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Report Sighting for {{ $missingPet->pet->pet_name }}</h1>
    <form method="POST" action="{{ route('found_reports.store', $missingPet->id) }}" enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="missing_pet_id" value="{{ $missingPet->id }}">
    
        <div class="form-group">
            <label for="location"><i class="fas fa-map-marker-alt"></i> Location</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>
    
        <div class="form-group">
            <label for="description"><i class="fas fa-info-circle"></i> Description</label>
            <textarea name="description" id="description" class="form-control"></textarea>
        </div>
    
        <div class="form-group">
            <label for="photo"><i class="fas fa-camera"></i> Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
    
        <button type="submit" class="btn-primary">Report Sighting</button>
    </form>
    
</div>

<!-- Include Font Awesome for icons -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>

</body>
</html>
