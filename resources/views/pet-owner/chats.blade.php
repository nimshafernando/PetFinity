<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with Pet Boarders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #ff6600;
            color: white;
            font-family: 'Fredoka One', cursive;
            font-size: 1.5rem;
            text-align: center;
        }

        #chatBox {
            background-color: white;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            height: 400px;
            overflow-y: scroll;
        }

        .input-group .form-control {
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #ff6600;
            border-color: #ff6600;
        }

        .btn-primary:hover {
            background-color: #e65c00;
            border-color: #e65c00;
        }

        .message {
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f1f1f1;
            max-width: 70%;
        }

        .message.sent {
            background-color: #ffccb3;
            text-align: right;
            margin-left: auto;
        }

        .message.received {
            background-color: #d9edf7;
            text-align: left;
            margin-right: auto;
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Chat with Pet Boarders</div>
                <div class="card-body">
                    <div class="mb-4 list-group">
                        @foreach($boarders as $boarder)
                            <a href="{{ route('pet-owner.chats', ['boarder_id' => $boarder->id]) }}" class="list-group-item list-group-item-action">
                                {{ $boarder->business_name }}
                            </a>
                        @endforeach
                    </div>

                    @if(isset($selectedBoarder))
                        <div id="chatBox">
                            @foreach($messages as $message)
                                <div class="message {{ ($message->sender_user_type == 'petowner' ? 'sent' : 'received' )}}">
                                    {{ $message->message }}
                                </div>
                    @endforeach

                        </div>

                        <form id="sendMessageForm">
                            @csrf
                            <div class="input-group">
                                <input type="hidden" name="receiver_id" value="{{ $selectedBoarder->id }}" />
                                <input type="text" name="message" class="form-control" placeholder="Type your message here..." required />
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    @else
                        <p>Select a boarding center to start chatting.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    @if(isset($selectedBoarder))
        const fetchMessages = () => {
            fetch("{{ route('fetch.messagesBetweenPetOwnerAndBoarder', ['receiver_id' => $selectedBoarder->id]) }}")
            .then(response => response.json())
            .then(data => {
                const chatBox = document.getElementById('chatBox');
                chatBox.innerHTML = '';
                data.messages.forEach(message => {
                    const messageElement = document.createElement('div');
                    messageElement.classList.add('message');
                    if (message.sender_id === {{ auth()->id() }}) {
                        messageElement.classList.add('sent');
                    } else {
                        messageElement.classList.add('received');
                    }
                    messageElement.innerText = message.message;
                    chatBox.appendChild(messageElement);
                });
                chatBox.scrollTop = chatBox.scrollHeight;
            });
        }

        document.getElementById('sendMessageForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);

            fetch("{{ route('send.messageBetweenPetOwnerAndBoarder') }}", {
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