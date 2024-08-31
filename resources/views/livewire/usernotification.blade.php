<?php

use function Livewire\Volt\{state, mount};

state([
    'notifications' => []
]);

mount(function(){
    // $this->loadNotifications();
});

$loadNotifications = function(){
    $user = null;

    // check who is authenticated
    foreach(
        [
            'petowner',
            'trainingcenter',
            'boardingcenter'
        ] as $user_guard
    ){
        if(auth($user_guard)->check()){
            $user = auth($user_guard)->user();
            break;
        }
    }

    if($user){
    $this->notifications = $user->notifications;
    }
};

?>

<div x-data="{
    init(){
       setTimeout(() => {
             @this.loadNotifications();
       }, 2000);
    }
}">
    <ul>
    @foreach($notifications as $notification)
          <li>
            {{ $notification->data['task_name'] }}
          </li>
    @endforeach
</ul>
</div>
