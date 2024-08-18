<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'petowner_id',
        'pet_name',
        'type',
        'breed',
        'age',
        'is_castrated',
        'gender',
        'weight',
        'height',
        'medical_conditions',
        'dietary_restrictions',
        'behavioral_notes',
        'profile_picture',
    ];

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'petowner_id','id');
    }

    public function bookings(){
        return $this->hasMany(Appointment::class, 'pet_id');
    }
}
