<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.3.1/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/profile.css'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
    </style>
</head>
<body class="bg-gray-50">
    <x-sidebar-nav />

    <div class="min-h-screen container-main">
        <!-- Main Content -->
        <div class="content">
            <div class="mt-5 container-form">
                <form method="POST" enctype="multipart/form-data" action="{{ route('pet-owner.profile.update') }}" id="updateForm">
                    @csrf
                    @method('PUT')
                    <div class="section active" id="section1">
                        <h2>Update Profile</h2>
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input id="first_name" class="form-input" type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required autofocus autocomplete="first_name" />
                            @error('first_name') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input id="last_name" class="form-input" type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required autocomplete="last_name" />
                            @error('last_name') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input id="email" class="form-input" type="email" name="email" value="{{ old('email', $user->email) }}" required autocomplete="username" />
                            @error('email') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input id="phone_number" class="form-input" type="tel" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" required autocomplete="tel" />
                            @error('phone_number') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="pets_owned">Pets Owned</label>
                            <input id="pets_owned" class="form-input" type="number" name="pets_owned" value="{{ old('pets_owned', $user->pets_owned) }}" required />
                            @error('pets_owned') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="referral_source">Referral Source</label>
                            <div class="block w-full mt-1">
                                <label>
                                    <input type="radio" name="referral_source" value="friend" {{ old('referral_source', $user->referral_source) == 'friend' ? 'checked' : '' }}> Friend 
                                </label><br>
                                <label>
                                    <input type="radio" name="referral_source" value="onlinesearch" {{ old('referral_source', $user->referral_source) == 'onlinesearch' ? 'checked' : '' }}> Online Search
                                </label><br>
                                <label>
                                    <input type="radio" name="referral_source" value="socialmedia" {{ old('referral_source', $user->referral_source) == 'socialmedia' ? 'checked' : '' }}> Social Media
                                </label><br>
                                <label>
                                    <input type="radio" name="referral_source" value="advertisement" {{ old('referral_source', $user->referral_source) == 'advertisement' ? 'checked' : '' }}> Advertisement
                                </label><br>
                                <label>
                                    <input type="radio" name="referral_source" value="other" {{ old('referral_source', $user->referral_source) == 'other' ? 'checked' : '' }}> Other
                                </label><br>
                            </div>
                            @error('referral_source') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="flex justify-center form-group">
                            <button type="submit" class="btn btn-primary">Update Profile</button>
                        </div>
                    </div>

                    <div class="section" id="section2">
                        <h2>Change Password</h2>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" class="form-input" type="password" name="password" autocomplete="new-password" />
                            @error('password') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input id="password_confirmation" class="form-input" type="password" name="password_confirmation" autocomplete="new-password" />
                            @error('password_confirmation') <div class="error">{{ $message }}</div> @enderror
                        </div>
                        <div class="flex justify-center form-group">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

   
</body>
</html>
