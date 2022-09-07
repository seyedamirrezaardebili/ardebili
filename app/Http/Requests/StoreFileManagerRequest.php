<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFileManagerRequest extends FormRequest
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
            'key'=>'string|in:header,,down|sometimes',
            'status'=>'string|in:draft,published,deleted|sometimes',
            'title'=>'string|sometimes',
            'File'=>'image|sometimes',
            'id'=>'sometimes',
        ];
    }
}
