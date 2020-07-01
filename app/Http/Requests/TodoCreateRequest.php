<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoCreateRequest extends FormRequest
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
            'title' => 'required|max:255|min:3',
            'description' => 'required|min:10|max:65535',
            'deadline' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Kérem adja meg a címet!',
            'title.max' => 'Kérem a címnek maximum 255 karakter használjon!',
            'title.min' => 'Kérem címnek minimum 3 karaktert használjon!',

            'description.required' => 'Kérem adjon meg leírást a ToDo-hoz!',
            'description.max' => 'Kérem leírásnak maximum 65535 karaktert használjon!',
            'description.min' => 'Kérem leírásnak minumum 10 karaktert kell tartalmaznia!',

            'deadline.required' => 'Kérem adja meg a ToDo határidejét!',
        ];
    }
}
