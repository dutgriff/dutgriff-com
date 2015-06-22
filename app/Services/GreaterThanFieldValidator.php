<?php namespace DutGRIFF\Services;

use Illuminate\Validation\Validator;

class GreaterThanFieldValidator extends Validator {

    public function validateGreaterThanField($attribute, $value, $parameters)
    {
        return floatval($value) > floatval($this->data[$parameters[0]]);
    }

}