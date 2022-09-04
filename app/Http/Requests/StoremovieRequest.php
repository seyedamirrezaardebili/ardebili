<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoremovieRequest extends FormRequest
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
            'status'=>'string|in:draft,published,deleted|required',
            'title'=>'string|required',
            'File'=> 'mimes:mp4|max:20000|required',
            'text1'=>'string|required',
            'text2'=>'string|required',
            'text3'=>'string|required',
        ];
    }
}
