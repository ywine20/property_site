<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoresiteProgressRequest extends FormRequest
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
            'project_id' => 'required|integer',
            'title' => 'required|string|min:3|max:1000',
            'description' => 'required|string|min:3',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048|min:8',
        ];
    }
}