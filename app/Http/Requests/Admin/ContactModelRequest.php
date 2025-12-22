<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Symfony\Contracts\Service\Attribute\Required;

class ContactModelRequest extends FormRequest
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
            'foto' => 'nullable',
            'location' => 'required',
            'telepon' => 'required',
            'email' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'foto.nullable' => 'foto wajib diisi',
            'location.required' => 'Lokasi wajib diisi',
            'telepon.required' => 'Nomor telepon wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid'
        ];
    }
}
