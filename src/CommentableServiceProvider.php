<?php

namespace RealRipley\Commentable;

use Illuminate\Support\ServiceProvider;

class CommentableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../migrations') => database_path('migrations') 
        ], 'migrations');
    }

    public function register()
    {

    }
}