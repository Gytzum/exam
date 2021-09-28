<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
                'title' => 'required|unique:books,title|min:5|max:255',
                'pages' => 'required|integer',
                'isbn' => 'required|max:64|min:5',
                'short_description' => 'max:1000',
            ])
        ];
    }
}
