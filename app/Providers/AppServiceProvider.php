<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;
use App\Models\Guest;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Event::listen(Registered::class, function ($event) {
            $user = $event->user;

            // Check if the user already has a guest profile to avoid duplicates
            if (!$user->guest) {
                Guest::create([
                    'user_id' => $user->id,
                    'first_name' => $user->name,
                    'email' => $user->email,
                    'last_name' => '',
                    'plus1' => 0,
                ]);
            }
        });
    }


}


