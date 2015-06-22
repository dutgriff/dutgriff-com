<?php namespace DutGRIFF\Services;

class GreaterThanFieldValidator {

    public function validateGreaterThanField($attribute, $value, $parameters, $validator)
    {
        return floatval($value) > floatval($validator->getData()[$parameters[0]]);
    }

}