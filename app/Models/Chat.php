<?php
namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiver_user_type',
        'sender_user_type',
        'sender_id',
        'receiver_id',
        'message',
        'seen',
    ];

    // public function sender()
    // {
    //     return $this->belongsTo(PetOwner::class, 'sender_id')->orWhere('sender_id', Auth::guard('boardingcenter')->id());
    // }
    
    // public function receiver()
    // {
    //     return $this->belongsTo(PetBoardingCenter::class, 'receiver_id')->orWhere('receiver_id', Auth::guard('petowner')->id());
    // }
    

    public function receiverProfile()
    {
        return $this->belongsTo(PetBoardingCenter::class, 'receiver_id', 'id')->select(['id', 'business_name', 'email']);
    }

    public function senderProfile()
    {
        return $this->belongsTo(PetOwner::class, 'sender_id', 'id')->select(['id', 'first_name', 'last_name', 'email']);
    }
}
