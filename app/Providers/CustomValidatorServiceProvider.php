<?php namespace DutGRIFF\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Factory;

class CustomValidatorServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        $this->registerValidationRules($this->app['validator']);
	}

    /**
     * Register the validation rules.
     *
     * @param Factory $validator
     */
	public function registerValidationRules(Factory $validator)
	{
        $validator->extend('greater_than_field','DutGRIFF\Services\GreaterThanFieldValidator@validateGreaterThanField', 'The :attribute must be greater than the :other.');
        $validator->extend('array_no_duplicates', 'DutGRIFF\Services\ArrayNoDuplicatesValidator@validateArrayNoDuplicate', 'The :attribute array must have no duplicates.');

        $validator->replacer('greater_than_field', function($message, $attribute, $rule, $parameters)
        {
            return str_replace(':other', $parameters[0], $message);
        });
	}

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}
