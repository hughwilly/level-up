<?php

namespace HughWilly\LevelUp\Facades;

use Illuminate\Support\Facades\Facade;

class ModelHelper extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'model-helper';
    }
}
