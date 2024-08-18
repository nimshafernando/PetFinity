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
            color: #ff6600;
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
            background-color: #ff6600;
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

            .form-group {
                width: 100%;
                padding: 10px 0;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .form-group {
                padding: 10px;
            }

            .form-group label,
            .form-group input,
            .form-group select {
                width: 100%;
                text-align: left;
            }

            .profile {
                right: 20px;
            }
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
            <li>
                {{-- <a href="{{ route('pet-boardingcenter.dashboard')}}"> --}}
                <i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
            <li>
                {{-- <a href="{{ route('pet-boardingcenter.pendingbookings') }}"> --}}
                    <i class="fas fa-clock"></i> Pending Requests</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.upcoming') }}"> --}}
                    <i class="fas fa-calendar-check"></i> My Schedule</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.pet-profiles') }}"> --}}
                <i class="fas fa-dog"></i> Pets</a></li>

            <li>
                {{-- <a href="{{ route('boarding-center.appointment-history') }}"> --}}
                <i class="fas fa-history"></i> Appointment History</a></li>

            <li><a href="{{ route('boarding-center.profile')}}">
                <i class="fas fa-user-circle"></i> Profile</a></li>
            
        </ul>
    </div>

    <div class="content">
        <div class="container">
            <form action="{{ route('training-center-profile.update') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" />
                    @error('password')
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
                    <label for="training_specialization">Training Specialization</label>
                    <input id="training_specialization" type="text" name="training_specialization" value="{{ old('training_specialization', $user->training_specialization) }}" required />
                    @error('training_specialization')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="preferred_environment">Preferred Environment</label>
                    <input id="preferred_environment" type="text" name="preferred_environment" value="{{ old('preferred_environment', $user->preferred_environment) }}" required />
                    @error('preferred_environment')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="types_of_pets_trained">Types of Pets Trained</label>
                    @php
                    $types_of_pets_trained = explode(', ', $user->types_of_pets_trained);
                    @endphp
                    @foreach (['dogs', 'cats', 'birds', 'reptiles'] as $pet)
                    <label>
                        <input type="checkbox" name="types_of_pets_trained[]" value="{{ $pet }}" {{ in_array($pet, old('types_of_pets_trained', $types_of_pets_trained)) ? 'checked' : '' }}>
                        {{ ucfirst($pet) }}
                    </label>
                    @endforeach
                    @error('types_of_pets_trained')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                {{-- <div class="form-group">
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
                </div> --}}

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
                    <label for="profile_picture">Profile Picture</label>
                    <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
                    @error('profile_picture')
                    <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit">Update</button>
                    <button type="button" onclick="window.location='{{ route('pet-trainingcenter.dashboard') }}'">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <div class="navbar">
        <ul>
            <li><a href="{{ route('pet-trainingcenter.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="{{ route('pet-trainingcenter.dashboard') }}"><i class="fas fa-clock"></i> Pending Requests</a></li>
            <li><a href="{{ route('pet-trainingcenter.dashboard') }}"><i class="fas fa-calendar-check"></i> My Schedule</a></li>
            <li><a href="{{ route('pet-trainingcenter.dashboard') }}"><i class="fas fa-dog"></i> Pets</a></li>
            <li><a href="{{ route('pet-trainingcenter.dashboard') }}"><i class="fas fa-history"></i> Appointment History</a></li>
            <li><a href="{{ route('training-center.profile') }}"><i class="fas fa-user-circle"></i> Profile</a></li>
        </ul>
    </div>
</body>

</html>
