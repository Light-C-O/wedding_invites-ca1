<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wedding extends Model
{
    //This tells Laravel: “These fields are safe to be filled with a user input.”
    use HasFactory;

    // Define fillable fields
    protected $fillable = [
        'bride_name',
        'groom_name',
        'location',
        'best_man',
        'maid_of_honor',
        'wedding_date_time',
        'venue_id',
        'created_at',
        'updated_at',
    ];

    // Define relationship with Venue model
    public function venue()
    {
        // Each wedding belongs to one venue
        return $this->belongsTo(Venue::class);
    }
}
