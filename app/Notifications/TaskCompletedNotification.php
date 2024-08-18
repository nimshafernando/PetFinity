<?php

namespace App\Notifications;

use App\Models\TaskCompletion;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class TaskCompletedNotification extends Notification
{
    private $taskCompletion;

    public function __construct(TaskCompletion $taskCompletion)
    {
        $this->taskCompletion = $taskCompletion;
    }

    public function via($notifiable)
    {
        return ['broadcast', 'database'];  // Store in database and broadcast
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'task_name' => $this->taskCompletion->task->name,
            'completed_at' => $this->taskCompletion->completed_at,
            'notes' => $this->taskCompletion->notes,
        ]);
    }

    public function toArray($notifiable)
    {
        return [
            'task_name' => $this->taskCompletion->task->name,
            'completed_at' => $this->taskCompletion->completed_at,
            'notes' => $this->taskCompletion->notes,
        ];
    }
}
