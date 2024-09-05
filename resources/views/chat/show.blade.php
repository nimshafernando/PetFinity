<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <style>
        /* Add basic styles for the chat interface */
        #chatContainer {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
        }
        #chatHeader {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }
        #chatMessages {
            height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }
        #chatInputContainer {
            display: flex;
            align-items: center;
        }
        #chatInput {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        #sendButton {
            padding: 10px 20px;
            background-color: #ff6600;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div id="chatContainer">
    <div id="chatHeader">
        Chat between {{ $appointment->petOwner->first_name }} {{ $appointment->petOwner->last_name }} and {{ $appointment->boardingCenter->business_name }}
    </div>
    <div id="chatMessages">
        @foreach($messages as $message)
            <div>{{ $message->sender->id == auth()->id() ? 'You' : ($message->sender->id == $appointment->petOwner->id ? $appointment->petOwner->first_name : $appointment->boardingCenter->business_name) }}: {{ $message->message }}</div>
        @endforeach
    </div>
    <div id="chatInputContainer">
        <input type="text" id="chatInput" placeholder="Type your message...">
        <button id="sendButton">Send</button>
    </div>
</div>

<script>
    const chatInput = document.getElementById('chatInput');
    const sendButton = document.getElementById('sendButton');
    const chatMessages = document.getElementById('chatMessages');

    sendButton.addEventListener('click', () => {
        const message = chatInput.value.trim();
        if (message) {
            addMessageToChat("You", message);
            chatInput.value = '';

            // Send the message to the server
            sendMessageToServer(message);
        }
    });

    function addMessageToChat(sender, message) {
        const messageElement = document.createElement('div');
        messageElement.textContent = `${sender}: ${message}`;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function sendMessageToServer(message) {
    fetch('{{ route("chat.send") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            message: message,
            receiver_id: {{ auth()->id() == $appointment->petOwner->id ? $appointment->boardingCenter->id : $appointment->petOwner->id }},
            appointment_id: {{ $appointment->id }}
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Message sent successfully', data);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

</script>

</body>
</html>
