<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskCompletion extends Model
{
    protected $fillable = ['appointment_id', 'task_id', 'completed_at', 'notes'];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'appointment_id');
    }
}
