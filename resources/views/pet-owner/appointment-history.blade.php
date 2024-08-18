<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Log History</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background-color: #fff;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: 2px solid #ff6600;
            position: relative;
        }

        .header {
            text-align: center;
            background-color: #ff6600;
            color: #fff;
            padding: 15px;
            border-radius: 16px 16px 0 0;
            margin-bottom: 30px;
            font-size: 24px;
            font-family: 'Fredoka One', cursive;
        }

        .appointment-item {
            margin-top: 20px;
            padding: 20px;
            border-radius: 16px;
            background-color: #ffe6cc;
            border: 1px solid #ffa366;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
        }

        .appointment-header {
            font-weight: bold;
            color: #8A3A0B; /* Burnt sienna for main text */
            font-size: 20px;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .appointment-header i {
            margin-right: 10px;
            color: #ff4500;
            font-size: 24px;
        }

        .duration-text {
            color: #2F4F4F; /* Dark Slate Gray for duration */
            display: flex;
            align-items: center;
        }

        .duration-text i {
            margin-right: 5px;
            color: #ff6347;
        }

        .task-log {
            margin-top: 15px;
            padding-left: 20px;
        }

        .task-item {
            padding: 15px;
            border-radius: 12px;
            background-color: #fff3e0;
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .task-item::before {
            content: '';
            width: 8px;
            height: 100%;
            background-color: #ff6600;
            border-radius: 12px 0 0 12px;
            position: absolute;
            left: 0;
            top: 0;
        }

        .task-name {
            font-weight: bold;
            color: #FF6347; /* Tomato Red for task names */
            font-size: 18px;
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .task-name i {
            margin-right: 10px;
            color: #ff6347;
        }

        .task-details {
            color: #555; /* Standard text color */
        }

        .task-notes {
            color: #4682B4; /* Steel Blue for notes */
            font-style: italic;
            margin-top: 5px;
            font-size: 14px;
        }

        .task-notes span {
            color: #000000; /* OrangeRed for the 'Notes' label */
        }

        .timestamp {
            color: #696969; /* Dim Gray for timestamps */
            font-size: 0.9em;
            display: block;
            margin-top: 5px;
        }

        .no-tasks {
            font-style: italic;
            color: #999;
            text-align: center;
        }

        .back-button {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #ff6600;
            font-weight: 600;
            position: absolute;
            top: -10px;
            left: -10px;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            background-color: #ff6600;
            color: #fff;
        }

        .back-button i {
            margin-right: 8px;
            font-size: 1.2em;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            .header {
                font-size: 22px;
            }

            .appointment-header {
                font-size: 18px;
                flex-direction: column;
                align-items: flex-start;
            }

            .task-name {
                font-size: 16px;
            }

            .task-details,
            .task-notes {
                font-size: 14px;
            }

            .timestamp {
                font-size: 0.85em;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            .header {
                font-size: 20px;
            }

            .appointment-header {
                font-size: 16px;
            }

            .task-name {
                font-size: 14px;
            }

            .task-details,
            .task-notes {
                font-size: 12px;
            }

            .timestamp {
                font-size: 0.8em;
            }
        }
    </style>
</head>

<body>
    <a href="{{ route('pet-owner.dashboard') }}" class="back-button" {{ Route::is('pet-owner.dashboard') ? 'active' : '' }}">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="container">
        <div class="header">
            <h2>Activity Log History</h2>
        </div>

        @foreach($appointments as $appointment)
            <div class="appointment-item">
                <div class="appointment-header">
                    <span><i class="fas fa-calendar-alt"></i> Appointment for {{ $appointment->pet->pet_name }} with {{ $appointment->boardingcenter->business_name }}</span><br>
                    <span class="duration-text"><i class="fas fa-clock"></i> {{ $appointment->start_date }} to {{ $appointment->end_date }}</span>
                </div>
                
                <div class="task-log">
                    @if($appointment->taskCompletions->isEmpty())
                        <p class="no-tasks">No tasks completed for this appointment.</p>
                    @else
                        @foreach($appointment->taskCompletions as $taskCompletion)
                            <div class="task-item">
                                <div class="task-name">
                                    <i class="fas fa-paw"></i> {{ $taskCompletion->task->name }}
                                </div>
                                <div class="task-details">
                                    <span class="timestamp">{{ $taskCompletion->completed_at }}</span>
                                    @if($taskCompletion->notes)
                                        <div class="task-notes"><span>Notes:</span> {{ $taskCompletion->notes }}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>

</html>
