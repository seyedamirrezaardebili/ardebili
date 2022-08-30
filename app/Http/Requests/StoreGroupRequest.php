<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroupRequest extends FormRequest
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
           'body'=>'string|required',
           'title'=>'string|required',
           'slug'=>'string|sometimes',
           'File'=>'sometimes|image',
           'status'=>'string|in:draft,published,deleted|required',
           'id'=>'sometimes',


        ];
    }
}
