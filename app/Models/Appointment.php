<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'boardingcenter_id',
        'petowner_id',
        'pet_id',
        
        'start_date',
        'end_date',
        'check_in_time',
        'check_out_time',
        'special_notes',
        'payment_method',
        'status', 
        'payment_status', 
        'payment_method',
        'declined_reason',
        'total_price' // Add this
    ];

    public function boardingCenter()
    {
        return $this->belongsTo(PetBoardingCenter::class, 'boardingcenter_id');
    }

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'petowner_id');
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'pet_id');
    }

    //pet status
    public function taskCompletions()
    {
        return $this->hasMany(TaskCompletion::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
