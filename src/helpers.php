<?php

if (! function_exists('create')) {
    /**
     * Create an eloquent model using the appropriate factory
     *
     * @param  string  $model
     * @param  array   $args
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function create($model, $args = [])
    {
        return factory($model)->create($args);
    }
}

if (! function_exists('make')) {
    /**
     * Makes an eloquent model using the appropriate factory
     *
     * @param  string  $model
     * @param  array   $args
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    function make($model, $args = [])
    {
        return factory($model)->make($args);
    }
}
