<?php

namespace borg\Providers;

use Event;
use Illuminate\Support\ServiceProvider;

class CreateNewToken extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Event::listen('user.change', function ($user){
            $user->api_token = str_random(60);

            $user->save();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}
