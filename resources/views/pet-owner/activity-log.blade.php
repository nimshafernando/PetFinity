<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if(auth('petowner')->check())
        <meta name="user-id" content="{{ auth('petowner')->user()->id }}">
        <meta name="user-type" content="petowner">
    @elseif(auth('petboarder')->check())
        <meta name="user-id" content="{{ auth('boardingcenter')->user()->id }}">
        <meta name="user-type" content="petboarder">
    @elseif(auth('pettrainer')->check())
        <meta name="user-id" content="{{ auth('trainingcenter')->user()->id }}">
        <meta name="user-type" content="pettrainer">
    @endif
    <title>Activity Log</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding: 10px 0;
            background-color: #ff6600;
            color: #fff;
            border-radius: 8px 8px 0 0;
        }
        .task-log {
            margin-top: 20px;
        }
        .task-item {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .task-item:last-child {
            border-bottom: none;
        }
        .task-name {
            font-weight: bold;
            color: #ff6600;
        }
        .task-details {
            margin-top: 5px;
        }
        .task-notes {
            color: #666;
            font-style: italic;
        }
        .timestamp {
            color: #999;
            font-size: 0.9em;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Activity Log for {{ $appointment->pet->pet_name }}</h2>
        </div>

        <div class="task-log">
            @foreach($appointment->taskCompletions as $taskCompletion)
                <div class="task-item">
                    <div class="task-name">{{ $taskCompletion->task->name }}</div>
                    <div class="task-details">
                        <span class="timestamp">{{ $taskCompletion->completed_at }}</span>
                        @if($taskCompletion->notes)
                            <div class="task-notes">Notes: {{ $taskCompletion->notes }}</div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.1/dist/echo.iife.js"></script>

<script>
    window.Pusher = Pusher;

    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: '{{ env("PUSHER_APP_KEY") }}',
        cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
        forceTLS: true,
        encrypted: true,
    });

    const userId = document.head.querySelector('meta[name="user-id"]').content;

    window.Echo.private(`pet-status.${userId}`)
        .listen('PetStatusUpdated', (e) => {
            console.log('Pet Status Updated:', e.task_name);
            alert('Your pet\'s status has been updated: ' + e.task_name);
        });
</script>


</body>
</html>
