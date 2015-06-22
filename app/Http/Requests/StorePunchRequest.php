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
        // tags can't be attached more than once per punch
        // name should be < 40 character
        // description should be < than 100 character
        return [
            'start'       => 'required|integer',
            'end'         => 'integer|greater_than_field:start',
            'name'        => 'required',
            'description' => '',
            'tags'        => 'array|exists:punch_tags,id'
		];
	}

}
