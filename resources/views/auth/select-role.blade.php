<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role</title>
    <style>
        @keyframes backgroundAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, white 50%, #FFE5B4 50%);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            overflow: hidden;
            position: relative;
        }

        .roleContainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
            z-index: 1;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .roleContainer > h1 {
            margin-bottom: 40px;
            font-size: 3em;
            color: #ff6000;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .containers {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: nowrap;
        }

        .containers > div {
            flex: 1 1 calc(33.333% - 20px);
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, background-color 0.3s ease-in-out;
            position: relative;
            max-width: 300px;
        }

        .containers > div:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.4);
            background-color: #ff6000;
            color: #fff;
        }

        .containers > div:hover h2, .containers > div:hover p {
            color: #fff;
        }

        .containers > div h2 {
            margin-bottom: 10px;
            font-size: 1.8em;
            color: #333;
        }

        .containers > div p {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #555;
        }

        .containers > div img {
            width: 80px;
            height: 80px;
            margin-bottom: 15px;
            transition: transform 0.3s ease-in-out;
            border-radius: 15px;
        }

        button {
            width: 100%;
            background-color: transparent;
            border: none;
            cursor: pointer;
            outline: none;
            position: relative;
        }

        button:hover img {
            transform: scale(1.1);
        }

        .tick-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0);
            width: 100px;
            height: 100px;
            background-color: #28a745;
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 50px;
            transition: transform 0.3s ease-in-out;
        }

        .containers > div.selected .tick-icon {
            transform: translate(-50%, -50%) scale(1);
        }

        @media (max-width: 1024px) {
            .roleContainer > h1 {
                font-size: 2.5em;
            }

            .containers {
                flex-wrap: wrap;
                justify-content: center;
            }

            .containers > div {
                flex: 1 1 calc(50% - 20px);
                max-width: none;
                margin-bottom: 20px;
            }

            .containers > div h2 {
                font-size: 1.8em;
            }

            .containers > div p {
                font-size: 1.2em;
            }

            .containers > div img {
                width: 70px;
                height: 70px;
            }

            .tick-icon {
                width: 80px;
                height: 80px;
                font-size: 40px;
            }
        }

        @media (max-width: 768px) {
            .roleContainer > h1 {
                font-size: 2em;
            }

            .containers > div {
                flex: 1 1 100%;
                max-width: none;
                margin-bottom: 20px;
            }

            .containers > div h2 {
                font-size: 1.5em;
            }

            .containers > div p {
                font-size: 1.1em;
            }

            .containers > div img {
                width: 60px;
                height: 60px;
            }

            .tick-icon {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
        }

        @media (max-width: 480px) {
            .roleContainer > h1 {
                font-size: 1.8em;
            }

            .containers > div h2 {
                font-size: 1.3em;
            }

            .containers > div p {
                font-size: 1em;
            }

            .containers > div img {
                width: 50px;
                height: 50px;
            }

            .tick-icon {
                width: 60px;
                height: 60px;
                font-size: 30px;
            }
        }
    </style>
</head>
<body>
    <div class="roleContainer">
        <h1>Select your role</h1>
        <div class="containers">
            <div class="petOwnerContainer" data-type="Pet-Owner">
                <form action="{{ route('user-type.store') }}" method="POST" class="roleForm">
                    @csrf
                    <input type="hidden" name="user_type" value="Pet-Owner">
                    <button type="submit">
                        <img src="images/owner.png" alt="Pet Owner">
                        <h2>Pet Owner</h2>
                        <p>Find and book the best pet services easily.</p>
                        <div class="tick-icon">✓</div>
                    </button>
                </form>        
            </div>
            <div class="petTrainingCentreContainer" data-type="Training-Center">
                <form action="{{ route('user-type.store') }}" method="POST" class="roleForm">
                    @csrf
                    <input type="hidden" name="user_type" value="Training-Center">
                    <button type="submit">
                        <img src="images/trainer.png" alt="Pet Training Center">
                        <h2>Pet Training Center</h2>
                        <p>Offer and track pet training services seamlessly.</p>
                        <div class="tick-icon">✓</div>
                    </button>
                </form>        
            </div>
            <div class="petBoardingCentreContainer" data-type="Boarding-Center">
                <form action="{{ route('user-type.store') }}" method="POST" class="roleForm">
                    @csrf
                    <input type="hidden" name="user_type" value="Boarding-Center">
                    <button type="submit">
                        <img src="images/boarding.png" alt="Pet Boarding Center">
                        <h2>Pet Boarding Center</h2>
                        <p>Manage your boarding services efficiently.</p>
                        <div class="tick-icon">✓</div>
                    </button>
                </form>        
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.roleForm').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                document.querySelectorAll('.containers > div').forEach(div => {
                    div.classList.remove('selected');
                });
                form.closest('div').classList.add('selected');
                form.submit();
            });
        });
    </script>
</body>
</html>