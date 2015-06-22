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
        return [
            'start'       => 'required|integer',
            'end'         => 'integer|greater_than_field:start',
            'name'        => 'required|min:3|max:30',
            'description' => 'max:1500',
            'tags'        => 'array|exists:punch_tags,id|array_no_duplicates'
		];
	}

}
