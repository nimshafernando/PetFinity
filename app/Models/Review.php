<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'petowner_id',
        'boardingcenter_id',
        'rating',
        'review',
    ];

    // Relationships
    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }

    public function petOwner()
    {
        return $this->belongsTo(PetOwner::class, 'petowner_id');
    }

    public function boardingCenter()
    {
        return $this->belongsTo(PetBoardingCenter::class, 'boardingcenter_id');
    }
}

