<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

Broadcast::channel('pet-status', function ($user, $id) {

    return true;

    // Check if the user is authenticated as a pet owner
    if (Auth::guard('petowner')->check()) {
        return (int) Auth::guard('petowner')->id() === (int) $id;
    }
    
    // Check if the user is authenticated as a pet boarder
    if (Auth::guard('boardingcenter')->check()) {
        return (int) Auth::guard('boardingcenter')->id() === (int) $id;
    }
    
    // Check if the user is authenticated as a pet trainer
    if (Auth::guard('trainingcenter')->check()) {
        return (int) Auth::guard('trainingcenter')->id() === (int) $id;
    }
    
    // If the user is not authenticated with any guard, deny access
    return false;
});


/*
Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
*/

/*
Broadcast::channel('pet-status.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
*/





