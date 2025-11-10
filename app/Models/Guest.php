<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
        protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'plus1',
        'created_at',
        'updated_at',
    ];

        public function venues()
    {
        // Each guest belongs to many venues
        return $this->belongsToMany(Venue::class);
    }
}
