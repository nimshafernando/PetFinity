<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.3.1/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/css/pet_owner_css/nav.css', 'resources/css/pet_owner_css/dashboard.css'])

    <!-- Meta tags for user ID and user type -->
    @if(auth('petowner')->check())
        <meta name="user-id" content="{{ auth('petowner')->user()->id }}">
        <meta name="user-type" content="petowner">
    @elseif(auth('petboarder')->check())
        <meta name="user-id" content="{{ auth('petboarder')->user()->id }}">
        <meta name="user-type" content="petboarder">
    @elseif(auth('pettrainer')->check())
        <meta name="user-id" content="{{ auth('pettrainer')->user()->id }}">
        <meta name="user-type" content="pettrainer">
    @endif

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        .lost-and-found-section {
            display: flex;
            justify-content: space-around;
            margin: 20px 0;
            background-color: #f8f9fa;
            border: 1px solid #ddd;
            padding: 20px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            margin: 10px;
            text-align: center;
            width: 30%;
        }

        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .lost-found-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        .lost-found-title {
            text-align: center;
            font-size: 1rem;
            color: #000000;
            margin-bottom: 20px;
        }

        .lost-found-cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .lost-found-card {
            background-color: #ffffff;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: calc(25% - 20px);
            margin-bottom: 20px;
            text-align: center;
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .lost-found-card:hover {
            transform: translateY(-5px);
        }

        .lost-found-card h2 {
            font-size: 1.5rem;
            color: #ff6600;
            margin-bottom: 10px;
        }

        .lost-found-card p {
            font-size: 1rem;
            color: #333;
            margin-bottom: 15px;
        }

        .lost-found-card .btn {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s ease;
            margin-top: auto;
        }

        .lost-found-card .btn:hover {
            background-color: #D25F51;
        }

        .lost-found-card i {
            font-size: 2rem;
            color: #EA785B;
            margin-bottom: 10px;
        }

        @media (max-width: 992px) {
            .lost-found-card {
                width: calc(50% - 20px);
            }
        }

        @media (max-width: 768px) {
            .lost-found-card {
                width: 100%;
            }
        }
    </style>
</head>

<body class="bg-gray-50">
    <x-sidebar-nav />

    


    <div class="container min-h-screen">
        <!-- Main Content -->
        <div class="content">
            <div class="header">
                <h1 class="header-title">Welcome to PetFinity</h1>
                <div class="account-info"></div>
            </div>

            <!-- My Pets Section -->
            <div class="greeting-box">
                <p>Here you can manage your pets and more.</p>
                <h3>My Pets</h3>
                <p>You don't have any pets yet.</p>
                <a href="{{ route('pettype') }}">
                    <button class="button-add-pet">Add Pet</button>
                </a>
            </div>

            <!-- Lost and Found Section -->
            <div class="lost-found-container">
                <h2 class="lost-found-title">Lost and Found</h2>
                <div class="lost-found-cards">
                    <div class="lost-found-card">
                        <i class="fas fa-map-marker-alt"></i>
                        <h2>View Map</h2>
                        <p>See last seen locations of missing pets.</p>
                        <a href="{{ route('missing_pets.map') }}" class="btn">View Map</a>
                    </div>
                    <div class="lost-found-card">
                        <i class="fas fa-exclamation-circle"></i>
                        <h2>Report Missing Pet</h2>
                        <p>Report your pet as missing.</p>
                        <a href="{{ route('missing_pets.create') }}" class="btn">Report Missing Pet</a>
                    </div>
                    <div class="lost-found-card">
                        <i class="fas fa-eye"></i>
                        <h2>View Missing Pets</h2>
                        <p>View all missing pets and report sightings.</p>
                        <a href="{{ route('missing_pets.index') }}" class="btn">View Missing Pets</a>
                    </div>
                    <div class="lost-found-card">
                        <i class="fas fa-chart-line"></i>
                        <h2>View Lost and Found Analytics</h2>
                        <p>Analyze the data related to lost and found pets.</p>
                        <a href="{{ route('petowner.analytics.lostandfound') }}" class="btn">View Analytics</a>
                    </div>
                </div>
            </div>
            <!-- End Lost and Found Section -->







            <!-- Pet Activity Log Section -->
<div style="padding: 20px; border-radius: 10px; background-color: #fff; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); max-width: 100%; margin: 20px auto;">
    <h2 style="text-align: center; font-weight: bold; font-family: 'Nunito', sans-serif; margin-bottom: 20px;">Appointment Management</h2>

    <!-- Ongoing Appointments -->
    @if($ongoingAppointments->isEmpty())
        <p style="text-align: center; font-size: 16px; color: #555;">No ongoing appointments currently.</p>
    @else
        <div style="display: flex; flex-direction: column; align-items: center;">
            @foreach($ongoingAppointments as $appointment)
                <div style="width: 100%; border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9; margin-bottom: 20px; max-width: 500px;">
                    <div style="margin-bottom: 10px;">
                        <h5 style="font-weight: bold; color: #333;">Ongoing Appointment for: {{ $appointment->pet->pet_name }}</h5>
                        <p><strong>Boarding Center:</strong> {{ $appointment->boardingcenter->business_name }}</p>
                        <p><strong>Start Date:</strong> {{ $appointment->start_date }}</p>
                        <p><strong>End Date:</strong> {{ $appointment->end_date }}</p>
                        <p><strong>Check-in Time:</strong> {{ $appointment->check_in_time }}</p>
                        <p><strong>Check-out Time:</strong> {{ $appointment->check_out_time }}</p>
                        <p><strong>Special Notes:</strong> {{ $appointment->special_notes }}</p>
                    </div>
                    <!-- Activity Log Button -->
                    <a href="{{ route('pet.owner.activity-log', $appointment->id) }}" style="display: block; text-align: center; margin-bottom: 10px;">
                        <button style="width: 100%; padding: 12px; font-size: 16px; background-color: #ff6600; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Show Activity Log</button>
                    </a>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Appointment History Section -->
    <div style="text-align: center; margin-top: 30px;">
        <h5 style="font-weight: bold; color: #333;">Activity Log History</h5>
        <a href="{{ route('petowner.appointment-history') }}" style="display: block;">
            <button style="width: 100%; padding: 12px; font-size: 16px; background-color: #ff6600; color: #fff; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">
                View Activity Log History
            </button>
        </a>
    </div>
    {{-- @if(!$pastAppointments->isEmpty())
        <div style="text-align: center; margin-top: 30px;">
            <h5 style="font-weight: bold; color: #333;">Activity Log History</h5>
            <a href="{{ route('petowner.appointment-history') }}" style="display: block;">
                <button style="width: 100%; padding: 12px; font-size: 16px; background-color: #ff6600; color: #fff; border: none; border-radius: 5px; cursor: pointer; margin-top: 10px;">View Activity Log History</button>
            </a>
        </div>
    @endif --}}
</div>

@livewire('usernotification')

<!-- Additional Styles for Mobile Responsiveness -->
<style>
    @media (max-width: 768px) {
        div[style*="max-width: 500px"] {
            max-width: 100%;
        }
    }
</style>


            <!-- Pet Activity Log Section -->   

            

            <!-- Services Section -->
            <div class="services-box">
                <h2 class="services-title">Explore Our Services</h2>
                <p>Discover amazing places for your pet. Click below to book appointments at pet boarding centers.</p>
                <a href="{{ route('boarding-centers.index') }}" class="button-view-places">View All Pet Boarding Places</a>
            </div>

            <!-- Accepted Appointments Section -->
            <div class="accepted-appointments-container">
                <h2 class="section-title">Accepted Appointments</h2>
                @if($acceptedAppointments->isEmpty())
                    <p>No accepted bookings.</p>
                @else
                    @foreach($acceptedAppointments as $appointment)
                        <div class="mb-3 card">
                            <div class="card-body">
                                <h5 class="card-title">Booking Accepted for {{ $appointment->pet->name }}</h5>
                                <p class="card-text">
                                    <strong>Boarding Center:</strong> {{ $appointment->boardingcenter->name }}<br>
                                    <strong>Start Date:</strong> {{ $appointment->start_date }}<br>
                                    <strong>End Date:</strong> {{ $appointment->end_date }}<br>
                                    <strong>Check-in Time:</strong> {{ $appointment->check_in_time }}<br>
                                    <strong>Check-out Time:</strong> {{ $appointment->check_out_time }}<br>
                                    <strong>Special Notes:</strong> {{ $appointment->special_notes }}<br>
                                    <strong>Status:</strong> {{ $appointment->status }}<br>
                                    <strong>Payment Status:</strong> {{ $appointment->payment_status }}
                                </p>
                                
                                <form action="{{ route('appointment.select-payment-method', $appointment->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="payment_method">Select Payment Method</label>
                                        <select name="payment_method" id="payment_method" class="form-control">
                                            <option value="choose">choose</option>
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Confirm Payment Method</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- End Accepted Appointments Section -->

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
            <!-- End Community Events Section -->

          

        </div>
    </div>

    @livewireScripts
    

</body>
</html>
