<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        body {
            font-family: 'Nunito', sans-serif;
            background: linear-gradient(to right, #ff6a00, #ffb900);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            position: relative;
        }
        .animation-bg::before, .animation-bg::after {
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
        .animation-bg::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        .authentication-card {
            max-width: 700px;
            width: 100%;
            padding: 2rem 2rem 3rem 2rem;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }
        .authentication-card:hover { transform: translateY(-5px); }
        .authentication-card-logo { display: flex; justify-content: center; margin-bottom: 1.5rem; }
        .avatar { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin-bottom: 1rem; }
        .label { font-weight: 600; color: #4a5568; }
        .input { border: 1px solid #cbd5e0; border-radius: 8px; padding: 0.75rem; width: 100%; margin-top: 0.25rem; transition: border-color 0.3s, box-shadow 0.3s; }
        .input:focus { border-color: #3182ce; box-shadow: 0 0 0 2px rgba(49, 130, 206, 0.3); outline: none; }
        .button { display: inline-flex; justify-content: center; align-items: center; padding: 0.75rem 1.5rem; background: linear-gradient(135deg, #ff6600, #ff3300); color: white; font-weight: 600; border-radius: 8px; transition: background 0.3s, transform 0.3s; text-decoration: none; cursor: pointer; border: none; margin-left: 1rem; }
        .button:hover { background: linear-gradient(135deg, #ff3300, #ff6600); transform: translateY(-2px); }
        .button:focus { background: linear-gradient(135deg, #ff3300, #ff6600); outline: none; }
        .button:active { background: linear-gradient(135deg, #cc5200, #ff3300); transform: translateY(0); }
        .validation-errors { background-color: #fed7d7; border: 1px solid #fc8181; padding: 1rem; border-radius: 8px; color: #c53030; margin-bottom: 1rem; }
        .text-gray-600 { color: #718096; }
        .text-green-600 { color: #48bb78; }
        .underline { text-decoration: none; }
        .rounded-md { border-radius: 8px; }
        .hover\:text-gray-900:hover { color: #1a202c; }
        .focus\:outline-none:focus { outline: none; }
        .focus\:ring-2:focus { box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.3); }
        .focus\:ring-offset-2:focus { box-shadow: 0 0 0 4px rgba(66, 153, 225, 0.3); }
        .focus\:ring-indigo-500:focus { box-shadow: 0 0 0 4px rgba(66, 153, 225, 0.3); }
        .ms-2 { margin-left: 0.5rem; }
        .mt-4 { margin-top: 1rem; }
        .mb-4 { margin-bottom: 1rem; }
        .block { display: block; }
        .flex { display: flex; }
        .items-center { align-items: center; }
        .justify-end { justify-content: flex-end; }
        .guest-layout { display: flex; justify-content: center; align-items: center; height: 100vh; width: 100vw; position: absolute; top: 0; left: 0; }
        a { color: #3182ce; text-decoration: none; transition: color 0.3s; }
        a:hover { color: #2b6cb0; }
        .small-text { font-size: 0.875rem; }
        .title { font-family: 'Fredoka One', cursive; font-size: 3rem; color: #ff6600; margin-bottom: 1rem; text-align: center; }
    </style>
</head>
<body>
    <div class="animation-bg"></div>
    <div class="guest-layout">
        <div class="authentication-card">
            <div class="title">Petfinity</div>
            <div class="authentication-card-logo">
                <a href="/">
                    <img src="icon.jpeg" class="avatar" alt="User Avatar">
                </a>
            </div>

            <x-validation-errors class="mb-4" />

            @if (session('status'))
                <div class="mb-4 text-sm font-medium text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" onsubmit="return validateForm()">
                @csrf

                <div>
                    <x-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block w-full mt-1 input" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" :value="__('Password')" />
                    <x-input id="password" class="block w-full mt-1 input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input type="checkbox" id="remember_me" name="remember" class="checkbox">
                        <span class="text-sm text-gray-600 ms-2">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            Forgot your password?
                        </a>
                    @endif

                    <button type="submit" class="button ms-4">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function validateForm() {
            var email = document.getElementById('email').value;
            var password = document.getElementById('password').value;
            var errors = [];

            if (!email) {
                errors.push('Email is required.');
            }
            if (!password) {
                errors.push('Password is required.');
            }

            if (errors.length > 0) {
                var errorList = document.getElementById('error-list');
                errorList.innerHTML = '';
                errors.forEach(function (error) {
                    var li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                document.getElementById('validation-errors').style.display = 'block';
                return false;
            }
            return true;
        }
    </script>
</body>
</html>