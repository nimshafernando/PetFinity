<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave a Review</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        body {
            font-family: 'Fredoka One', cursive;
            background-color: #F7E9DE;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .review-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #ff6600;
            margin-bottom: 20px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
            font-size: 1.2rem;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .btn {
            background-color: #ff6600;
            color: white;
            padding: 15px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            font-size: 1rem;
            display: block;
            width: 100%;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #F15F61;
        }
    </style>
</head>
<body>
    <div class="review-container">
        <h1>Leave a Review</h1>
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="">Select Rating</option>
                <option value="5">5 - Excellent</option>
                <option value="4">4 - Very Good</option>
                <option value="3">3 - Good</option>
                <option value="2">2 - Fair</option>
                <option value="1">1 - Poor</option>
            </select>

            <label for="review">Review:</label>
            <textarea name="review" id="review" rows="5" required></textarea>

            <button type="submit" class="btn">Submit Review</button>
        </form>
    </div>
</body>
</html>
