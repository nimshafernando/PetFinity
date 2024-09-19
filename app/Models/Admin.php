<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Use the proper User class that implements Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $table = 'admin'; // Specify the correct table name
}
