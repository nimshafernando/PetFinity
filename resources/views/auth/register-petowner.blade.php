<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Owner Registration</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito|Fredoka+One&display=swap">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f7fafc;
            color: #4a5568;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        h1, h2 {
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 0.5rem;
            overflow: hidden;
        }

        @media(max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }

        .left-panel {
            background-color: #ff6600;
            padding: 1rem;
            text-align: center;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            position: relative;
            min-height: 100vh;
            overflow: hidden;
        }

        .left-panel::before, .left-panel::after {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            top: -100%;
            left: -100%;
            background: rgba(255, 255, 255, 0.1);
            animation: rotate 30s infinite linear;
            z-index: 0;
        }

        .left-panel::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        @keyframes rotate {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        .left-panel h1 {
            font-size: 6rem;
            font-family: 'Fredoka One', cursive;
            color: #ffffff;
            margin-bottom: 1rem;
            z-index: 1;
        }

        .left-panel p {
            color: #000000;
            margin-bottom: 2rem;
            z-index: 1;
            animation: fadeIn 2s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .left-panel button {
            background-color: #4e2103;
            color: #ffffff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            text-decoration: none;
            margin-bottom: 2rem;
            z-index: 1;
            animation: fadeIn 3s ease-in-out;
        }

        .left-panel img {
            max-width: 100%;
            height: auto;
            animation: fadeIn 4s ease-in-out;
            z-index: 1;
            flex-grow: 1;
            object-fit: cover;
        }

        .right-panel {
            padding: 2rem;
            flex: 2;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
        }

        .progress-bar {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 10px;
            background-color: #e2e8f0;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            overflow: hidden;
        }

        .progress {
            height: 100%;
            width: 0;
            background-color: #4a5568;
            transition: width 0.4s ease;
        }

        .section {
            display: none;
        }

        .section.active {
            display: block;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #4a5568;
        }

        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #ff6600;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1rem;
            font-size: 1rem;
            border-radius: 0.375rem;
            cursor: pointer;
            width: auto;
            margin-bottom: 1rem;
        }

        .form-group button:hover {
            background-color: #e05500;
        }

        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .justify-center {
            justify-content: center;
        }

        .error {
            color: red;
            font-size: 0.875rem;
        }

        .status-bar {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;
        }

        .status-bar div {
            width: 30px;
            height: 30px;
            background-color: #e2e8f0;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            font-weight: bold;
            margin: 0 0.5rem;
            position: relative;
        }

        .status-bar div.active {
            background-color: #ff6600;
        }

        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background-color: #21e435;
            top: -10px;
            z-index: 9999;
            animation: fall 3s linear infinite;
        }

        @keyframes fall {
            0% {
                transform: translateY(0) rotate(0);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(360deg);
                opacity: 0;
            }
        }

        .floating-circle {
            position: absolute;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.5);
            animation: float 10s infinite;
        }

        .circle1 {
            width: 50px;
            height: 50px;
            top: 20%;
            left: 10%;
            animation-duration: 8s;
        }

        .circle2 {
            width: 70px;
            height: 70px;
            top: 50%;
            left: 30%;
            animation-duration: 12s;
        }

        .circle3 {
            width: 40px;
            height: 40px;
            top: 70%;
            left: 80%;
            animation-duration: 10s;
        }

        .circle4 {
            width: 60px;
            height: 60px;
            top: 90%;
            left: 20%;
            animation-duration: 15s;
        }

        @keyframes float {
            0% {
                transform: translateY(0);
                opacity: 0.7;
            }
            50% {
                transform: translateY(-20px);
                opacity: 1;
            }
            100% {
                transform: translateY(0);
                opacity: 0.7;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>Petfinity</h1>
            <p>Welcome pet owners</p>
            <button onclick="location.href='{{ route('login')}}'">Already have an account?</button>
            {{-- <img src="/dg3.png" alt="Pet Image"> <!-- Replace with your image URL --> --}}
        </div>
        <div class="right-panel">
            <div class="progress-bar">
                <div class="progress" id="progress"></div>
            </div>
            <h1 class="mb-6 text-2xl font-bold text-center">Pet Owner Registration</h1>
            <div class="status-bar">
                <div class="active" id="status1">1</div>
                <div id="status2">2</div>
                <div id="status3">3</div>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('pet-owner.register') }}" onsubmit="return submitForm()" class="w-full" id="registrationForm">
                @csrf
                <div class="section active" id="section1">
                    <h2 class="mb-4 text-xl font-semibold">Essential Information</h2>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input id="first_name" class="form-input" type="text" name="first_name" required autofocus autocomplete="first_name" />
                        <div class="error" id="first_name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input id="last_name" class="form-input" type="text" name="last_name" required autocomplete="last_name" />
                        <div class="error" id="last_name_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input id="email" class="form-input" type="email" name="email" required autocomplete="username" />
                        <div class="error" id="email_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input id="phone_number" class="form-input" type="tel" name="phone_number" required autocomplete="tel" />
                        <div class="error" id="phone_number_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" class="form-input" type="password" name="password" required autocomplete="new-password" />
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" required autocomplete="new-password" />
                        <div class="error" id="password_confirmation_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="pets_owned">Pets Owned</label>
                        <input id="pets_owned" class="form-input" type="number" name="pets_owned" placeholder="Enter pet's owned" required />
                        <div class="error" id="pets_owned_error"></div>
                    </div>
                    <div class="form-group">
                        <label for="referral_source">Referral Source</label>
                        <div class="block w-full mt-1">
                            <label>
                                <input type="radio" name="referral_source" value="friend"> Friend 
                            </label><br>
                            <label>
                                <input type="radio" name="referral_source" value="onlinesearch"> Online Search
                            </label><br>
                            <label>
                                <input type="radio" name="referral_source" value="socialmedia"> Social Media
                            </label><br>
                            <label>
                                <input type="radio" name="referral_source" value="advertisement"> Advertisement
                            </label><br>
                            <label>
                                <input type="radio" name="referral_source" value="other"> Other
                            </label><br>
                        </div>
                        <div class="error" id="referral_source_error"></div>
                    </div>

                    <div class="flex justify-center form-group">
                        <button type="button" onclick="nextSection(1)">Next</button>
                    </div>
                </div>
                
                <div class="section" id="section2">
                    <h2 class="mb-4 text-xl font-semibold">Terms and Policies</h2>
                    <div class="form-group">
                        <label for="terms">
                            <div class="flex items-center">
                                <input type="checkbox" name="terms" id="terms" required />
                                <div class="ms-2">
                                    I agree to the <a target="_blank" href="/terms" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Terms of Service</a> and <a target="_blank" href="/privacy" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Privacy Policy</a>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="flex justify-between form-group">
                        <button type="button" onclick="prevSection(2)">Previous</button>
                        <button type="button" onclick="nextSection(2)">Next</button>
                    </div>
                </div>
                
                <div class="section" id="section3">
                    <h2 class="mb-4 text-xl font-semibold">Finalize Registration</h2>
                    <div class="flex justify-between form-group">
                        <button type="button" onclick="prevSection(3)">Previous</button>
                        <button type="submit" onclick="triggerConfetti()">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        function nextSection(currentSection) {
            const isValid = validateSection(currentSection);
            if (isValid) {
                document.getElementById('section' + currentSection).classList.remove('active');
                document.getElementById('section' + (currentSection + 1)).classList.add('active');
                document.getElementById('status' + currentSection).classList.remove('active');
                document.getElementById('status' + (currentSection + 1)).classList.add('active');
                updateProgress(currentSection + 1);
            }
        }

        function prevSection(currentSection) {
            document.getElementById('section' + currentSection).classList.remove('active');
            document.getElementById('section' + (currentSection - 1)).classList.add('active');
            document.getElementById('status' + currentSection).classList.remove('active');
            document.getElementById('status' + (currentSection - 1)).classList.add('active');
            updateProgress(currentSection - 1);
        }

        function updateProgress(section) {
            const progress = document.getElementById('progress');
            progress.style.width = (section / 3) * 100 + '%';
        }

        function validateSection(section) {
            let isValid = true;

            if (section === 1) {
                const firstName = document.getElementById('first_name').value.trim();
                const lastName = document.getElementById('last_name').value.trim();
                const email = document.getElementById('email').value.trim();
                const phoneNumber = document.getElementById('phone_number').value.trim();
                const petsOwned = document.getElementById('pets_owned').value.trim();
                const password = document.getElementById('password').value.trim();
                const passwordConfirmation = document.getElementById('password_confirmation').value.trim();

                if (!firstName) {
                    isValid = false;
                    document.getElementById('first_name_error').textContent = 'First Name is required.';
                } else {
                    document.getElementById('first_name_error').textContent = '';
                }

                if (!lastName) {
                    isValid = false;
                    document.getElementById('last_name_error').textContent = 'Last Name is required.';
                } else {
                    document.getElementById('last_name_error').textContent = '';
                }

                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!email || !emailPattern.test(email)) {
                    isValid = false;
                    document.getElementById('email_error').textContent = 'Valid email is required.';
                } else {
                    document.getElementById('email_error').textContent = '';
                }

                const phonePattern = /^\d{10}$/;
                if (!phoneNumber || !phonePattern.test(phoneNumber)) {
                    isValid = false;
                    document.getElementById('phone_number_error').textContent = 'Valid phone number is required.';
                } else {
                    document.getElementById('phone_number_error').textContent = '';
                }

                if (!petsOwned) {
                    isValid = false;
                    document.getElementById('pets_owned_error').textContent = 'Pets Owned is required.';
                } else {
                    document.getElementById('pets_owned_error').textContent = '';
                }

                if (!password) {
                    isValid = false;
                    document.getElementById('password_error').textContent = 'Password is required.';
                } else {
                    document.getElementById('password_error').textContent = '';
                }

                if (password !== passwordConfirmation) {
                    isValid = false;
                    document.getElementById('password_confirmation_error').textContent = 'Passwords do not match.';
                } else {
                    document.getElementById('password_confirmation_error').textContent = '';
                }
            }

            if (section === 2) {
                const terms = document.getElementById('terms');
                if (terms && !terms.checked) {
                    isValid = false;
                    alert('You must agree to the terms and conditions.');
                }
            }

            return isValid;
        }

        function submitForm() {
            const isValid = validateSection(3);
            if (isValid) {
                triggerConfetti();
                return true; // Ensure form submission
            }
            return false; // Prevent form submission if validation fails
        }

        function triggerConfetti() {
            for (let i = 0; i < 100; i++) {
                createConfetti();
            }
        }

        function createConfetti() {
            const confetti = document.createElement('div');
            confetti.classList.add('confetti');
            confetti.style.left = `${Math.random() * 100}%`;
            confetti.style.animationDuration = `${Math.random() * 3 + 2}s`;
            document.body.appendChild(confetti);
            setTimeout(() => confetti.remove(), 3000);
        }
    </script>
</body>
</html>
