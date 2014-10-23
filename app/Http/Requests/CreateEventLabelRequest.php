<?php namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateEventLabelRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		/** @var User $currentUser */
		$currentUser = $this->container['auth']->user();

		return [
			'name' => ['required', 'unique:event_labels,name,NULL,id,user_id,' . $currentUser->id],
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return $this->container['auth']->check();
	}

}
