<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'missing_pet_id',
        'location',
        'latitude',
        'longitude',
        'description',
        'photo',
    ];

    public function missingPet()
    {
        return $this->belongsTo(MissingPet::class);
    }
}

