<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookFormRequest extends FormRequest
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
            'title' =>'required', 'string', 'max:255',
            'author' =>'required', 'string', 'max:255',
            'publisher' =>'required', 'string', 'max:255',
            'copyright_year' =>'required', 'date',
            'unit_price' =>'required',
            'description'=>'required', 'string', 'max:255',
        ];
    }
}
