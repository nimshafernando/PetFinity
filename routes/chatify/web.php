<?php

use Illuminate\Support\Facades\Route;

/*
 * Apply authentication middleware to all Chatify routes.
 * Make sure to adjust 'auth:petOwner,boardingCenter' according to your actual guard names.
 */
Route::middleware(['auth:petOwner,boardingCenter'])->group(function () {
    /**
     * This is the main app route [Chatify Messenger]
     */
    Route::get('/', 'MessagesController@index')->name(config('chatify.routes.prefix'));

    /**
     * Fetch info for specific id [user/group]
     */
    Route::post('/idInfo', 'MessagesController@idFetchData');

    /**
     * Send message route
     */
    Route::post('/sendMessage', 'MessagesController@send')->name('send.message');

    /**
     * Fetch messages
     */
    Route::post('/fetchMessages', 'MessagesController@fetch')->name('fetch.messages');

    /**
     * Download attachments route to create a downloadable links
     */
    Route::get('/download/{fileName}', 'MessagesController@download')->name(config('chatify.attachments.download_route_name'));

    /**
     * Authentication for pusher private channels
     */
    Route::post('/chat/auth', 'MessagesController@pusherAuth')->name('pusher.auth');

    /**
     * Make messages as seen
     */
    Route::post('/makeSeen', 'MessagesController@seen')->name('messages.seen');

    /**
     * Get contacts
     */
    Route::get('/getContacts', 'MessagesController@getContacts')->name('contacts.get');

    /**
     * Update contact item data
     */
    Route::post('/updateContacts', 'MessagesController@updateContactItem')->name('contacts.update');

    /**
     * Star in favorite list
     */
    Route::post('/star', 'MessagesController@favorite')->name('star');

    /**
     * Get favorites list
     */
    Route::post('/favorites', 'MessagesController@getFavorites')->name('favorites');

    /**
     * Search in messenger
     */
    Route::get('/search', 'MessagesController@search')->name('search');

    /**
     * Get shared photos
     */
    Route::post('/shared', 'MessagesController@sharedPhotos')->name('shared');

    /**
     * Delete Conversation
     */
    Route::post('/deleteConversation', 'MessagesController@deleteConversation')->name('conversation.delete');

    /**
     * Delete Message
     */
    Route::post('/deleteMessage', 'MessagesController@deleteMessage')->name('message.delete');

    /**
     * Update setting
     */
    Route::post('/updateSettings', 'MessagesController@updateSettings')->name('avatar.update');

    /**
     * Set active status
     */
    Route::post('/setActiveStatus', 'MessagesController@setActiveStatus')->name('activeStatus.set');

    /*
     * [Group] view by id
     */
    Route::get('/group/{id}', 'MessagesController@index')->name('group');

    /*
     * user view by id.
     */
    Route::get('/{id}', 'MessagesController@index')->name('user');
});

