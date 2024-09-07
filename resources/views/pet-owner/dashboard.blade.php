<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

body {
    background-color: #FFEBCC;
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
    background-color: rgba(255, 255, 255, 0.9);
    padding: 10px 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 10;
    backdrop-filter: blur(10px);
}

.top-navbar .logo {
    font-family: 'Fredoka One', cursive;
    font-size: 32px;
    color: #ff6600;
}

.top-navbar .profile {
    display: flex;
    align-items: center;
    color: #333;
    cursor: pointer;
    font-size: 18px;
    margin-left: auto;
    font-weight: bold;
}

.top-navbar .profile i {
    margin-left: 10px;
    font-size: 24px;
}

.sidebar {
    background-color: rgba(255, 255, 255, 0.95);
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
    backdrop-filter: blur(10px);
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

.main-content {
    margin-left: 250px;
    margin-top: 60px;
    padding: 20px;
    flex-grow: 1;
    overflow-y: auto;
    width: calc(100% - 250px);
    backdrop-filter: blur(10px);
}

.navbar {
    background: linear-gradient(to right, #ff6600, #ff9500);
    color: white;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px;
    margin-bottom: 30px;
}

.welcome-message {
    background: linear-gradient(to right, #ff6600, #ff9500);
    color: white;
    padding: 40px;
    border-radius: 8px;
    margin-top: 20px;
    font-size: 60px;
    font-family: 'Fredoka One', cursive;
    text-align: center;
    animation: fadeIn 1s ease-in-out;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    line-height: 1.2;
    overflow-wrap: break-word;
    margin-bottom: 30px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-20px);
    }

    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* My Pets Section */
.greeting-box {
    background-color: #fff;
    border-radius: 30px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    padding: 30px;
    text-align: center;
    margin-top: 20px;
    margin-bottom: 40px;
    width: 75%;
    max-width: 800px;
    margin-left: auto;
    margin-right: auto;
    animation: fadeIn 1.5s ease-in-out;
}

.greeting-box h3 {
    font-family: 'Fredoka One', cursive;
    font-size: 2rem;
    color: #ff6600;
    margin-bottom: 20px;
}

.pets-row {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
    margin-top: 20px;
}

.pet-item {
    text-align: center;
    width: 120px;
}

.pet-circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    border: 3px solid #ff6600;
    overflow: hidden;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.pet-circle img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease-in-out;
}

.pet-item:hover .pet-circle {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.pet-name {
    margin-top: 10px;
    font-family: 'Nunito', sans-serif;
    font-size: 1rem;
    color: #333;
}

.add-pet-circle {
    background-color: #ff6600;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50%;
    width: 100px;
    height: 100px;
}

.plus-icon {
    color: #fff;
    font-size: 2.5rem;
    font-weight: bold;
    line-height: 1;
}

.add-pet-circle:hover {
    background-color: #ff8500;
    transform: scale(1.05);
}

/* Lost and Found Section */
.lost-found-container {
    max-width: 1000px;
    margin: 40px auto;
    padding: 40px 20px;
    text-align: center;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
}

.lost-found-title {
    font-family: 'Fredoka One', cursive;
    font-size: 3rem;
    color: #ff6600;
    margin-bottom: 40px;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.lost-found-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    justify-content: center;
}

.lost-found-card {
    background-color: #ffe5b4;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.lost-found-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.lost-found-icon img {
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
}

.lost-found-card h3 {
    font-family: 'Fredoka One', cursive;
    font-size: 1.7rem;
    color: #ff6600;
    margin-bottom: 15px;
    transition: color 0.3s ease-in-out;
}

.lost-found-card:hover h3 {
    color: #ff8500;
}

.lost-found-card p {
    color: #555;
    font-size: 1rem;
    margin-bottom: 20px;
}

.btn {
    display: inline-block;
    padding: 12px 30px;
    background-color: #ff6600;
    color: #fff;
    text-transform: uppercase;
    font-weight: bold;
    border-radius: 25px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    text-decoration: none;
    font-size: 1rem;
}

.btn:hover {
    background-color: #ff8500;
    transform: scale(1.05);
}

/* Accepted Appointments Section */
.accepted-appointments-container {
    background-color: #fff;
    border-radius: 20px;
    padding: 30px;
    margin: 40px auto;
    max-width: 800px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    margin-bottom: 30px;
}

.section-title {
    font-family: 'Fredoka One', cursive;
    font-size: 2.5rem;
    color: #ff6600;
    text-align: center;
    margin-bottom: 20px;
}

.appointment-card {
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    background-color: #f9f9f9;
    margin-bottom: 20px;
    transition: box-shadow 0.3s ease;
}

.appointment-card:hover {
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
}

.appointment-title {
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
}

.appointment-details p {
    margin-bottom: 8px;
    color: #555;
}

.form-control {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    margin-bottom: 15px;
}

.appointment-history-button {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    background-color: #ff6600;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.appointment-history-button:hover {
    background-color: #ff8500;
    transform: scale(1.05);
}

/* Services Section */
.services-box {
    padding: 40px 20px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    margin: 40px auto;
    max-width: 1000px;
    text-align: center;
    margin-bottom: 30px;
}

.services-title {
    font-family: 'Fredoka One', cursive;
    font-size: 2.5rem;
    color: #ff6600;
    margin-bottom: 20px;
}

.services-box p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 30px;
}

/* Pet Care Tips Section */
.pet-care-tips-container {
    padding: 20px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    margin: 40px auto;
    max-width: 1000px;
    margin-bottom: 30px;
}

.tips-card-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.tips-card {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    flex: 1;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.tips-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.tips-icon {
    font-size: 40px;
    color: #ff6600;
    margin-bottom: 10px;
}

.tips-title {
    font-family: 'Fredoka One', cursive;
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #ff6600;
}

.tips-description {
    font-size: 1rem;
    color: #555;
    margin-bottom: 20px;
}

.tips-link {
    font-weight: bold;
    color: #ff6600;
    text-decoration: none;
    transition: color 0.3s ease;
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    border-radius: 25px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.tips-link:hover {
    background-color: #ff8500;
    transform: scale(1.05);
}

/* Community Events Section */
.community-events-container {
    padding: 20px;
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    margin: 40px auto;
    max-width: 1000px;
    margin-bottom: 30px;
}

.event-card-container {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
}

.event-card {
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    padding: 20px;
    text-align: center;
    flex: 1;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.event-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
}

.event-icon {
    font-size: 40px;
    color: #ff6600;
    margin-bottom: 10px;
}

.event-title {
    font-family: 'Fredoka One', cursive;
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #ff6600;
}

.event-description {
    font-size: 1rem;
    color: #555;
    margin-bottom: 20px;
}

.event-link {
    font-weight: bold;
    color: #ff6600;
    text-decoration: none;
    transition: color 0.3s ease;
    display: inline-block;
    padding: 10px 20px;
    background-color: #ff6600;
    color: #fff;
    border-radius: 25px;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.event-link:hover {
    background-color: #ff8500;
    transform: scale(1.05);
}

/* Bottom Navbar */
.bottom-navbar {
    display: none;
    background-color: #fff;
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 10;
}

.bottom-navbar ul {
    list-style: none;
    display: flex;
    justify-content: space-around;
    padding: 0;
    margin: 0;
}

.bottom-navbar ul li {
    padding: 10px;
}

.bottom-navbar ul li a {
    text-decoration: none;
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: color 0.3s ease-in-out;
}

.bottom-navbar ul li a:hover {
    color: #035a2e;
}

.bottom-navbar ul li a i {
    margin-bottom: 5px;
    font-size: 20px;
}

.profile {
    text-decoration: none;
}

/* Media Queries for Responsiveness */
@media (max-width: 1200px) {
    .main-content {
        margin-left: 0;
        margin-top: 60px;
        padding: 20px;
        width: 100%;
    }

    .sidebar {
        display: none;
    }

    .bottom-navbar {
        display: flex;
        justify-content: center;
    }
}

@media (max-width: 768px) {
    .pets-row,
    .tips-card-container,
    .event-card-container,
    .lost-found-cards {
        flex-direction: column;
        align-items: center;
    }

    .pet-item,
    .lost-found-card,
    .tips-card,
    .event-card {
        width: 80%;
        margin-bottom: 20px;
    }

    .accepted-appointments-container {
        padding: 20px;
        margin: 20px auto;
    }

    .lost-found-cards {
        grid-template-columns: 1fr;
    }

    .activity-log-container .appointment-card {
        max-width: 100%;
    }
}

@media (max-width: 480px) {
    .welcome-message {
        font-size: 48px;
        padding: 20px;
    }

    .navbar {
        flex-direction: column;
        text-align: center;
    }

    .top-navbar .logo {
        font-size: 28px;
    }

    .top-navbar .profile {
        font-size: 16px;
    }

    .lost-found-cards {
        grid-template-columns: 1fr;
        width: 100%;
    }
}

    </style>
</head>

<body>
    <div class="top-navbar">
        <div class="logo">PetFinity</div>
        <a href="{{ route('pet-owner.profile.edit') }}" class="profile {{ request()->routeIs('pet-owner.profile.edit') ? 'active' : '' }}">            <div class="profile"><span>Profile</span><i class="fas fa-user"></i></div>
        </a>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}" class="{{ Route::is('pet-owner.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}" class="{{ Route::is('mypets') ? 'active' : '' }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}" class="{{ Route::is('boarding-centers.index') ? 'active' : '' }}"><i class="fas fa-bed"></i> Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}" class="{{ Route::is('appointments.upcoming') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}" class="{{ Route::is('appointments.history') ? 'active' : '' }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="navbar">
            <div>For all your infinite needs!</div>
            <div>Available For Bookings</div>
        </div>

        <div class="welcome-message">
            Welcome to PetFinity, {{ Auth::user()->first_name }}!
        </div>
        
        @if(session('message'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- My Pets Section -->
        <div class="greeting-box">
            <p>Here you can manage your pets and more.</p>
            <h3>My Pets</h3>

            <div class="pets-row">
                @if($pets->isEmpty())
                    <p>You don't have any pets yet.</p>
                    <a href="{{ route('pettype') }}">
                        <div class="add-pet-circle">
                            <div class="plus-icon">+</div>
                        </div>
                    </a>
                @else
                    @foreach($pets as $pet)
                    <div class="pet-item">
                        <div class="pet-circle">
                            <img src="{{ asset('storage/' . $pet->profile_picture) }}" alt="{{ $pet->pet_name }}">
                        </div>
                        <div class="pet-name">{{ $pet->pet_name }}</div>
                    </div>
                    @endforeach
                    <a href="{{ route('pettype') }}">
                        <div class="pet-item">
                            <div class="pet-circle add-pet-circle">
                                <div class="plus-icon">+</div>
                            </div>
                            <div class="pet-name">Add Pet</div>
                        </div>
                    </a>
                @endif
            </div>
        </div>

            {{-- <a href="{{ route('test.show') }}" class="btn btn-primary">Go to Test Page</a> --}}

        <!-- Lost and Found Section -->
        <div class="lost-found-container">
            <h2 class="lost-found-title">Lost and Found</h2>
            <div class="lost-found-cards">
                <div class="lost-found-card">
                    <div class="lost-found-icon">
                        <img src="{{ asset('images/boarder/map (1).png') }}" alt="View Map">
                    </div>
                    <h3>View Map</h3>
                    <p>See last seen locations of missing pets.</p>
                    <a href="{{ route('missing_pets.map') }}" class="btn">View Map</a>
                </div>
                <div class="lost-found-card">
                    <div class="lost-found-icon">
                        <img src="{{ asset('images/boarder/warning.png') }}" alt="Report Missing Pet">
                    </div>
                    <h3>Report Missing Pet</h3>
                    <p>Report your pet as missing.</p>
                    <a href="{{ route('missing_pets.create') }}" class="btn">Report Missing Pet</a>
                </div>
                <div class="lost-found-card">
                    <div class="lost-found-icon">
                        <img src="{{ asset('images/boarder/loupe.png') }}" alt="View Missing Pets">
                    </div>
                    <h3>View Missing Pets</h3>
                    <p>View all missing pets and report sightings.</p>
                    <a href="{{ route('missing_pets.index') }}" class="btn">View Missing Pets</a>
                </div>
                <div class="lost-found-card">
                    <div class="lost-found-icon">
                        <img src="{{ asset('images/boarder/analysis.png') }}" alt="View Analytics">
                    </div>
                    <h3>View Lost and Found Analytics</h3>
                    <p>Analyze the data related to lost and found pets.</p>
                    <a href="{{ route('petowner.analytics.lostandfound') }}" class="btn">View Analytics</a>
                </div>
            </div>
        </div>

        <!-- Accepted Appointments Section -->
        <div class="accepted-appointments-container">
            <h2 class="section-title">Accepted Appointments</h2>
            @if($acceptedAppointments->isEmpty())
                <p>No accepted bookings.</p>
            @else
                @foreach($acceptedAppointments as $appointment)
                    <div class="appointment-card">
                        <a href="{{ route('test.show') }}" class="btn btn-primary">
                            Booking Accepted for {{ $appointment->pet->pet_name }} at {{ $appointment->boardingcenter->business_name }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
        

        <!-- Services Section -->
        <!-- Chat with Pet Boarders Section -->
        <div class="services-box">
            <h2 class="services-title">Chat with Pet Boarders</h2>
            <p>If you need more information or want to ask questions, feel free to reach out to the pet boarders directly.</p>
            <a href="{{ route('pet-owner.chats') }}" class="btn">Start a Conversation</a>
        </div>


        <!-- Pet Care Tips Section -->
        <div class="pet-care-tips-container">
            <h2 class="section-title">Pet Care Tips</h2>
            <div class="tips-card-container">
                <div class="tips-card">
                    <i class="fas fa-bone tips-icon"></i>
                    <h3 class="tips-title">Nutrition</h3>
                    <p class="tips-description">Learn about the best diet and nutrition tips for your pet to ensure they stay healthy and active.</p>
                    <a href="https://www.aspca.org/pet-care/dog-care/dog-nutrition-tips" class="tips-link" target="_blank">Read More</a>
                </div>
                <div class="tips-card">
                    <i class="fas fa-cut tips-icon"></i>
                    <h3 class="tips-title">Grooming</h3>
                    <p class="tips-description">Find out how to properly groom your pet and keep them looking their best.</p>
                    <a href="https://www.akc.org/expert-advice/grooming/" class="tips-link" target="_blank">Read More</a>
                </div>
                <div class="tips-card">
                    <i class="fas fa-dog tips-icon"></i>
                    <h3 class="tips-title">Training</h3>
                    <p class="tips-description">Discover effective training techniques to help your pet learn new skills and behaviors.</p>
                    <a href="https://www.cesarsway.com/dog-training/" class="tips-link" target="_blank">Read More</a>
                </div>
            </div>
        </div>

        <!-- Community Events Section -->
        <div class="community-events-container">
            <h2 class="section-title">Community Events</h2>
            <div class="event-card-container">
                <div class="event-card">
                    <i class="fas fa-calendar-alt event-icon"></i>
                    <h3 class="event-title">Pet Adoption Fair</h3>
                    <p class="event-description">Join us for a pet adoption fair this weekend and find your new furry friend.</p>
                    <a href="https://www.petfinder.com/events/" class="event-link" target="_blank">Learn More</a>
                </div>
                <div class="event-card">
                    <i class="fas fa-chalkboard-teacher event-icon"></i>
                    <h3 class="event-title">Training Workshop</h3>
                    <p class="event-description">Attend our training workshop to learn effective techniques for training your pet.</p>
                    <a href="https://www.petco.com/shop/en/petcostore/c/category/dog-training" class="event-link" target="_blank">Sign Up</a>
                </div>
                <div class="event-card">
                    <i class="fas fa-paw event-icon"></i>
                    <h3 class="event-title">Pet Fair</h3>
                    <p class="event-description">Don't miss the annual pet fair featuring vendors, activities, and more for your pets.</p>
                    <a href="https://www.akc.org/sports/akc-pet-fairs/" class="event-link" target="_blank">Get Details</a>
                </div>
            </div>
        </div>
    </div>

    <div class="bottom-navbar">
        <ul>
            <li><a href="{{ route('pet-owner.dashboard') }}" class="{{ Route::is('pet-owner.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('mypets') }}" class="{{ Route::is('mypets') ? 'active' : '' }}"><i class="fas fa-paw"></i> Pets</a></li>
            <li><a href="{{ route('boarding-centers.index') }}" class="{{ Route::is('boarding-centers.index') ? 'active' : '' }}"><i class="fas fa-bed"></i> Boarding</a></li>
            <li><a href="{{ route('appointments.upcoming') }}" class="{{ Route::is('appointments.upcoming') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
            <li><a href="{{ route('appointments.history') }}" class="{{ Route::is('appointments.history') ? 'active' : '' }}"><i class="fas fa-history"></i> History</a></li>
        </ul>
    </div>



     <!-- Include Pusher and Laravel Echo -->
   <!-- Include Pusher and Laravel Echo -->
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.1/dist/echo.iife.js"></script>

<script>
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env("PUSHER_APP_KEY") }}',
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        forceTLS: true,
        encrypted: true,
    });

    const userId = document.head.querySelector('meta[name="user-id"]').content;

    window.Echo.private(`pet-status.${userId}`)
        .listen('PetStatusUpdated', (e) => {
            console.log('Pet Status Updated:', e.task_name);
            alert('Your pet\'s status has been updated: ' + e.task_name);
        });
</script>

</body>

</html>
