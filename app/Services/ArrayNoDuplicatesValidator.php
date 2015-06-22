<?php namespace DutGRIFF\Services;

class ArrayNoDuplicatesValidator {

    public function validateArrayNoDuplicate($attribute, $value, $parameters, $validator)
    {
        return count($value) === count(array_unique($value));
    }

}