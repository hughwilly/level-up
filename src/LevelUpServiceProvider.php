<?php

namespace HughWilly\LevelUp;

use Illuminate\Support\ServiceProvider;

class LevelUpServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->app->singleton(ModelHelper::class, function () {
            return new ModelHelper;
        });
    }

    public function provides(): array
    {
        return [ModelHelper::class];
    }
}
