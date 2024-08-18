<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BOOK APPOINTMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff6600, #ff9933);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
            overflow-x: hidden;
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #ff6600;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 28px;
            text-transform: uppercase;
        }

        .form-label {
            font-weight: bold;
            color: #ff6600;
        }

        .form-control,
        .form-select {
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border: 1px solid #ff6600;
        }

        .btn-primary {
            background-color: #ff6600;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 20px;
        }

        .btn-primary:hover {
            background-color: #28a907;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #ff3131;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        .btn-secondary:hover {
            background-color: #b62828;
            transform: translateY(-2px);
        }

        .input-group-text {
            background-color: #ff6600;
            border: none;
            color: white;
        }

        .icon-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
        }

        .icon-container i {
            font-size: 40px;
            color: #ff6600;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="icon-container">
            <i class="fas fa-paw"></i>
        </div>

        <h1>BOOK APPOINTMENT AT {{ strtoupper($boardingCenter->business_name) }}</h1>

        <form action="{{ route('booking.store') }}" method="POST">
            @csrf
            <input type="hidden" name="boardingcenter_id" value="{{ $boardingCenter->id }}">
            <input type="hidden" name="petowner_id" value="{{ Auth::id() }}">

            <div class="mb-3">
                <label for="pet_id" class="form-label">Pet</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-dog"></i></span>
                    <select name="pet_id" id="pet_id" class="form-select" required>
                        @foreach ($pets as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->pet_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    

            <div class="mb-3">
                <label for="start_date" class="form-label">Start Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" name="start_date" id="start_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">End Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                    <input type="date" name="end_date" id="end_date" class="form-control" min="{{ date('Y-m-d') }}" required>
                </div>
            </div>

           

            <div class="mb-3">
                <label for="check_in_time" class="form-label">Check-In Time</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    <input type="time" name="check_in_time" id="check_in_time" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="check_out_time" class="form-label">Check-Out Time</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                    <input type="time" name="check_out_time" id="check_out_time" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="special_notes" class="form-label">Special Notes</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-sticky-note"></i></span>
                    <textarea name="special_notes" id="special_notes" class="form-control"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Book Appointment</button>
            <a href="{{ route('boarding-centers.show', $boardingCenter->id) }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
