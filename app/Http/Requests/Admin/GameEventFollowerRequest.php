<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GameEventFollowerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_community' => 'required',
            'game_event_id' => 'required',
            'owner_id' => 'required',
            'platform' => 'nullable',
            'member' => 'required',
            'description' => 'nullable',
            'user_id' => 'required'
        ];
    }
}
