<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissingPet extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'petowner_id',
        'last_seen_location',
        'last_seen_date',
        'last_seen_time',
        'distinguishing_features',
        'additional_info',
        'photo',
        'last_seen_location_latitude',
        'last_seen_location_longitude'
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function petOwner()
    {
        return $this->belongsTo(User::class, 'petowner_id');
    }

    public function sightings()
    {
        return $this->hasMany(FoundReport::class);
    }
}
