<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Missing Pet</title>
    <style>
        body {
            background-color: #FFBE98; /* Peach Fuzz */
            font-family: 'Fredoka One', cursive, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #EA785B; /* Terra Cotta */
        }

        h1 {
            text-align: center;
            color: #EA785B; /* Terra Cotta */
            position: relative;
        }

        .paw-print-top {
            position: absolute;
            top: -40px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 50px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/0/0c/Light_paw_print.svg') no-repeat center center;
            background-size: contain;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #EA785B;
            margin-bottom: 5px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 2px solid #EA785B; /* Terra Cotta */
            background-color: #F0BBB4; /* Spanish Pink */
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #EA785B;
            outline: none;
            box-shadow: 0 0 5px rgba(234, 120, 91, 0.5);
        }

        .btn-primary {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #EA785B;
            border-color: #EA785B;
            color: white;
            font-weight: bold;
            text-align: center;
            cursor: pointer;
            border-radius: 10px;
            font-size: 18px;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #D25F51; /* Darker Terra Cotta */
            border-color: #D25F51;
        }

        .paw-print-bottom {
            display: block;
            margin: 20px auto 0;
            width: 50px;
            height: 50px;
            background: url('https://upload.wikimedia.org/wikipedia/commons/0/0c/Light_paw_print.svg') no-repeat center center;
            background-size: contain;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="paw-print-top"></div>
    <h1>Report Missing Pet</h1>
    <form method="POST" action="{{ route('missing_pets.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="pet_id">Pet</label>
            <select name="pet_id" id="pet_id" class="form-control" required>
                @foreach($pets as $pet)
                    <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="last_seen_location">Last Seen Location</label>
            <input type="text" name="last_seen_location" id="last_seen_location" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_seen_date">Last Seen Date</label>
            <input type="date" name="last_seen_date" id="last_seen_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_seen_time">Last Seen Time</label>
            <input type="time" name="last_seen_time" id="last_seen_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="distinguishing_features">Distinguishing Features</label>
            <textarea name="distinguishing_features" id="distinguishing_features" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo" class="form-control" required>
        </div>
        <button type="submit" class="btn-primary">Report Missing Pet</button>
        <div class="paw-print-bottom"></div>
    </form>
</div>

</body>
</html>
