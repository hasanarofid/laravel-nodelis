<?php

namespace App\Providers;

use App\Http\Controllers\WebSocketController;

class WebSocketServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->make('pubsub')
            ->subscribe(new WebSocketController);
    }
}