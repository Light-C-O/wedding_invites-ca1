<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
        protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'email',
        'plus1',
    ];

    public function venues()
    {
        // Each guest can belong to many venues
        return $this->belongsToMany(Venue::class, 'guest_venue');
    }

    public function user()
    {
        //A guest is one user
        return $this->belongsTo(User::class);
    }

        public function weddings()
    {
        // Each guest can belong to many weddings
        return $this->belongsToMany(Wedding::class, 'guest_wedding')
                ->withPivot('selected')
                ->withTimestamps();
    }
}
