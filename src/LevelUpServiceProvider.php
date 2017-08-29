<?php

namespace HughWilly\LevelUp;

use Illuminate\Support\ServiceProvider;

class LevelUpServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('model-helper', function () {
            return new ModelHelper;
        });

        $this->app->alias('model-helper', ModelHelper::class);
    }
}
