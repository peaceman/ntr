<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StartEventRequest extends FormRequest {

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$user = $this->container['auth']->user();

		if (is_numeric($this->get('event_label_id'))) {
			return [
				'event_label_id' => ['required', 'exists:event_labels,id,user_id,' . $user->id],
			];
		} else {
			return [
				'event_label_id' => ['required'],
			];
		}
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
