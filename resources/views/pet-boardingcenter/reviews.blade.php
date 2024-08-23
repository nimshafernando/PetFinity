<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            max-width: 800px;
            border: 2px solid #035a2e;
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h3 {
            color: #035a2e;
            text-align: center;
            margin-bottom: 20px;
            font-size: 2rem;
        }

        p {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.2rem;
            color: #666;
        }

        .review-item {
            background-color: #f0f8f7;
            border: 1px solid #035a2e;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .review-item:hover {
            transform: translateY(-5px);
        }

        .review-rating {
            display: flex;
            align-items: center;
            font-size: 1.4rem;
            color: #ffbf00;
            margin-bottom: 10px;
        }

        .review-rating i {
            margin-right: 8px;
        }

        .review-text {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 10px;
            line-height: 1.4;
        }

        .review-meta {
            font-size: 0.9rem;
            color: #666;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: #035a2e;
            margin: 0 5px;
            padding: 8px 16px;
            border-radius: 5px;
            border: 1px solid #035a2e;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .pagination a:hover {
            background-color: #035a2e;
            color: #fff;
        }

        .back-button {
            position: fixed;
            top: 20px;
            left: 20px;
            background-color: #035a2e;
            color: #fff;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            transition: background-color 0.3s ease;
            z-index: 1000;
        }

        .back-button:hover {
            background-color: #00436d;
        }

        @media (max-width: 768px) {
            .reviews-container {
                width: 100%;
                padding: 15px;
            }

            .review-rating,
            .review-text,
            .review-meta {
                font-size: 0.9rem;
            }

            .pagination a {
                padding: 6px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('pet-boardingcenter.dashboard') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="reviews-container">
        <h3>Reviews</h3>
        <p>See what pet owners have to say about your services.</p>

        @foreach($reviews as $review)
        <div class="review-item">
            <div class="review-rating">
                <i class="fas fa-star"></i> {{ $review->rating }} Stars
            </div>
            <div class="review-text">
                {{ $review->review }}
            </div>
            <div class="review-meta">
                Reviewed by: {{ $review->petowner->name }}
                @if($review->created_at)
                    on {{ $review->created_at->format('d M Y') }}
                @else
                    on an unknown date
                @endif
            </div>
        </div>
        @endforeach

        <div class="pagination">
            {{ $reviews->links() }}
        </div>
    </div>
</body>

</html>
