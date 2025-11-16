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
        'created_at',
        'updated_at',
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

    //     public function wedding()
    // {
    //     // Each guest belongs to many venues
    //     return $this->hasOne(Wedding::class);
    // }
}
