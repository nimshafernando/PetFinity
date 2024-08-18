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

        .petTypeContainer {
            max-width: 1200px;
            margin: 0 auto;
            padding: 100px;
            text-align: center;
            z-index: 1;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .petTypeContainer > h1 {
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
            gap: 50px;
            flex-wrap: nowrap;
        }

        .containers > div {
            flex: 1 1 calc(50% - 20px);
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

        .containers > div img, .containers > div svg {
            width: 100px;
            height: 100px;
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

        button:hover img, button:hover svg {
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
            .petTypeContainer > h1 {
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

            .containers > div img, .containers > div svg {
                width: 70px;
                height: 70px;
            }

            .tick-icon {
                width: 100px;
                height: 100px;
                font-size: 40px;
            }
        }

        @media (max-width: 768px) {
            .petTypeContainer > h1 {
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

            .containers > div img, .containers > div svg {
                width: 80px;
                height: 80px;
            }

            .tick-icon {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
        }

        @media (max-width: 480px) {
            .petTypeContainer > h1 {
                font-size: 1.8em;
            }

            .containers > div h2 {
                font-size: 1.3em;
            }

            .containers > div p {
                font-size: 1em;
            }

            .containers > div img, .containers > div svg {
                width: 80px;
                height: 80px;
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
    <div class="petTypeContainer">
        <h1>Select Your Pet Type</h1>
        <div class="containers">
            <a href="{{ route('pet.create', ['type' => 'dog']) }}">
            <div class="dogType" data-type="dog">
                    <svg class="svg" width="200px" height="300px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">
    
    
                        <path d="M14.1 46.2C8 45.7 3 38 3 38c0 9.5 8.4 13 12.2 11.7c3.4-1.1-1.1-3.5-1.1-3.5z" fill="#947151">
                        
                        </path>
                        
                        <path d="M41.3 56c1.7 2 9.5 0 10.8-2.3c5.1-9.5 0-15.6 0-15.6l-10.8 3.3c0 .1-2.2 12.1 0 14.6" fill="#eabc92">
                        
                        </path>
                        
                        <path d="M34 60.4c1.9 2.2 8.8 2.1 10.8 0c3-3 2.8-16.7 3-23.3L35.1 36S31.6 57.5 34 60.4" fill="#f5d1ac">
                        
                        </path>
                        
                        <path d="M26.7 56c-1.7 2-9.5 0-10.8-2.3c-5.1-9.5 0-15.6 0-15.6l10.8 3.3c0 .1 2.3 12.1 0 14.6" fill="#eabc92">
                        
                        </path>
                        
                        <path d="M34.1 60.4c-1.9 2.2-8.8 2.1-10.8 0c-3-3-2.8-16.7-3-23.3L33 36s3.5 21.5 1.1 24.4" fill="#f5d1ac">
                        
                        </path>
                        
                        <path d="M34 60.5c-.3-2.1-.4-4.2-.4-6.3c0-2.1.1-4.2.4-6.3c.3 2.1.4 4.2.4 6.3c0 2.1-.1 4.2-.4 6.3" fill="#423223">
                        
                        </path>
                        
                        <path d="M34 46.5c-10.2 0-15.4-4-15.4-4S22 51.6 34 51.6s15.4-9.1 15.4-9.1s-5.2 4-15.4 4" fill="#3e4347">
                        
                        </path>
                        
                        <path d="M31.1 49c0-1.4.6-2.5 1.3-2.6c-.2-.2-.5-.3-.7-.3c-.9 0-1.6 1.3-1.6 2.9c0 1.6.7 2.9 1.6 2.9c.3 0 .5-.2.7-.4c-.7 0-1.3-1.1-1.3-2.5" fill="#ffffff">
                        
                        </path>
                        
                        <path d="M19.5 43C13.4 39.2 11 24.3 13 17.6c1.5-5 7-12.4 12-14.4c4.2-1.6 13.9-1.6 18.1 0c5 1.9 10.6 9.3 12 14.4c2 6.8.5 21.6-5.6 25.4c-12.8 8-17.2 8-30 0" fill="#f5d1ac">
                        
                        </path>
                        
                        <path d="M9.9 19.1c3.2 6.9 4 7.2 7.1-1c1.6-4.4.5-7 2.4-9.8c1.1-1.6 3.5-4.1 3.5-4.1S3.7 6.1 9.9 19.1" fill="#423223">
                        
                        </path>
                        
                        <path d="M18 3.9c-4.8 3-15.1 1.8-9 14.8c3.2 6.9 4 7.2 7.1-1c1.6-4.4.5-7 2.4-9.8c1.1-1.6 4.4-3.7 4.4-3.7s-1.5-2.4-4.9-.3" fill="#947151">
                        
                        </path>
                        
                        <path d="M58.2 19.1c-3.2 6.9-4 7.2-7.1-1c-1.6-4.4-.5-7-2.4-9.8c-1.1-1.6-3.5-4.1-3.5-4.1s19.2 1.9 13 14.9" fill="#423223">
                        
                        </path>
                        
                        <path d="M50.1 3.9c4.8 3 15.2 1.8 9.1 14.8c-3.2 6.9-4 7.2-7.1-1c-1.6-4.4-.5-7-2.4-9.8c-1.1-1.6-4.4-3.7-4.4-3.7s1.4-2.4 4.8-.3" fill="#947151">
                        
                        </path>
                        
                        <path d="M21.2 19.2c3 0 5.4 2.3 5.4 5.2s-2.4 5.2-5.4 5.2c-3 0-5.4-2.3-5.4-5.2s2.5-5.2 5.4-5.2" fill="#ffffff">
                        
                        </path>
                        
                        <ellipse cx="19.9" cy="24.4" rx="4" ry="3.9" fill="#3e4347">
                        
                        </ellipse>
                        
                        <path d="M52.2 24.4c0 2.9-2.4 5.2-5.4 5.2c-3 0-5.4-2.3-5.4-5.2s2.4-5.2 5.4-5.2c3 0 5.4 2.3 5.4 5.2" fill="#ffffff">
                        
                        </path>
                        
                        <ellipse cx="48.2" cy="24.4" rx="4" ry="3.9" fill="#3e4347">
                        
                        </ellipse>
                        
                        <path d="M24.8 40.1l4.2 4.2c2.5 2.5 7.7 2.5 10.2 0l4.2-4.2l-4.4-4.3h-9.9l-4.3 4.3" fill="#7d644b">
                        
                        </path>
                        
                        <path d="M34 32.1s-4.4 6.1-3.8 9c.7 4.2 7 4.2 7.7 0c.5-2.9-3.9-9-3.9-9" fill="#f15a61">
                        
                        </path>
                        
                        <path d="M34 42.7l1-5.9h-1.9l.9 5.9" fill="#ba454b">
                        
                        </path>
                        
                        <path fill="#423223" d="M29.5 33.8h9v4h-9z">
                        
                        </path>
                        
                        <path d="M48.3 34.7l-6.4-6.5c-3.9-3.9-11.8-3.9-15.6 0l-6.4 6.5c-1.8 1.8-1.8 4.8 0 6.7c1.8 1.8 4.8 1.8 6.6 0l6.4-6.5c.6-.6 1.8-.6 2.4 0l6.4 6.5c1.8 1.8 4.8 1.8 6.6 0c1.8-1.8 1.8-4.8 0-6.7" fill="#947151">
                        
                        </path>
                        
                        <g fill="#3e4347">
                        
                        <path d="M28.7 28.7c0-2.3 2.4-2.7 5.3-2.7s5.3.4 5.3 2.7c0 1.8-4.2 3.4-5.3 3.4c-1 0-5.3-1.6-5.3-3.4">
                        
                        </path>
                        
                        <path d="M27.1 30.7l-.9.9l.9.9l.9-.9z">
                        
                        </path>
                        
                        <path d="M25 33.1l-.9.9l.9.9l.9-.9z">
                        
                        </path>
                        
                        <path d="M27.8 34l-.9.9l.9.9l.9-.9z">
                        
                        </path>
                        
                        <path d="M41 30.7l.9.9l-.9.9l-.9-.9z">
                        
                        </path>
                        
                        <path d="M43.1 33.1l.9.9l-.9.9l-.9-.9z">
                        
                        </path>
                        
                        <path d="M40.3 34l.9.9l-.9.9l-.9-.9z">
                        
                        </path>
                        
                        </g>
                        
                        </svg>
    
        
                   
                    <div class="tick-icon">✓</div>
                </a>
            </div>
            <div class="catType" data-type="cat">
                <a href="{{ route('pet.create', ['type' => 'cat']) }}">
                    <svg class="svg" width="200px" height="300px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">
    
                        <g fill="#3e4347">
                        
                        <path d="M2.3 36.1c-.2-1-.3-2-.2-2.9c0-1.2.3-2.2.9-3.2c.6-1.1 1.6-2 2.7-2.5c1.1-.6 2.5-.8 3.8-.6c1.2.1 2.4.6 3.4 1.3c.9.6 1.7 1.4 2.4 2.3c1.1 1.5 1.9 3.3 2.3 5.4v.3c.2 1.3-.6 2.5-1.9 2.9c-.2.1-.4.1-.6.1c-.8.1-1.5-.1-2.1-.6c-.6-.5-1-1.1-1.1-1.9c-.2-1.4-.5-2.6-1.1-3.5c-.5-.9-1.3-1.6-2.1-1.8c-.3-.1-.7-.1-1 0c-.4.1-.7.4-.9.7c-.3.4-.5.8-.5 1.4c-.1.6-.1 1.2 0 1.8c.2 1.2.6 2.6 1.3 4c.3.6.7 1.3 1.1 2c.4.7.9 1.3 1.3 1.8c1.1 1.3 2.1 2.3 3.2 3.1c1.3.9 2.6 1.5 3.9 1.7c1.3.2 2.8.2 4.3-.3c1.2-.3 1.9.1 2.1.7c.2.5-.1 1.3-1.3 1.7h-.1c-1.8.6-3.7.8-5.4.5c-1.7-.2-3.5-1-5.2-2c-1.4-.9-2.6-2.1-3.9-3.5c-.5-.6-1-1.2-1.4-1.7L6 43c-.6-.7-1.1-1.4-1.5-2.1c-1.2-1.6-1.9-3.2-2.2-4.8">
                        
                        </path>
                        
                        <path d="M46.7 55.9c1.8 2.3 9.7 0 11-2.6c5.2-10.6 0-15.2 0-15.2l-11 1.5c0 .1-2.2 13.5 0 16.3">
                        
                        </path>
                        
                        <path d="M31.8 55.9c-1.8 2.3-9.7 0-11-2.6c-5.2-10.6 0-15.2 0-15.2l11 1.5c0 .1 2.3 13.5 0 16.3">
                        
                        </path>
                        
                        </g>
                        
                        <g fill="#ffffff">
                        
                        <path d="M34.5 55.2c-.1 1.1-2.6 1.7-5.6 1.4c-3-.3-5.3-1.3-5.3-2.4c.1-1.1 2.4.3 5.4.5c3.1.4 5.6-.5 5.5.5">
                        
                        </path>
                        
                        <path d="M44 55.2c.1 1.1 2.6 1.7 5.6 1.4c3-.3 5.3-1.3 5.3-2.4c-.1-1.1-2.4.3-5.4.5c-3.1.4-5.6-.5-5.5.5">
                        
                        </path>
                        
                        </g>
                        
                        <g fill="#4c5359">
                        
                        <path d="M39.2 60.4c2 2.2 8.9 2.1 11.1 0c3-3 2.9-16.7 3-23.3l-13-1.1c.1 0-3.6 21.5-1.1 24.4">
                        
                        </path>
                        
                        <path d="M39.3 60.4c-2 2.2-8.9 2.1-11.1 0c-3-3-2.9-16.7-3-23.3l13-1.1s3.6 21.5 1.1 24.4">
                        
                        </path>
                        
                        </g>
                        
                        <path fill="#ffffff" d="M34 43.7l5.3 11.2l5.3-11.2z">
                        
                        </path>
                        
                        <path d="M59.9 2.2C57.5.8 45.1 7.3 42.6 11.7l17.9 10.6c2.4-4.3 1.7-18.8-.6-20.1" fill="#4c5359">
                        
                        </path>
                        
                        <path d="M56.2 8.8c-.9-.5-8.2 2.8-9.6 5.2l10 5.9c1.3-2.3.4-10.6-.4-11.1" fill="#f7a4a4">
                        
                        </path>
                        
                        <path d="M18.7 2.2c-2.4 1.4-3.1 15.7-.6 20.1L36 11.7C33.6 7.4 21 .8 18.7 2.2z" fill="#4c5359">
                        
                        </path>
                        
                        <path d="M22.5 8.8c-.9.5-1.8 8.7-.4 11.1L32 14c-1.3-2.3-8.7-5.7-9.5-5.2" fill="#f7a4a4">
                        
                        </path>
                        
                        <path d="M39.3 9.4C18.5 9.4 16.5 24 16.5 32.1c0 3.4 10.2 13.9 22.7 13.9C51.8 46 62 35.5 62 32.1C62 24 60 9.4 39.3 9.4" fill="#4c5359">
                        
                        </path>
                        
                        <path d="M33.5 28.5s-2.4 3.6-6.8 2.5s-4.6-5.4-4.6-5.4s2.4-3.6 6.8-2.5c4.4 1.2 4.6 5.4 4.6 5.4" fill="#bfffab">
                        
                        </path>
                        
                        <path d="M33 26.7S30.9 29 28 29c-3.1 0-5-4.4-5-4.4s2.1-2.4 5.8-1.4c3.5.8 4.2 3.5 4.2 3.5" fill="#93e67f">
                        
                        </path>
                        
                        <path d="M29.8 26.6c0 4.9-2.4 4.9-2.4 0s2.4-4.9 2.4 0" fill="#4c5359">
                        
                        </path>
                        
                        <path d="M45.1 28.5s2.4 3.6 6.8 2.5s4.6-5.4 4.6-5.4s-2.4-3.6-6.8-2.5c-4.4 1.2-4.6 5.4-4.6 5.4" fill="#bfffab">
                        
                        </path>
                        
                        <path d="M45.5 26.7s2.1 2.3 5 2.3c3.1 0 5-4.4 5-4.4s-2.1-2.4-5.8-1.4c-3.5.8-4.2 3.5-4.2 3.5" fill="#93e67f">
                        
                        </path>
                        
                        <path d="M48.7 26.6c0 4.9 2.4 4.9 2.4 0c.1-4.9-2.4-4.9-2.4 0" fill="#4c5359">
                        
                        </path>
                        
                        <path d="M45.9 32.5c-2-1.5-4.2-6.5-6.6-6.5s-4.7 5-6.6 6.5c-3.1 2.4-11.5 5.1-11.5 5.1s8.9 7.6 18.1 7.6c9.2 0 18.1-7.6 18.1-7.6s-8.4-2.7-11.5-5.1" fill="#ffffff">
                        
                        </path>
                        
                        <g fill="#4c5359">
                        
                        <path d="M45.7 39.3c-.7.4-1.6.6-2.4.6c-.8-.1-1.6-.3-2.2-.8c-.6-.5-1.1-1.2-1.2-1.9l-.6-3.3l-.6 3.3c-.1.8-.6 1.4-1.2 1.9s-1.4.8-2.2.8c-.9 0-1.7-.1-2.4-.6c-.7-.4-1.4-1.1-1.7-2c0 1 .6 1.9 1.3 2.5c.7.6 1.8 1 2.7 1.1c1 .1 2-.2 2.9-.8c.5-.3.8-.7 1.2-1.2c.3.5.7.9 1.2 1.2c.9.6 1.9.9 2.9.8c1 0 2-.4 2.7-1.1c.8-.6 1.3-1.6 1.3-2.5c-.3.9-.9 1.6-1.7 2">
                        
                        </path>
                        
                        <path d="M42.4 33.1c-.6-.7-2.5-.8-3.1-.8c-.6 0-2.5.1-3.1.8c-.4.5-.1 1.8 1.1 3c.7.7 1.4.9 2 .9c.6 0 1.3-.2 2-.9c1.2-1.2 1.5-2.5 1.1-3">
                        
                        </path>
                        
                        </g>
                        
                        <g fill="#ffffff">
                        
                        <path d="M39 59.6c0 1.1-2.3 1.9-5.2 1.9c-2.9 0-5.2-.9-5.2-1.9c0-1.1 2.3.1 5.2.1c2.8 0 5.2-1.1 5.2-.1">
                        
                        </path>
                        
                        <path d="M49.9 59.6c0 1.1-2.3 1.9-5.2 1.9c-2.9 0-5.2-.9-5.2-1.9c0-1.1 2.3.1 5.2.1c2.9 0 5.2-1.1 5.2-.1">
                        
                        </path>
                        
                        </g>
                        
                        <g fill="#3e4347">
                        
                        <path d="M29.6 61.2l1.4-2.4l-.4 2.8z">
                        
                        </path>
                        
                        <path d="M33.1 62l.5-3.3l.5 3.3z">
                        
                        </path>
                        
                        <path d="M37 61.6l-.4-2.6l1.4 2.3z">
                        
                        </path>
                        
                        <path d="M48 61.6l-.4-2.8l1.4 2.4z">
                        
                        </path>
                        
                        <path d="M44.4 62l.5-3.3l.5 3.3z">
                        
                        </path>
                        
                        <path d="M40.5 61.3l1.4-2.3l-.4 2.6z">
                        
                        </path>
                        
                        </g>
                        
                        </svg>
                

                    <div class="tick-icon">✓</div>
                </div>
            </a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.containers > div').forEach(div => {
            div.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.containers > div').forEach(div => {
                    div.classList.remove('selected');
                });
                div.classList.add('selected');
                window.location.href = div.querySelector('a').href;
            });
        });
    </script>

</body>
</html>



{{-- 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choose Your Role</title>

    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.petTypeContainer {
    max-width: 900px;
    margin: 100px auto;
    padding: 100px;
    display: flex;
    justify-content: space-around;
    gap: 40px;
}

.petTypeContainer > div {
    width: 30%;
    background-color: pink;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
}

.svg {
    height: 100px;
    width: 100px;
}

</style>
</head>
<body>

    <div class="petTypeContainer">

        <a href="{{ route('pet.create', ['type' => 'dog']) }}">
            <div class="dogType">
                <svg class="svg" width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">


                    <path d="M14.1 46.2C8 45.7 3 38 3 38c0 9.5 8.4 13 12.2 11.7c3.4-1.1-1.1-3.5-1.1-3.5z" fill="#947151">
                    
                    </path>
                    
                    <path d="M41.3 56c1.7 2 9.5 0 10.8-2.3c5.1-9.5 0-15.6 0-15.6l-10.8 3.3c0 .1-2.2 12.1 0 14.6" fill="#eabc92">
                    
                    </path>
                    
                    <path d="M34 60.4c1.9 2.2 8.8 2.1 10.8 0c3-3 2.8-16.7 3-23.3L35.1 36S31.6 57.5 34 60.4" fill="#f5d1ac">
                    
                    </path>
                    
                    <path d="M26.7 56c-1.7 2-9.5 0-10.8-2.3c-5.1-9.5 0-15.6 0-15.6l10.8 3.3c0 .1 2.3 12.1 0 14.6" fill="#eabc92">
                    
                    </path>
                    
                    <path d="M34.1 60.4c-1.9 2.2-8.8 2.1-10.8 0c-3-3-2.8-16.7-3-23.3L33 36s3.5 21.5 1.1 24.4" fill="#f5d1ac">
                    
                    </path>
                    
                    <path d="M34 60.5c-.3-2.1-.4-4.2-.4-6.3c0-2.1.1-4.2.4-6.3c.3 2.1.4 4.2.4 6.3c0 2.1-.1 4.2-.4 6.3" fill="#423223">
                    
                    </path>
                    
                    <path d="M34 46.5c-10.2 0-15.4-4-15.4-4S22 51.6 34 51.6s15.4-9.1 15.4-9.1s-5.2 4-15.4 4" fill="#3e4347">
                    
                    </path>
                    
                    <path d="M31.1 49c0-1.4.6-2.5 1.3-2.6c-.2-.2-.5-.3-.7-.3c-.9 0-1.6 1.3-1.6 2.9c0 1.6.7 2.9 1.6 2.9c.3 0 .5-.2.7-.4c-.7 0-1.3-1.1-1.3-2.5" fill="#ffffff">
                    
                    </path>
                    
                    <path d="M19.5 43C13.4 39.2 11 24.3 13 17.6c1.5-5 7-12.4 12-14.4c4.2-1.6 13.9-1.6 18.1 0c5 1.9 10.6 9.3 12 14.4c2 6.8.5 21.6-5.6 25.4c-12.8 8-17.2 8-30 0" fill="#f5d1ac">
                    
                    </path>
                    
                    <path d="M9.9 19.1c3.2 6.9 4 7.2 7.1-1c1.6-4.4.5-7 2.4-9.8c1.1-1.6 3.5-4.1 3.5-4.1S3.7 6.1 9.9 19.1" fill="#423223">
                    
                    </path>
                    
                    <path d="M18 3.9c-4.8 3-15.1 1.8-9 14.8c3.2 6.9 4 7.2 7.1-1c1.6-4.4.5-7 2.4-9.8c1.1-1.6 4.4-3.7 4.4-3.7s-1.5-2.4-4.9-.3" fill="#947151">
                    
                    </path>
                    
                    <path d="M58.2 19.1c-3.2 6.9-4 7.2-7.1-1c-1.6-4.4-.5-7-2.4-9.8c-1.1-1.6-3.5-4.1-3.5-4.1s19.2 1.9 13 14.9" fill="#423223">
                    
                    </path>
                    
                    <path d="M50.1 3.9c4.8 3 15.2 1.8 9.1 14.8c-3.2 6.9-4 7.2-7.1-1c-1.6-4.4-.5-7-2.4-9.8c-1.1-1.6-4.4-3.7-4.4-3.7s1.4-2.4 4.8-.3" fill="#947151">
                    
                    </path>
                    
                    <path d="M21.2 19.2c3 0 5.4 2.3 5.4 5.2s-2.4 5.2-5.4 5.2c-3 0-5.4-2.3-5.4-5.2s2.5-5.2 5.4-5.2" fill="#ffffff">
                    
                    </path>
                    
                    <ellipse cx="19.9" cy="24.4" rx="4" ry="3.9" fill="#3e4347">
                    
                    </ellipse>
                    
                    <path d="M52.2 24.4c0 2.9-2.4 5.2-5.4 5.2c-3 0-5.4-2.3-5.4-5.2s2.4-5.2 5.4-5.2c3 0 5.4 2.3 5.4 5.2" fill="#ffffff">
                    
                    </path>
                    
                    <ellipse cx="48.2" cy="24.4" rx="4" ry="3.9" fill="#3e4347">
                    
                    </ellipse>
                    
                    <path d="M24.8 40.1l4.2 4.2c2.5 2.5 7.7 2.5 10.2 0l4.2-4.2l-4.4-4.3h-9.9l-4.3 4.3" fill="#7d644b">
                    
                    </path>
                    
                    <path d="M34 32.1s-4.4 6.1-3.8 9c.7 4.2 7 4.2 7.7 0c.5-2.9-3.9-9-3.9-9" fill="#f15a61">
                    
                    </path>
                    
                    <path d="M34 42.7l1-5.9h-1.9l.9 5.9" fill="#ba454b">
                    
                    </path>
                    
                    <path fill="#423223" d="M29.5 33.8h9v4h-9z">
                    
                    </path>
                    
                    <path d="M48.3 34.7l-6.4-6.5c-3.9-3.9-11.8-3.9-15.6 0l-6.4 6.5c-1.8 1.8-1.8 4.8 0 6.7c1.8 1.8 4.8 1.8 6.6 0l6.4-6.5c.6-.6 1.8-.6 2.4 0l6.4 6.5c1.8 1.8 4.8 1.8 6.6 0c1.8-1.8 1.8-4.8 0-6.7" fill="#947151">
                    
                    </path>
                    
                    <g fill="#3e4347">
                    
                    <path d="M28.7 28.7c0-2.3 2.4-2.7 5.3-2.7s5.3.4 5.3 2.7c0 1.8-4.2 3.4-5.3 3.4c-1 0-5.3-1.6-5.3-3.4">
                    
                    </path>
                    
                    <path d="M27.1 30.7l-.9.9l.9.9l.9-.9z">
                    
                    </path>
                    
                    <path d="M25 33.1l-.9.9l.9.9l.9-.9z">
                    
                    </path>
                    
                    <path d="M27.8 34l-.9.9l.9.9l.9-.9z">
                    
                    </path>
                    
                    <path d="M41 30.7l.9.9l-.9.9l-.9-.9z">
                    
                    </path>
                    
                    <path d="M43.1 33.1l.9.9l-.9.9l-.9-.9z">
                    
                    </path>
                    
                    <path d="M40.3 34l.9.9l-.9.9l-.9-.9z">
                    
                    </path>
                    
                    </g>
                    
                    </svg>

            </div>
        </a>

        <a href="{{ route('pet.create', ['type' => 'cat']) }}">
            <div class="catType">
                <svg class="svg" width="800px" height="800px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--emojione" preserveAspectRatio="xMidYMid meet">

                    <g fill="#3e4347">
                    
                    <path d="M2.3 36.1c-.2-1-.3-2-.2-2.9c0-1.2.3-2.2.9-3.2c.6-1.1 1.6-2 2.7-2.5c1.1-.6 2.5-.8 3.8-.6c1.2.1 2.4.6 3.4 1.3c.9.6 1.7 1.4 2.4 2.3c1.1 1.5 1.9 3.3 2.3 5.4v.3c.2 1.3-.6 2.5-1.9 2.9c-.2.1-.4.1-.6.1c-.8.1-1.5-.1-2.1-.6c-.6-.5-1-1.1-1.1-1.9c-.2-1.4-.5-2.6-1.1-3.5c-.5-.9-1.3-1.6-2.1-1.8c-.3-.1-.7-.1-1 0c-.4.1-.7.4-.9.7c-.3.4-.5.8-.5 1.4c-.1.6-.1 1.2 0 1.8c.2 1.2.6 2.6 1.3 4c.3.6.7 1.3 1.1 2c.4.7.9 1.3 1.3 1.8c1.1 1.3 2.1 2.3 3.2 3.1c1.3.9 2.6 1.5 3.9 1.7c1.3.2 2.8.2 4.3-.3c1.2-.3 1.9.1 2.1.7c.2.5-.1 1.3-1.3 1.7h-.1c-1.8.6-3.7.8-5.4.5c-1.7-.2-3.5-1-5.2-2c-1.4-.9-2.6-2.1-3.9-3.5c-.5-.6-1-1.2-1.4-1.7L6 43c-.6-.7-1.1-1.4-1.5-2.1c-1.2-1.6-1.9-3.2-2.2-4.8">
                    
                    </path>
                    
                    <path d="M46.7 55.9c1.8 2.3 9.7 0 11-2.6c5.2-10.6 0-15.2 0-15.2l-11 1.5c0 .1-2.2 13.5 0 16.3">
                    
                    </path>
                    
                    <path d="M31.8 55.9c-1.8 2.3-9.7 0-11-2.6c-5.2-10.6 0-15.2 0-15.2l11 1.5c0 .1 2.3 13.5 0 16.3">
                    
                    </path>
                    
                    </g>
                    
                    <g fill="#ffffff">
                    
                    <path d="M34.5 55.2c-.1 1.1-2.6 1.7-5.6 1.4c-3-.3-5.3-1.3-5.3-2.4c.1-1.1 2.4.3 5.4.5c3.1.4 5.6-.5 5.5.5">
                    
                    </path>
                    
                    <path d="M44 55.2c.1 1.1 2.6 1.7 5.6 1.4c3-.3 5.3-1.3 5.3-2.4c-.1-1.1-2.4.3-5.4.5c-3.1.4-5.6-.5-5.5.5">
                    
                    </path>
                    
                    </g>
                    
                    <g fill="#4c5359">
                    
                    <path d="M39.2 60.4c2 2.2 8.9 2.1 11.1 0c3-3 2.9-16.7 3-23.3l-13-1.1c.1 0-3.6 21.5-1.1 24.4">
                    
                    </path>
                    
                    <path d="M39.3 60.4c-2 2.2-8.9 2.1-11.1 0c-3-3-2.9-16.7-3-23.3l13-1.1s3.6 21.5 1.1 24.4">
                    
                    </path>
                    
                    </g>
                    
                    <path fill="#ffffff" d="M34 43.7l5.3 11.2l5.3-11.2z">
                    
                    </path>
                    
                    <path d="M59.9 2.2C57.5.8 45.1 7.3 42.6 11.7l17.9 10.6c2.4-4.3 1.7-18.8-.6-20.1" fill="#4c5359">
                    
                    </path>
                    
                    <path d="M56.2 8.8c-.9-.5-8.2 2.8-9.6 5.2l10 5.9c1.3-2.3.4-10.6-.4-11.1" fill="#f7a4a4">
                    
                    </path>
                    
                    <path d="M18.7 2.2c-2.4 1.4-3.1 15.7-.6 20.1L36 11.7C33.6 7.4 21 .8 18.7 2.2z" fill="#4c5359">
                    
                    </path>
                    
                    <path d="M22.5 8.8c-.9.5-1.8 8.7-.4 11.1L32 14c-1.3-2.3-8.7-5.7-9.5-5.2" fill="#f7a4a4">
                    
                    </path>
                    
                    <path d="M39.3 9.4C18.5 9.4 16.5 24 16.5 32.1c0 3.4 10.2 13.9 22.7 13.9C51.8 46 62 35.5 62 32.1C62 24 60 9.4 39.3 9.4" fill="#4c5359">
                    
                    </path>
                    
                    <path d="M33.5 28.5s-2.4 3.6-6.8 2.5s-4.6-5.4-4.6-5.4s2.4-3.6 6.8-2.5c4.4 1.2 4.6 5.4 4.6 5.4" fill="#bfffab">
                    
                    </path>
                    
                    <path d="M33 26.7S30.9 29 28 29c-3.1 0-5-4.4-5-4.4s2.1-2.4 5.8-1.4c3.5.8 4.2 3.5 4.2 3.5" fill="#93e67f">
                    
                    </path>
                    
                    <path d="M29.8 26.6c0 4.9-2.4 4.9-2.4 0s2.4-4.9 2.4 0" fill="#4c5359">
                    
                    </path>
                    
                    <path d="M45.1 28.5s2.4 3.6 6.8 2.5s4.6-5.4 4.6-5.4s-2.4-3.6-6.8-2.5c-4.4 1.2-4.6 5.4-4.6 5.4" fill="#bfffab">
                    
                    </path>
                    
                    <path d="M45.5 26.7s2.1 2.3 5 2.3c3.1 0 5-4.4 5-4.4s-2.1-2.4-5.8-1.4c-3.5.8-4.2 3.5-4.2 3.5" fill="#93e67f">
                    
                    </path>
                    
                    <path d="M48.7 26.6c0 4.9 2.4 4.9 2.4 0c.1-4.9-2.4-4.9-2.4 0" fill="#4c5359">
                    
                    </path>
                    
                    <path d="M45.9 32.5c-2-1.5-4.2-6.5-6.6-6.5s-4.7 5-6.6 6.5c-3.1 2.4-11.5 5.1-11.5 5.1s8.9 7.6 18.1 7.6c9.2 0 18.1-7.6 18.1-7.6s-8.4-2.7-11.5-5.1" fill="#ffffff">
                    
                    </path>
                    
                    <g fill="#4c5359">
                    
                    <path d="M45.7 39.3c-.7.4-1.6.6-2.4.6c-.8-.1-1.6-.3-2.2-.8c-.6-.5-1.1-1.2-1.2-1.9l-.6-3.3l-.6 3.3c-.1.8-.6 1.4-1.2 1.9s-1.4.8-2.2.8c-.9 0-1.7-.1-2.4-.6c-.7-.4-1.4-1.1-1.7-2c0 1 .6 1.9 1.3 2.5c.7.6 1.8 1 2.7 1.1c1 .1 2-.2 2.9-.8c.5-.3.8-.7 1.2-1.2c.3.5.7.9 1.2 1.2c.9.6 1.9.9 2.9.8c1 0 2-.4 2.7-1.1c.8-.6 1.3-1.6 1.3-2.5c-.3.9-.9 1.6-1.7 2">
                    
                    </path>
                    
                    <path d="M42.4 33.1c-.6-.7-2.5-.8-3.1-.8c-.6 0-2.5.1-3.1.8c-.4.5-.1 1.8 1.1 3c.7.7 1.4.9 2 .9c.6 0 1.3-.2 2-.9c1.2-1.2 1.5-2.5 1.1-3">
                    
                    </path>
                    
                    </g>
                    
                    <g fill="#ffffff">
                    
                    <path d="M39 59.6c0 1.1-2.3 1.9-5.2 1.9c-2.9 0-5.2-.9-5.2-1.9c0-1.1 2.3.1 5.2.1c2.8 0 5.2-1.1 5.2-.1">
                    
                    </path>
                    
                    <path d="M49.9 59.6c0 1.1-2.3 1.9-5.2 1.9c-2.9 0-5.2-.9-5.2-1.9c0-1.1 2.3.1 5.2.1c2.9 0 5.2-1.1 5.2-.1">
                    
                    </path>
                    
                    </g>
                    
                    <g fill="#3e4347">
                    
                    <path d="M29.6 61.2l1.4-2.4l-.4 2.8z">
                    
                    </path>
                    
                    <path d="M33.1 62l.5-3.3l.5 3.3z">
                    
                    </path>
                    
                    <path d="M37 61.6l-.4-2.6l1.4 2.3z">
                    
                    </path>
                    
                    <path d="M48 61.6l-.4-2.8l1.4 2.4z">
                    
                    </path>
                    
                    <path d="M44.4 62l.5-3.3l.5 3.3z">
                    
                    </path>
                    
                    <path d="M40.5 61.3l1.4-2.3l-.4 2.6z">
                    
                    </path>
                    
                    </g>
                    
                    </svg>
            </div>
        </a>

    </div>
 --}}
