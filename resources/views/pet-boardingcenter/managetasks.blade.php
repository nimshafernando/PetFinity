<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Tasks</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 100%;
            max-width: 800px;
            background-color: #ffffff;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border: 2px solid #007bff;
        }

        h2 {
            font-family: 'Fredoka One', cursive;
            color: #035a2e;
            text-align: center;
            margin-bottom: 30px;
        }

        /* Completed Tasks Style */
        .completed-card {
            margin-bottom: 20px;
            border: 1px solid #e1e1e1;
            border-radius: 12px;
            padding: 15px;
            background-color: #e0f7e9; /* Light green background */
        }

        .completed-card-header {
            font-weight: bold;
            font-size: 20px;
            color: #035a2e; /* Dark green color */
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .completed-card-header i {
            margin-right: 10px;
            color: #28a745; /* Green color */
        }

        .completed-list-group-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border: none;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #d6f5e4;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            justify-content: space-between;
        }

        .completed-list-group-item:hover {
            background-color: #c2ebd2;
        }

        /* Managing Tasks Style */
        .task-card {
            margin-bottom: 20px;
            border: 1px solid #e1e1e1;
            border-radius: 12px;
            padding: 15px;
            background-color: #f0f8ff; /* Light blue background */
        }

        .task-card-header {
            font-weight: bold;
            font-size: 20px;
            color: #0056b3;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .task-card-header i {
            margin-right: 10px;
            color: #007bff; /* Blue color */
        }

        .task-list-group-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border: none;
            border-radius: 8px;
            margin-bottom: 10px;
            background-color: #f7fbff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            justify-content: space-between;
        }

        .task-list-group-item:hover {
            background-color: #cfe2ff;
        }

        .form-check-label {
            font-size: 18px;
            font-weight: 500;
            color: #333;
            margin-left: 10px;
        }

        .fa-paw {
            color: #007bff;
            font-size: 22px;
        }

        textarea {
            width: 100%;
            border-radius: 8px;
            border: 1px solid #e1e1e1;
            padding: 10px;
            margin-top: 10px;
        }

        .btn-success {
            background-color: #ff6600;
            border-color: #ff6600;
            color: #fff;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease-in-out;
            margin-top: 15px;
            font-weight: bold;
            display: block;
            width: 100%;
            text-align: center;
        }

        .btn-success:hover {
            background-color: #e65c00;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .card-header {
                font-size: 18px;
            }

            .form-check-label {
                font-size: 16px;
            }

            .btn-success {
                width: 100%;
                text-align: center;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 10px;
            }

            .card-header {
                font-size: 16px;
            }

            .form-check-label {
                font-size: 14px;
            }

            .btn-success {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Tasks for Appointment with {{ $appointment->pet->pet_name }}</h2>

        <!-- Completed Tasks Section -->
        <div class="completed-card">
            <div class="completed-card-header">
                <i class="fas fa-check-circle"></i>Completed Tasks
            </div>
            <div class="card-body">
                @if($appointment->taskCompletions->isEmpty())
                <p>No tasks have been completed yet.</p>
                @else
                <ul class="list-group">
                    @foreach($appointment->taskCompletions as $completion)
                    <li class="completed-list-group-item">
                        <div class="completed-tasks">
                            <i class="fas fa-paw"></i>
                            <strong>{{ $completion->task->name }}</strong> - Completed at {{ $completion->completed_at }}
                        </div>
                        @if($completion->notes)
                        <p>Notes: {{ $completion->notes }}</p>
                        @endif
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
        </div>

        <!-- Task Management Section -->
        <div class="task-card">
            <div class="task-card-header">
                <i class="fas fa-tasks"></i>Tasks
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($tasks as $task)
                    <li class="task-list-group-item">
                        <i class="fas fa-paw"></i>
                        <form action="{{ route('task-completions.store', $appointment) }}" method="POST" style="width: 100%;">
                            @csrf
                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                            <div class="form-check" style="display: flex; align-items: center;">
                                <input class="form-check-input" type="checkbox" id="task{{ $task->id }}" name="completed_at" value="{{ now() }}">
                                <label class="form-check-label" for="task{{ $task->id }}">
                                    {{ $task->name }}
                                </label>
                            </div>
                            <textarea name="notes" class="mt-2 form-control" placeholder="Add any notes here..."></textarea>
                            <button type="submit" class="mt-2 btn btn-success">Mark as Completed</button>
                        </form>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
