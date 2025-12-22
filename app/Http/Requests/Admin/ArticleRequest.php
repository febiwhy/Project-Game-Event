<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // PERBAIKI: ganti 'prig' jadi 'png'
        ];

        // Jika update, image tidak required
        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $rules['image'] = 'sometimes|image|mimes:jpeg,png,jpg|max:2048';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul wajib diisi',
            'content.required' => 'Deskripsi content wajib diisi',
            'image.required' => 'Gambar artikel wajib diupload',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg', // PERBAIKI pesan error juga
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ];
    }
}
