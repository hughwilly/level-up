<?php

namespace HughWilly\LevelUp;

use HughWilly\LevelUp\Traits\Validatable;

class ModelHelper
{
    /**
     * Create a model
     *
     * @param  string  $model
     * @param  array   $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create($model, array $attributes = [])
    {
        $instance = static::make($model, $attributes);
        $instance->save();

        return $instance;
    }

    /**
     * Make a model without saving it to the database
     *
     * @param  string  $model
     * @param  array   $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function make($model, array $attributes = [])
    {
        return static::fill(new $model, $attributes);
    }

    /**
     * Fill attributes on a model instance
     *
     * @param  \Illuminate\Database\Eloquent\Model|Validatable  $instance
     * @param  array                                            $attributes
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function fill($instance, array $attributes = [], $save = false)
    {
        if (in_array(Validatable::class, class_uses_recursive($instance))) {
            $instance->validate($attributes);
        }

        $instance->fill($attributes);

        if ($save) {
            $instance->save();
        }

        return $instance;
    }
}
