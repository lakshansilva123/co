<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garment extends Model
{
    use HasFactory;

    const STATUS_AVAILABLE = 'available';
    const STATUS_RENTED_OUT = 'rented out';
    const STATUS_AWAITING_CLEANING = 'awaiting cleaning';
    const STATUS_REQUIRES_REPAIR = 'requires repair';

    const STATUSES = [
        self::STATUS_AVAILABLE,
        self::STATUS_RENTED_OUT,
        self::STATUS_AWAITING_CLEANING,
        self::STATUS_REQUIRES_REPAIR,
    ];

    protected $fillable = [
        'name',
        'type',
        'size',
        'color',
        'purchase_date',
        'purchase_price',
        'rental_price',
        'status',
        'image_path',
    ];
}
