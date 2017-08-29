<?php

namespace HughWilly\LevelUp\Traits;

use Illuminate\Validation\ValidationException;

trait Validatable
{
    /**
     * Validates a model against its rules
     *
     * @param  array  $attributes
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validate(array $attributes = null)
    {
        if (is_null($attributes)) {
            $attributes = $this->getAttributes();
        }

        $validator = validator(
            array_intersect_key($attributes, array_flip(array_keys($this->rules()))),
            $this->rules()
        );

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    /**
     * Model validation rules
     *
     * @return array
     */
    public function rules()
    {
        return [];
    }

    /**
     * Checks if an existing model is valid
     *
     * @return bool
     */
    public function isValid()
    {
        try {
            $this->validate();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
