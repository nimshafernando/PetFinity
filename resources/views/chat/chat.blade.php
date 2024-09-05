<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat</title>
    <style>
        #chat-box {
            max-width: 600px;
            margin: 50px auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            background-color: #f9f9f9;
        }
        #messages {
            height: 300px;
            overflow-y: scroll;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            background-color: #fff;
        }
        #message-input {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #send-button {
            padding: 10px 20px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }
        #send-button:hover {
            background-color: #0056b3;
        }
        .message {
            margin-bottom: 10px;
            padding: 8px;
            border-radius: 4px;
        }
        .message.sent {
            background-color: #e1ffc7;
            text-align: right;
        }
        .message.received {
            background-color: #f1f0f0;
        }
    </style>
</head>
<body>

<div id="chat-box">
    <div id="messages">
        <!-- Messages will be loaded here -->
    </div>
    <input type="text" id="message-input" placeholder="Type your message...">
    <button id="send-button">Send</button>
</div>

<script>
    document.getElementById('send-button').addEventListener('click', function() {
        let message = document.getElementById('message-input').value;
        let appointmentId = {{ $appointment->id }};
        let receiverId = {{ $receiver->id }};
        let receiverType = '{{ get_class($receiver) == \App\Models\PetOwner::class ? 'pet_owner' : 'pet_boarding_center' }}';

        fetch('/messages/send', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                message: message,
                appointment_id: appointmentId,
                receiver_id: receiverId,
                receiver_type: receiverType
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.message) {
                // Add the new message to the chat box
                let newMessageDiv = document.createElement('div');
                newMessageDiv.classList.add('message', 'sent');
                newMessageDiv.textContent = data.message.message;
                document.getElementById('messages').appendChild(newMessageDiv);

                // Clear the input field
                document.getElementById('message-input').value = '';
                // Scroll to the bottom of the messages
                document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
            }
        });
    });

    function loadMessages() {
        let appointmentId = {{ $appointment->id }};

        fetch(`/messages/${appointmentId}`)
            .then(response => response.json())
            .then(data => {
                let messagesHtml = '';
                data.messages.forEach(msg => {
                    let messageClass = msg.sender_type === '{{ get_class(Auth::user()) == \App\Models\PetOwner::class ? 'pet_owner' : 'pet_boarding_center' }}' ? 'sent' : 'received';
                    messagesHtml += `<div class="message ${messageClass}">${msg.sender.first_name}: ${msg.message}</div>`;
                });
                document.getElementById('messages').innerHTML = messagesHtml;
                document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
            });
    }

    // Load messages every 3 seconds
    setInterval(loadMessages, 3000);
    loadMessages();
</script>

</body>
</html>
