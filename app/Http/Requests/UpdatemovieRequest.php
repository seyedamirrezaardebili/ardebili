<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatemovieRequest extends FormRequest
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
            'status'=>'string|in:draft,published,deleted|sometimes',
            'title'=>'string|sometimes',
            'File'=> 'mimes:mp4|max:20000|sometimes',
            'text1'=>'string|sometimes',
            'text2'=>'string|sometimes',
            'text3'=>'string|sometimes',
        ];
    }
}
