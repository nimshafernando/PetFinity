<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petfinity - Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Montserrat:wght@400;700&display=swap">
    <style>
        body {
            margin: 0;
            font-family: 'Montserrat', sans-serif;
            background-color: #e1e1e1;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 99%;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1000;
            font-size: 18px;
            transition: top 0.3s;
        }

        .navbar.hidden {
            top: -100px;
        }

        .navbar .logo {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
        }

        .navbar .logo img {
            height: 60px;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            align-items: center;
            margin: 0;
            padding: 0;
            flex: 1;
            justify-content: flex-start;
        }

        .navbar ul li {
            position: relative;
            margin: 0 20px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #ffffff;
            padding: 15px;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a .icon {
            margin-right: 8px;
            font-size: 20px;
        }

        .navbar ul li .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0px;
            width: 200px;
            padding: 20px;
            border-radius: 7px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: opacity 0.3s ease, transform 0.3s ease;
            z-index: 1000;
        }

        .navbar ul li:hover .dropdown {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            transition: transform 0.3s;
            text-align: left;
        }

        .dropdown-item img {
            height: 50px;
            margin-right: 15px;
        }

        .dropdown-item span {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }

        .dropdown-item p {
            font-size: 14px;
            color: #666;
            margin: 0;
        }

        .dropdown-item:hover {
            transform: translateX(10px);
        }

        .auth-buttons {
            flex: 1;
            display: flex;
            justify-content: flex-end;
        }

        .auth-buttons a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            margin-left: 20px;
            border: 1px solid #ff6600;
            border-radius: 20px;
            background: #ff6600;
            transition: background 0.3s, color 0.3s;
        }

        .auth-buttons a:hover {
            background: #ffffff;
            color: #ff6600;
        }

        .menu-icon {
            display: none;
            font-size: 30px;
            cursor: pointer;
            color: #e65c00;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: -250px;
            background: rgba(0, 0, 0, 0.9);
            padding-top: 60px;
            transition: 0.3s;
            z-index: 2000;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
        }

        .sidebar a, .sidebar .dropdown-btn {
            text-decoration: none;
            font-size: 20px;
            color: #ffffff;
            display: block;
            padding: 15px;
            transition: 0.3s;
            border: 1px solid transparent;
            text-align: center;
            width: 100%;
            box-sizing: border-box;
        }

        .sidebar a:hover, .sidebar .dropdown-btn:hover {
            color: #ff6600;
            border: 1px solid #ff6600;
            background: rgba(255, 102, 0, 0.1);
            border-radius: 20px;
        }

        .sidebar .dropdown {
            display: none;
            flex-direction: column;
            width: 100%;
        }

        .sidebar .dropdown a {
            font-size: 18px;
            padding-left: 30px;
        }

        .sidebar .dropdown-btn {
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (min-width: 1024px) and (max-width: 1366px) {
            .navbar ul li {
                margin: 0 15px;
            }

            .navbar ul li a {
                padding: 12px;
                font-size: 17px;
            }

            .auth-buttons a {
                padding: 9px 18px;
                font-size: 15px;
            }

            .navbar .logo img {
                height: 50px;
            }
        }

        @media (max-width: 1024px) {
            .navbar ul li {
                margin: 0 10px;
            }

            .navbar ul li a {
                padding: 10px;
                font-size: 16px;
            }

            .auth-buttons a {
                padding: 8px 16px;
                font-size: 14px;
            }

            .navbar .logo img {
                height: 50px;
            }

            .menu-icon {
                display: block;
            }

            .navbar ul, .auth-buttons {
                display: none;
            }

            .navbar .logo {
                position: relative;
                left: 0;
                transform: none;
            }

            .sidebar {
                left: -250px;
            }

            .navbar.active + .sidebar {
                left: 0;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                justify-content: space-between;
            }

            .menu-icon {
                display: block;
            }

            .navbar ul, .auth-buttons {
                display: none;
            }

            .navbar .logo {
                position: relative;
                left: 0;
                transform: none;
            }
        }

        @media (max-width: 480px) {
            .navbar {
                padding: 10px 20px;
            }

            .navbar ul li {
                margin: 0 5px;
            }

            .navbar ul li a {
                padding: 5px;
                font-size: 14px;
            }

            .auth-buttons a {
                padding: 5px 10px;
                font-size: 12px;
            }

            .navbar .logo img {
                height: 40px;
            }
        }

        .hero {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            text-align: center;
            color: #fff;
            overflow: hidden;
            padding-top: 120px; /* Offset for fixed navbar */
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.5);
        }

        .hero-text {
            position: relative;
            z-index: 2;
            max-width: 1000px;
            top: -30px;
            animation: fadeInUp 1s ease-out;
        }

        .hero-text h1 {
            font-family: 'Fredoka One', cursive;
            font-size: 85px;
            margin-bottom: 20px;
        }

        .hero-text p {
            font-size: 29px;
            margin-bottom: 30px;
        }

        .hero-text .cta {
            background-color: #ff6a00;
            color: #fff;
            padding: 15px 30px;
            text-decoration: none;
            font-size: 18px;
            border-radius: 25px;
            transition: background-color 0.3s ease;
        }

        .hero-text .cta:hover {
            background-color: #7e3300;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .icon-bar {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 20px;
            z-index: 2;
        }

        .icon-bar a {
            color: #ff6a00;
            font-size: 30px;
            transition: transform 0.3s ease;
        }

        .icon-bar a:hover {
            transform: scale(1.2);
        }

        @media (max-width: 1024px) {
            .hero-text h1 {
                font-size: 70px;
            }

            .hero-text p {
                font-size: 24px;
            }

            .hero-text .cta {
                padding: 12px 24px;
                font-size: 16px;
            }

            .icon-bar a {
                font-size: 25px;
            }
        }

        @media (max-width: 768px) {
            .hero-text h1 {
                font-size: 55px;
            }

            .hero-text p {
                font-size: 20px;
            }

            .hero-text .cta {
                padding: 10px 20px;
                font-size: 14px;
            }

            .icon-bar a {
                font-size: 20px;
            }
        }

        @media (max-width: 480px) {
            .hero-text h1 {
                font-size: 89px;
            }

            .hero-text p {
                font-size: 36px;
            }

            .hero-text .cta {
                padding: 8px 16px;
                font-size: 22px;
            }

            .icon-bar a {
                font-size: 38px;
            }
        }

        .why-section {
            background: linear-gradient(to right, #ff6a00, #ffb900);
            padding: 50px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideIn 1s ease-in-out;
        }

        .why-section::before, .why-section::after {
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

        .why-section::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .why-section h2 {
            font-family: 'Fredoka One', cursive;
            font-size: 36px;
            margin-bottom: 40px;
            color: #ffffff;
            position: relative;
            z-index: 2;
        }

        .why-section .content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .why-section .card {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 250px;
            transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
        }

        .why-section .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #281000;
            color: #fff;
        }

        .why-section .card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .why-section .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .why-section .card p {
            font-size: 16px;
        }

    

        @keyframes slideIn {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .trust-section {
            background-color: #f0f4f8;
            position: relative;
            text-align: center;
            padding: 50px 20px;
            overflow: hidden;
        }

        .trust-section::before {
            content: '';
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: #fff;
            clip-path: polygon(0 0, 100% 0, 100% 70%, 0 100%);
            z-index: 1;
        }

        .trust-section .wave {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            background: #f0f4f8;
            clip-path: polygon(0 100%, 100% 0, 100% 100%, 0 100%);
            z-index: 0;
        }

        .trust-section h2 {
            font-family: 'Fredoka One', cursive;
            font-size: 36px;
            margin-bottom: 40px;
            position: relative;
            z-index: 2;
        }

        .trust-section .cards {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            position: relative;
            z-index: 2;
        }

        .trust-section .card {
            background: #fbbea2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            flex: 1 1 calc(33.333% - 40px);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .trust-section .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .trust-section .card img {
            width: 100%;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        .trust-section .card h3 {
            font-size: 18px;
            font-weight: bold;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .trust-section .card p {
            font-size: 16px;
            color: #666;
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 1024px) {
            .trust-section h2 {
                font-size: 32px;
            }

            .trust-section .card {
                flex: 1 1 calc(50% - 40px);
            }
        }

        @media (max-width: 768px) {
            .trust-section h2 {
                font-size: 28px;
            }

            .trust-section .card {
                flex: 1 1 calc(100% - 40px);
            }
        }

        @media (max-width: 480px) {
            .trust-section h2 {
                font-size: 24px;
            }

            .trust-section .card {
                padding: 15px;
            }
        }

        .feeding-section {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            background: linear-gradient(to right, #ff6a00, #ffb900);
            border-radius: 10px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .feeding-section::before, .feeding-section::after {
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

        .feeding-section::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .video-container {
            max-width: 600px;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .feeding-video {
            width: 100%;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .video-title {
            margin-top: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #ffffff;
        }

        .video-message {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
        }

        .donate-section {
            background: #ffffff;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
            animation: slideIn 1s ease-in-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .donate-section .content {
            position: relative;
            z-index: 2;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .donate-section .content img {
            width: 100%;
            max-width: 400px;
            border-radius: 20px;
            color: #000000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .donate-section .content img:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .donate-section .text {
            max-width: 600px;
            animation: fadeIn 1.5s ease-in-out;
            color: #000000;

        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .donate-section h2 {
            font-size: 36px;
            margin-bottom: 20px;
            animation: bounceIn 2s ease;
        }

        @keyframes bounceIn {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        .donate-section p {
            font-size: 18px;
            margin-bottom: 30px;
        }

        .donate-btn {
            background: #fff;
            color: #ff6a00;
            padding: 15px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 18px;
            animation: glow 1.5s infinite;
        }

        @keyframes glow {
            0% {
                box-shadow: 0 0 5px #fff;
            }
            50% {
                box-shadow: 0 0 20px #fff, 0 0 30px #ff6a00, 0 0 40px #ff6a00, 0 0 50px #ff6a00;
            }
            100% {
                box-shadow: 0 0 5px #fff;
            }
        }

        .donate-btn:hover {
            background: #ff6a00;
            color: #fff;
        }

        @media (max-width: 768px) {
            .donate-section .content {
                flex-direction: column;
                text-align: center;
            }

            .donate-section .content img {
                max-width: 300px;
            }

            .donate-section .text {
                max-width: 100%;
            }

            .donate-section h2 {
                font-size: 28px;
            }

            .donate-section p {
                font-size: 16px;
            }

            .donate-btn {
                font-size: 16px;
                padding: 12px 24px;
            }
        }

        .resource-section {
            text-align: center;
            padding: 50px 20px;
            background-color: #ff6a00;
            color: #fff;
            position: relative;
        }

        .resource-section h2 {
            font-size: 36px;
            margin-bottom: 30px;
        }

        .resource-section .content {
            display: flex;
            overflow: hidden;
            scroll-behavior: smooth;
            gap: 20px;
            padding: 0 20px;
        }

        .resource-section .card {
            background: #fff;
            color: #333;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
            flex-shrink: 0;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .resource-section .card img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .resource-section .card h3 {
            font-size: 24px;
            margin: 15px 0;
        }

        .resource-section .card p {
            padding: 0 15px;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .resource-section .card a {
            display: block;
            margin: 0 15px 15px;
            padding: 10px;
            background: #ff6a00;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .resource-section .card a:hover {
            background: #e65c00;
        }

        .resource-section .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .arrow {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 30px;
            color: #ff6a00;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            border-radius: 50%;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            z-index: 1;
        }

        .arrow:hover {
            background: rgba(255, 255, 255, 1);
            transform: scale(1.1);
        }

        .arrow.left {
            left: 10px;
        }

        .arrow.right {
            right: 10px;
        }

        @media (max-width: 768px) {
            .resource-section h2 {
                font-size: 28px;
            }

            .resource-section .card {
                width: 250px;
            }

            .resource-section .card h3 {
                font-size: 20px;
            }

            .resource-section .card p {
                font-size: 14px;
            }

            .resource-section .card a {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .resource-section h2 {
                font-size: 24px;
            }

            .resource-section .card {
                width: 200px;
            }

            .resource-section .card h3 {
                font-size: 18px;
            }

            .resource-section .card p {
                font-size: 12px;
            }

            .resource-section .card a {
                font-size: 12px;
            }
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }

        .footer {
            background: linear-gradient(to right, #ff6a00, #ffb900);
            padding: 50px 20px;
            color: #000000;
            position: relative;
            overflow: hidden;
        }

        .footer::before, .footer::after {
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

        .footer::after {
            background: rgba(255, 255, 255, 0.2);
            animation-duration: 60s;
        }

        .footer .content {
            position: relative;
            z-index: 1;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .footer .logo img {
            height: 80px;
        }

        .footer .social-icons a {
            color: #fff;
            margin: 0 10px;
            font-size: 24px;
            transition: transform 0.3s;
        }

        .footer .social-icons a:hover {
            transform: scale(1.2);
        }

        .footer .footer-info {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            width: 100%;
        }

        .footer .footer-column {
            flex: 1;
            min-width: 250px;
        }

        .footer .footer-column h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .footer .footer-column p, .footer .footer-column ul {
            font-size: 16px;
            line-height: 1.6;
        }

        .footer .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer .footer-column ul li {
            margin-bottom: 10px;
        }

        .footer .footer-column ul li a {
            color: #0a0a0a;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer .footer-column ul li a:hover {
            color: #333;
        }

        .footer .search-bar {
            display: flex;
            margin-top: 20px;
        }

        .footer .search-bar input {
            padding: 10px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
            flex: 1;
        }

        .footer .search-bar button {
            padding: 10px 20px;
            border: none;
            border-radius: 0 5px 5px 0;
            background: #333;
            color: #fff;
            cursor: pointer;
            transition: background 0.3s;
        }

        .footer .search-bar button:hover {
            background: #ef0000;
        }

        .footer .copyright {
            margin-top: 20px;
            text-align: center;
            width: 100%;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .footer .content {
                flex-direction: column;
                align-items: left;
            }

            .footer .footer-info {
                flex-direction: column;
                align-items: left;
            }

            .footer .footer-column {
                max-width: 400px;
            }
        }
    </style>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

    <nav class="navbar" id="navbar">
        <span class="menu-icon" onclick="openSidebar()">&#9776;</span>
        <div class="logo">
            <img src="images/logoo.png" alt="Petfinity Logo"> 
        </div>
        <ul>
            <li><a href="/"><i class="fas fa-home icon"></i>Home</a></li>
            <li>
                <a href="#"><i class="fas fa-paw icon"></i>Services</a>
                <div class="dropdown">
                    <a class="dropdown-item" href="training">
                        <img src="images/pettrain.png" alt="Training">
                        <div>
                            <span>Training</span>
                            <p>Find and connect with pet trainers.</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="Boarding">
                        <img src="images/boarding.png" alt="Boarding">
                        <div>
                            <span>Boarding</span>
                            <p>Professional boarders for your pet.</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="lostandfound">
                        <img src="images/report.png" alt="Lost and Found">
                        <div>
                            <span>Report missing pets</span>
                            <p>Find and report lost pets.</p>
                        </div>
                    </a>
                </div>
            </li>
            <li><a href="features"><i class="fas fa-star icon"></i>Features</a></li>
        </ul>
        <div class="auth-buttons">
            <a href="{{ route('login')}}">Login</a>
            <a href="{{ route('select-role')}}">Register</a>
        </div>
    </nav>
    
    <div id="sidebar" class="sidebar">
        <a href="javascript:void(0)" class="close-btn" onclick="closeSidebar()">&times;</a>
        <a href="/">Home</a>
        <div class="dropdown-btn" onclick="toggleSidebarDropdown('sidebarServicesDropdown')">Services <i class="fa fa-caret-down"></i></div>
        <div class="dropdown" id="sidebarServicesDropdown">
            <a href="training">Training</a>
            <a href="Boarding">Boarding</a>
            <a href="lostandfound">Report Missing Pets</a>
        </div>
        <a href="features">Features</a>
        <a href="{{ route('login')}}">Login</a>
        <a href="{{ route('select-role')}}">Register</a>
    </div>
    

<div class="hero">
    <video autoplay muted loop>
        <source src="images/hero.mp4" type="video/mp4">
    </video>
    <div class="hero-text">
        <h1>Welcome to Petfinity</h1>
        <p>- For all your infinite pet care needs -</p>
        <a href="{{ route('select-role') }}" class="cta">Get Started</a>
    </div>
    <div class="icon-bar">
        <a href="#"><i class="fas fa-paw"></i></a>
        <a href="#"><i class="fas fa-bone"></i></a>
        <a href="#"><i class="fas fa-cat"></i></a>
    </div>
</div>

<div class="why-section">
    <h2>Why Petfinity?</h2>
    <div class="content">
        <div class="card">
            <img src="images/daycare.png" alt="Comprehensive Services">
            <h3>Comprehensive Services</h3>
            <p>Petfinity offers a wide range of services including boarding, training, and grooming to cater to all your pet care needs.</p>
        </div>
        <div class="card">
            <img src="images/pet-care (2).png" alt="Safety and Security">
            <h3>Safety and Security</h3>
            <p>We prioritize your pet's safety with verified caregivers, insured services, and 24/7 support for any emergencies.</p>
        </div>
        <div class="card">
            <img src="images/customer-service.png" alt="User-Friendly Platform">
            <h3>User-Friendly Platform</h3>
            <p>Our platform is designed for convenience with easy booking, GPS tracking, and real-time updates on your pet's status.</p>
        </div>
        <div class="card">
            <img src="images/ex.png" alt="Experienced Caregivers">
            <h3>Experienced Caregivers</h3>
            <p>With a network of experienced and dedicated caregivers, you can trust that your pet is in good hands.</p>
        </div>
    </div>
</div>

<div class="trust-section">
    <div class="wave"></div>
    <h2>Trust and Safety</h2>
    <div class="cards">
        <div class="card">
            <img src="images/pet-care (3).png" alt="Trust and Safety Image 1">
            <h3>Reliable Pet Care</h3>
            <p>Our caregivers are thoroughly vetted and insured to provide the best care for your pets.</p>
        </div>
        <div class="card">
            <img src="images/24-hours-support.png" alt="Trust and Safety Image 2">
            <h3>24/7 Support</h3>
            <p>We offer round-the-clock support to ensure your pet's safety and your peace of mind.</p>
        </div>
        <div class="card">
            <img src="images/trust.png" alt="Trust and Safety Image 3">
            <h3>Secure and Trusted</h3>
            <p>Our services are trusted by thousands of pet owners, ensuring secure and reliable care.</p>
        </div>
    </div>
</div>



<div class="donate-section">
    <div class="content">
        <img src="images/donate.jpg" alt="Donate Image">
        <div class="text">
            <h2>Help Us Feed Shelter Dogs</h2>
            <p>Your donation can make a difference. Help us provide meals and care for shelter dogs in need.</p>
            <a href="https://www.animalsos-sl.com/you-can-make-a-difference" class="donate-btn">Donate Now</a>
        </div>
    </div>
</div>

<div class="resource-section">
    <h2>Pet Resource Center</h2>
    <div class="content" id="resource-content">
        <div class="card">
            <img src="images/breath.jpg" alt="Pet Breathing">
            <h3>Pet Breathing</h3>
            <p>Find the best breathing techniques for your furry friends. From basic techniques to higher forms, we have it all.</p>
            <a href="https://vethospital.tamu.edu/hospital/wp-content/uploads/sites/15/2018/01/cardiology-home-breathing.pdf" target="_blank">Learn More</a>
        </div>
        <div class="card">
            <img src="images/HealthChecks_petshealthchecks.jpg" alt="Pet Health">
            <h3>Pet Health</h3>
            <p>Keep your pets healthy and happy with our expert advice on pet nutrition, exercise, and wellness.</p>
            <a href="https://www.avma.org/resources/pet-owners/petcare/7-things-you-can-do-keep-your-pet-healthy" target="_blank">Learn More</a>
        </div>
        <div class="card">
            <img src="images/petsafety.jpg" alt="Pet Safety">
            <h3>Pet Safety</h3>
            <p>Learn how to keep your pets safe at home and on the go with our comprehensive safety tips and guides.</p>
            <a href="https://www.humanesociety.org/pet-safety-tips" target="_blank">Learn More</a>
        </div>
        <div class="card">
            <img src="images/adopt.jpg" alt="Pet Adoption">
            <h3>Pet Adoption</h3>
            <p>Find your new best friend with our pet adoption resources. Discover tips on how to prepare for a new pet.</p>
            <a href="https://embarkpassion.com/" target="_blank">Learn More</a>
        </div>
        <div class="card">
            <img src="images/insurance.jpg" alt="Pet Insurance">
            <h3>Pet Insurance</h3>
            <p>Protect your pets with the best insurance plans. Learn about different policies and how they can benefit you.</p>
            <a href="https://www.fairfirst.lk/personal/pet-insurance/" target="_blank">Learn More</a>
        </div>
        <div class="card">
            <img src="images/pet travel.jpg" alt="Pet Travel">
            <h3>Pet Travel</h3>
            <p>Plan your trips with your pets in mind. Get tips on pet-friendly travel destinations and how to travel safely.</p>
            <a href="https://pettravelslanka-srilanka.com/" target="_blank">Learn More</a>
        </div>
    </div>
    <div class="arrow left" onclick="scrollContentLeft()">
        <i class="fas fa-chevron-left"></i>
    </div>
    <div class="arrow right" onclick="scrollContentRight()">
        <i class="fas fa-chevron-right"></i>
    </div>
</div>

<footer class="footer">
    <div class="content">
        <div class="logo">
            <img src="images/logoo.png" alt="Petfinity Logo">
        </div>
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="footer-info">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Petfinity is your trusted partner in pet care, offering a wide range of services to keep your pets happy and healthy.</p>
            </div>
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Email: support@petfinity.com</p>
                <p>Phone: (123) 456-7890</p>
                <p>Address: 123 Pet Street, Pet City, PC 12345</p>
            </div>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Search...">
            <button>Search</button>
        </div>
        <div class="copyright">
            <p>&copy; 2024 Petfinity. All rights reserved.</p>
        </div>
    </div>
</footer>

<script>
    function openSidebar() {
        document.getElementById("sidebar").style.left = "0";
    }

    function closeSidebar() {
        document.getElementById("sidebar").style.left = "-250px";
    }

    function toggleDropdown(event, dropdownId) {
        event.preventDefault();
        const dropdown = document.getElementById(dropdownId);
        const isActive = dropdown.parentElement.classList.contains('active');

        // Hide all other dropdowns
        document.querySelectorAll('.navbar ul li').forEach(li => {
            li.classList.remove('active');
        });

        // Toggle the clicked dropdown
        if (!isActive) {
            dropdown.parentElement.classList.add('active');
        }
    }

    function toggleSidebarDropdown(dropdownId) {
        const dropdown = document.getElementById(dropdownId);
        const isVisible = dropdown.style.display === 'block';

        // Hide all other dropdowns
        document.querySelectorAll('.sidebar .dropdown').forEach(dd => {
            dd.style.display = 'none';
        });

        // Toggle the clicked dropdown
        if (!isVisible) {
            dropdown.style.display = 'block';
        } else {
            dropdown.style.display = 'none';
        }
    }

    // Hide dropdowns when clicking outside
    document.addEventListener('DOMContentLoaded', function() {
        const feedingSection = document.querySelector('.feeding-section');
        const feedingVideo = document.querySelector('.feeding-video');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    feedingVideo.play();
                } else {
                    feedingVideo.pause();
                }
            });
        }, { threshold: 0.5 });

        observer.observe(feedingSection);
    });

    const content = document.getElementById('resource-content');
    let scrollAmount = 0;

    function scrollContentLeft() {
        const cardWidth = document.querySelector('.card').offsetWidth + 20; // Include the gap
        scrollAmount -= cardWidth;
        if (scrollAmount < 0) {
            scrollAmount = 0;
        }
        content.scrollTo({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }

    function scrollContentRight() {
        const cardWidth = document.querySelector('.card').offsetWidth + 20; // Include the gap
        const maxScroll = content.scrollWidth - content.clientWidth;
        scrollAmount += cardWidth;
        if (scrollAmount > maxScroll) {
            scrollAmount = maxScroll;
        }
        content.scrollTo({
            left: scrollAmount,
            behavior: 'smooth'
        });
    }
    // Navbar hide and show on scroll
    let lastScrollTop = 0;
    const navbar = document.getElementById('navbar');
    window.addEventListener('scroll', function() {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        if (scrollTop > lastScrollTop) {
            navbar.classList.add('hidden');
        } else {
            navbar.classList.remove('hidden');
        }
        lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    }, false);

    function scrollLeft() {
        const content = document.getElementById('resource-content');
        content.scrollBy({
            left: -300,
            behavior: 'smooth'
        });
    }

    function scrollRight() {
        const content = document.getElementById('resource-content');
        content.scrollBy({
            left: 300,
            behavior: 'smooth'
        });
    }
</script>

</body>
</html>
