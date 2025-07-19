<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deal extends Model
{
    use HasFactory;
    protected $fillable = [
        'property_id',
        'type',
        'status',
        'property_price',
        'commission_type',
        'commission_percentage',
        'commission_amount',
        'owner_name',
        'owner_phone',
        'owner_email',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
