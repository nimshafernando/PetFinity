<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        body {
            background-color: white;
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #fff;
            padding: 10px 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }

        .top-navbar .logo {
            font-family: 'Fredoka One', cursive;
            font-size: 32px;
            color: #035a2e;
            margin-left: 20px;
        }

        .top-navbar .profile {
            display: flex;
            align-items: center;
            color: #333;
            cursor: pointer;
            font-size: 18px;
            margin-right: 50px;
            font-weight: bold;
        }

        .top-navbar .profile i {
            margin-left: 10px;
            font-size: 24px;
        }

        .sidebar {
            background-color: #fff;
            width: 250px;
            height: calc(100vh - 60px);
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            z-index: 10;
            transition: all 0.3s ease-in-out;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            overflow-y: auto;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            cursor: pointer;
            transition: background 0.3s ease-in-out, color 0.3s ease-in-out;
            border-radius: 8px;
            margin: 0 10px;
            font-weight: bold;
        }

        .sidebar ul li:hover {
            background-color: #0d8c0b;
            color: #fff;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a i {
            margin-right: 10px;
            font-size: 20px;
        }

        .content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 20px;
            flex-grow: 1;
            overflow-y: auto;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #249EA0;
            border-radius: 10px;
            background-color: white;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-weight: bold;
            font-size: 28px;
        }

        .card {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            border-bottom: 2px solid #249EA0;
            padding: 20px 0;
            transition: transform 0.3s, box-shadow 0.3s;
            min-width: 280px;
        }

        .card:last-child {
            border-bottom: none;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body {
            flex: 1;
            text-align: left;
            padding: 10px 20px;
            min-width: 280px;
        }

        .card-title {
            font-weight: bold;
            font-size: 22px;
            color: #249EA0;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .card-text strong {
            display: inline-block;
            width: 150px;
            margin-bottom: 10px;
        }

        .icon {
            font-size: 20px;
            margin-right: 10px;
            color: #249EA0;
        }

        .no-appointments {
            text-align: center;
            font-size: 18px;
            color: #777;
            padding: 20px;
            background-color: #e0f7f7;
            border: 1px solid #b3e5e5;
            border-radius: 10px;
        }

        .navbar {
            display: none;
            background-color: #fff;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            bottom: 0;
            width: 100%;
            z-index: 10;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
            margin: 0;
        }

        .navbar ul li {
            padding: 10px;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: color 0.3s ease-in-out;
        }

        .navbar ul li a:hover {
            color: #ff6600;
        }

        .navbar ul li a i {
            margin-bottom: 5px;
            font-size: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }

            .content {
                margin-left: 0;
                margin-top: 60px;
                width: 100%;
                padding: 0 10px;
            }

            .navbar {
                display: flex;
                justify-content: center;
            }

            .container {
                width: 100%;
                padding: 10px;
                border: none;
            }

            .card {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }

            .card-body {
                width: 100%;
                padding: 10px 0;
            }

            .card-title,
            .card-text {
                width: 100%;
                text-align: left;
            }

            .profile {
                right: 20px
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .card {
                padding: 10px;
            }

            .card-title {
                padding: 10px;
                min-width: auto;
                font-size: 20px;
            }

            .card div {
                margin: 5px 0;
            }

            .icon {
                font-size: 18px;
            }

            .profile {
                right: 20px
            }
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            color: #333;
        }

        .form-group input[type="checkbox"] {
            width: auto;
        }

        .form-group .error {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .form-group button {
            background: #28a745;
            color: #fff;
            border: none;
            padding: 15px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group button:hover {
            background: #218838;
        }

        .checkbox-group label {
            display: inline-block;
            margin-right: 10px;
        }

        .section {
            margin-bottom: 40px;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    <div class="top-navbar">
        <div class="logo">Petfinity</div>
        <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
            <li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
            <li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>
            
            
        </ul>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <h2>Basic Details</h2>
                <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input id="business_name" type="text" name="business_name" value="{{ old('business_name', $user->business_name) }}" required />
                    @error('business_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Business Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required />
                    @error('email')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input id="phone_number" type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required />
                    @error('phone_number')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input id="city" type="text" name="city" value="{{ old('city', $user->city) }}" required />
                    @error('city')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="street_name">Street Name</label>
                    <input id="street_name" type="text" name="street_name" value="{{ old('street_name', $user->street_name) }}" required />
                    @error('street_name')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input id="postal_code" type="text" name="postal_code" value="{{ old('postal_code', $user->postal_code) }}" required />
                    @error('postal_code')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <h2>About the Business</h2>
                <div class="form-group">
                    <label for="animal_types">Type of Animals Boarded</label>
                    @php
                    $animal_types = explode(', ', $user->animal_types);
                    @endphp
                    @foreach (['dogs', 'cats', 'birds', 'reptiles'] as $animal)
                    <label>
                        <input type="checkbox" name="animal_types[]" value="{{ $animal }}" {{ in_array($animal, old('animal_types', $animal_types)) ? 'checked' : '' }}>
                        {{ ucfirst($animal) }}
                    </label>
                    @endforeach
                    @error('animal_types')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_operating_hour">Start Operating Hour</label>
                    <select name="start_operating_hour" id="start_operating_hour" required>
                        <option value="" disabled>Select Start Operating Hour</option>
                        @for ($i = 6; $i < 23; $i++)
                        @php $time = date('g A', strtotime("$i:00")); @endphp
                        <option value="{{ $time }}" {{ old('start_operating_hour', explode('-', $user->operating_hours)[0]) == $time ? 'selected' : '' }}>{{ $time }}</option>
                        @endfor
                    </select>
                    @error('start_operating_hour')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end_operating_hour">End Operating Hour</label>
                    <select name="end_operating_hour" id="end_operating_hour" required>
                        <option value="" disabled>Select End Operating Hour</option>
                        @for ($i = 6; $i < 23; $i++)
                        @php $time = date('g A', strtotime("$i:00")); @endphp
                        <option value="{{ $time }}" {{ old('end_operating_hour', explode('-', $user->operating_hours)[1]) == $time ? 'selected' : '' }}>{{ $time }}</option>
                        @endfor
                    </select>
                    @error('end_operating_hour')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="special_amenities">Special Amenities</label>
                    <input id="special_amenities" type="text" name="special_amenities" value="{{ old('special_amenities', $user->special_amenities) }}" />
                    @error('special_amenities')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="socialmedia_links">Social Media Links</label>
                    <input id="socialmedia_links" type="text" name="socialmedia_links" value="{{ old('socialmedia_links', $user->socialmedia_links) }}" />
                    @error('socialmedia_links')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="photos">Upload Photos</label>
                    <input type="file" id="photos" name="photos[]" accept="image/*" multiple>
                    @error('photos')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="joining_goals">What do you hope to achieve by joining?</label>
                    <select name="joining_goals" id="joining_goals" required>
                        <option value="" disabled>Select an option</option>
                        <option value="increase_customer_base" {{ old('joining_goals', $user->joining_goals) == 'increase_customer_base' ? 'selected' : '' }}>Increase Customer Base</option>
                        <option value="offer_new_services" {{ old('joining_goals', $user->joining_goals) == 'offer_new_services' ? 'selected' : '' }}>Offer New Services</option>
                        <option value="improve_brand_recognition" {{ old('joining_goals', $user->joining_goals) == 'improve_brand_recognition' ? 'selected' : '' }}>Improve Brand Recognition</option>
                    </select>
                    @error('joining_goals')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                    @error('profile_picture')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit">Update</button>
                    <button type="button" onclick="window.location='{{ route('boarding-center.profile') }}'">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('pet-boardingcenter.dashboard')}}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
<li><a href="{{ route('pet-boardingcenter.pendingbookings') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
<li><a href="{{ route('boarding-center.upcoming') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
<li><a href="{{ route('boarding-center.pet-profiles') }}"><i class="fas fa-dog"></i> Pets</a></li>
<li><a href="{{ route('boarding-center.appointment-history') }}"><i class="fas fa-history"></i> Appointment History</a></li>


        </ul>
    </div>
</body>

</html>
