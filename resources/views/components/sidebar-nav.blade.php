<aside class="sidebar">
    <div class="p-4">
        <nav class="space-y-4">
            <a href="{{ route('pet-owner.dashboard') }}" class="nav-link {{ Route::is('pet-owner.dashboard') ? 'active' : '' }}">
                <div class="nav-icon"><i class="fas fa-home"></i></div>
                Home
            </a>

            <a href="{{ route('mypets') }}" class="nav-link {{ Route::is('mypets') ? 'active' : '' }}">
                <div class="nav-icon"><i class="fas fa-paw"></i></div>
                Pets
            </a>

            <a href="{{ route('boarding-centers.index') }}" class="nav-link {{ Route::is('boarding-centers.index') ? 'active' : '' }}">
                <div class="nav-icon"><i class="fas fa-bed"></i></div>
                Pet Boarding Centers
            </a>

            <a href="{{ route('appointments.upcoming') }}" class="nav-link {{ Route::is('appointments.upcoming') ? 'active' : '' }}">
                <div class="nav-icon"><i class="fas fa-calendar-alt"></i></div>
                Upcoming
            </a>

            <a href="{{ route('appointments.history') }}" class="nav-link {{ Route::is('appointments.history') ? 'active' : '' }}">
                <div class="nav-icon"><i class="fas fa-history"></i></div>
                Past Bookings
            </a>
        </nav>
    </div>
</aside>
<div class="top-navbar">
    <div class="logo">Petfinity</div>
    <a href="{{ route('pet-owner.profile.edit') }}" class="profile {{ request()->routeIs('pet-owner.profile.edit') ? 'active' : '' }}">
        <div><span>Profile</span><i class="fas fa-user"></i></div>
    </a>
</div>
<div class="navbar">
    <ul>
        <li><a href="{{ route('pet-owner.dashboard') }}" class="{{ Route::is('pet-owner.dashboard') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="{{ route('mypets') }}" class="{{ Route::is('mypets') ? 'active' : '' }}"><i class="fas fa-paw"></i> Pets</a></li>
        <li><a href="{{ route('boarding-centers.index') }}" class="{{ Route::is('boarding-centers.index') ? 'active' : '' }}"><i class="fas fa-bed"></i> Boarding</a></li>
        <li><a href="{{ route('appointments.upcoming') }}" class="{{ Route::is('appointments.upcoming') ? 'active' : '' }}"><i class="fas fa-calendar-alt"></i> Upcoming</a></li>
        <li><a href="{{ route('appointments.history') }}" class="{{ Route::is('appointments.history') ? 'active' : '' }}"><i class="fas fa-history"></i> History</a></li>
    </ul>
</div>