// resources/js/echo-setup.js

import Echo from "laravel-echo";
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    encrypted: true,
});

// Setup listener for PetOwner
window.setupPetOwnerChatListener = function(receiverId) {
    window.Echo.private(`pet-owner-messages.${receiverId}`)
        .listen('.pet-owner-message', (e) => {
            console.log(e.message);
            const chatBox = document.getElementById('chatBox');
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', 'received');
            messageElement.innerText = e.message;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        });
};

// Setup listener for PetBoarder
window.setupPetBoarderChatListener = function(receiverId) {
    window.Echo.private(`pet-boarder-messages.${receiverId}`)
        .listen('.pet-boarder-message', (e) => {
            console.log(e.message);
            const chatBox = document.getElementById('chatBox');
            const messageElement = document.createElement('div');
            messageElement.classList.add('message', 'received');
            messageElement.innerText = e.message;
            chatBox.appendChild(messageElement);
            chatBox.scrollTop = chatBox.scrollHeight;
        });
};
