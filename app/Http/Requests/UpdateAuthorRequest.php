<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
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
            $this->validate([
                'name' => 'required|string|max:64|min:5',
                'surname' =>  'required|unique:authors,surname,' . $this->author->id . ',id|max:64|min:5',
                'about' =>  'max:255|string'
            ])
        ];
    }
}
