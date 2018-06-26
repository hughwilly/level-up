<?php

namespace HughWilly\LevelUp;

use HughWilly\LevelUp\Traits\Validatable;
use Illuminate\Database\Eloquent\Model;

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
    public function create($model, array $attributes = []): Model
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
    public function make($model, array $attributes = []): Model
    {
        return static::fill(new $model, $attributes);
    }

	/**
	 * Fill attributes on a model instance
	 *
	 * @param  \Illuminate\Database\Eloquent\Model|Validatable $instance
	 * @param  array $attributes
	 *
	 * @param bool $save
	 * @return \Illuminate\Database\Eloquent\Model
	 */
    public function fill($instance, array $attributes = [], $save = false): Model
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
