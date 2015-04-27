<?php namespace App\Http\Requests;

use App\Http\Requests\Request;



class StoreArticleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$authorized = false;

		if ( ! \Auth::guest() )
		{
			if ( \Auth::user()->hasRole(['owner', 'admin']))
			{
				$authorized = true;
			}
		}

		return $authorized;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'meta_description' => 'required',
			'title' => 'required',
			'content' => 'required',
			'publish_on' => 'required|date_format:m/d/Y h:i A'
		];
	}

}
