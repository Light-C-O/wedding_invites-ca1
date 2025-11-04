<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //This tells Laravel: “These fields are safe to be filled with a user input.”

    use HasFactory;

    protected $fillable = [
        'title',
        'location',
        'price',
        'capacity',
        'image',
        'description',
        'created_at',
        'updated_at',
    ];

    // Define relationship with Wedding model
    public function weddings()
    {
        //One venue can host many weddings
        return $this->hasMany(Wedding::class);
    }

}
