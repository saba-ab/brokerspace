<?php

namespace App\Models;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'address',
        'type',
        'bedrooms',
        'bathrooms',
        'square_feet',
        'year_built',
        'description',
    ];

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
