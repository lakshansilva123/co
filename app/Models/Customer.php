<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'neck',
        'chest',
        'sleeve',
        'waist',
        'inseam',
        'shoe_size',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function routeNotificationForVonage($notification)
    {
        return $this->phone;
    }
}
