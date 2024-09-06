<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Pet Owners</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .chat-container {
            display: flex;
            height: 100vh;
        }

        .chat-sidebar {
            background-color: #fff;
            border-right: 1px solid #ddd;
            width: 300px;
            overflow-y: auto;
            padding: 20px;
        }

        .chat-sidebar a {
            padding: 15px;
            display: block;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #f8f9fa;
            color: #333;
            text-decoration: none;
        }

        .chat-sidebar a:hover {
            background-color: #00c251;
            color: white;
        }

        .chat-sidebar a.active {
            background-color: #00c251;
            color: white;
        }


        

        .chat-main {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa;
        }

        .chat-header {
            background-color: #00c251;
            color: white;
            padding: 15px;
            text-align: center;
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
        }

        #chatBox {
            background-color: white;
            padding: 20px;
            flex: 1;
            overflow-y: scroll;
            display: flex;
            flex-direction: column;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 20px;
            max-width: 70%;
            font-size: 1rem;
        }

        .message.sent {
            background-color: #00c251;
            color: black;
            text-align: right;
            align-self: flex-end;
        }

        .message.received {
            background-color: #f1f1f1;
            color: black;
            text-align: left;
            align-self: flex-start;
        }

        .chat-input {
            background-color: #fff;
            padding: 15px;
            display: flex;
            border-top: 1px solid #ddd;
        }

        .chat-input input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 20px;
            margin-right: 10px;
        }

        .chat-input button {
            background-color: #00c251;
            border: none;
            padding: 10px 20px;
            border-radius: 20px;
            color: white;
        }

        @media (max-width: 768px) {
            .chat-container {
                flex-direction: column;
            }

            .chat-sidebar {
                width: 100%;
                height: auto;
                padding: 10px;
            }

            .chat-main {
                width: 100%;
            }
        }
    </style>

@vite('resources/js/echo-setup.js')

<script type="module">
    document.addEventListener('DOMContentLoaded', function () {
        const receiverId = {{ $selectedBoarder->id ?? $selectedOwner->id ?? 'null' }};
        if (receiverId) {
            @if(Auth::guard('petowner')->check())
                setupPetOwnerChatListener(receiverId);
            @elseif(Auth::guard('boardingcenter')->check())
                setupPetBoarderChatListener(receiverId);
            @endif
        }
    });
</script>

</head>
<body>

<div class="chat-container">
    {{-- <div class="chat-sidebar">
        <h4>Contacts</h4>
        @foreach($owners as $owner)
            <a href="{{ route('pet-boardingcenter.chats', ['owner_id' => $owner->id]) }}">
                {{ $owner->first_name }}
            </a>
        @endforeach
    </div> --}}

    <div class="chat-sidebar">
        <h4>Contacts</h4>
        @if($owners->isEmpty())
            <p>No pet owners have contacted you yet.</p>
        @else
            @foreach($owners as $owner)
                <a href="{{ route('pet-boardingcenter.chats', ['owner_id' => $owner->id]) }}" 
                   class="{{ isset($selectedOwner) && $selectedOwner->id == $owner->id ? 'active' : '' }}">
                    {{ $owner->first_name }}
                </a>
            @endforeach
        @endif
    </div>
    
    

    <div class="chat-main">
        <div class="chat-header">
            @if(isset($selectedOwner))
                Chat with {{ $selectedOwner->first_name }}
            @else
                Select a pet owner to chat
            @endif
        </div>

        <div id="chatBox">
            @if(isset($selectedOwner))
                @foreach($messages as $message)
                    <div class="message {{ ($message->sender_user_type == 'boardingcenter' ? 'sent' : 'received') }}">
                        {{ $message->message }}
                    </div>
                @endforeach
            @endif
        </div>

        @if(isset($selectedOwner))
            <div class="chat-input">
                <form id="sendMessageForm">
                    @csrf
                    <input type="hidden" name="receiver_id" value="{{ $selectedOwner->id }}" />
                    <input type="text" name="message" class="form-control" placeholder="Type your message here..." required />
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        @endif
    </div>
</div>

<script>
    @if(isset($selectedOwner))
    const fetchMessages = () => {
        fetch("{{ route('fetch.messagesForBoarder', ['receiver_id' => $selectedOwner->id]) }}")
        .then(response => response.json())
        .then(data => {
            const chatBox = document.getElementById('chatBox');
            chatBox.innerHTML = '';
            data.messages.forEach(message => {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', message.sender_id === {{ $authUserId }} ? 'sent' : 'received');
                messageElement.innerText = message.message;
                chatBox.appendChild(messageElement);
            });
            chatBox.scrollTop = chatBox.scrollHeight;
        });
    }

    document.getElementById('sendMessageForm').addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch("{{ route('pet-boardingcenter.send-message') }}", {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                this.reset();
                fetchMessages();
            }
        });
    });

    setInterval(fetchMessages, 2000); // Fetch messages every 2 seconds
    @endif
</script>

</body>
</html>
