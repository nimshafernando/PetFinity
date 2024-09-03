<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'seen',
    ];

    public function sender()
    {
        return $this->belongsTo(PetOwner::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(PetBoardingCenter::class, 'receiver_id');
    }

    public function receiverProfile()
    {
        return $this->belongsTo(PetBoardingCenter::class, 'receiver_id', 'id')->select(['id', 'business_name', 'email']);
    }

    public function senderProfile()
    {
        return $this->belongsTo(PetOwner::class, 'sender_id', 'id')->select(['id', 'first_name', 'last_name', 'email']);
    }
}
