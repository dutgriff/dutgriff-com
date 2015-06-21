<?php namespace DutGRIFF\Http\Requests;

use DutGRIFF\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class StorePunchRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return Auth::check();
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        // Future validation:
        // end can't be after start
        // tags must all be id's of tags
        // tags can't be attached more than once per punch
        return [
            'start'       => 'required|integer',
            'end'         => 'integer',
            'name'        => 'required',
            'description' => '',
            'tags'        => 'array'
		];
	}

}
