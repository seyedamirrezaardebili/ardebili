<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupDelateRequest extends FormRequest
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
           'name'=>'string|sometimes',
           'body'=>'string|sometimes',
           'title'=>'string|sometimes',
           'slug'=>'string|sometimes',
           'File'=>'sometimes|image',
           'status'=>'sometimes|string|in:draft,published,deleted|required',
           'id'=>'sometimes',


        ];
    }
}
