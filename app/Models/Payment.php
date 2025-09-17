<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'booking_id',
        'amount',
        'payment_date',
        'payment_method',
        'status',
    ];

    /**
     * Get the booking that the payment belongs to.
     */
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
