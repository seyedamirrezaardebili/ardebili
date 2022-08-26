<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreprofileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'string|required',
            'phone'=>'numeric|required',
            'mobile'=>'numeric|sometimes',
            'email'=>'email|sometimes',
            'fax'=>'numeric|sometimes',
            'about_me'=>'string|required',
            'number_project'=>'numeric|required',
            'profit'=>'numeric|required',
            'Fund'=>'numeric|required',
            'Growth'=>'numeric|required',
            'File'=>'image|sometimes',
        ];
    }
}
