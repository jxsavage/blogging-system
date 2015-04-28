<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreArticlePictureRequest extends Request {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->userHasRole(['owner', 'admin']);
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
        //Add the picture to the request for easy validation.
        $this->request->set('picture', $this->files->all()['picture']);

		$rules = [
            'article_id' => ['required', 'integer'],
            'picture' => ['required', 'mimes:jpg,jpeg,png,bmp'],
		];

//        foreach ($this->files->get('pictures') as $key => $val)
//        {
//            $rules['pictures.'.$key] = ['required', 'mimes:jpg,jpeg,png,bmp'];
//        }

        return $rules;
	}

}
