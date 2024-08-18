<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Fredoka', sans-serif;
            background-color: #f7f2e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .reviews-container {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 700px;
        }
        .reviews-container h3 {
            color: #ff6600;
            text-align: center;
            margin-bottom: 10px;
        }
        .reviews-container p {
            text-align: center;
            margin-bottom: 20px;
        }
        .review-item {
            border-bottom: 1px solid #ddd;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .review-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .review-item h5 {
            color: #ff6600;
            margin-bottom: 5px;
        }
        .review-item p {
            margin-bottom: 5px;
        }
        .review-item small {
            color: #888;
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
        }
        .pagination a:hover {
            background-color: #ff6600;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="reviews-container">
        <h3>Reviews</h3>
        <p>See what pet owners have to say about your services.</p>

        @foreach($reviews as $review)
            <div class="review-item">
                <h5>{{ $review->rating }} Stars</h5>
                <p>{{ $review->review }}</p>
                <small>Reviewed by: {{ $review->petowner->name }} on {{ $review->created_at->format('d M Y') }}</small>
            </div>
        @endforeach

        <div class="pagination">
            {{ $reviews->links() }}
        </div>
    </div>
</body>
</html>
