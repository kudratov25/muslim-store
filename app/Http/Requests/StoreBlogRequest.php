<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{

    public function attributes()
{
    return [
        'title' => 'Product name',
        // 'image' => "Mb.",
        
    ];
}
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
            'image'=>'nullable|image|max:2048',
            'title' => 'required |max:255' ,
            'short_text' => 'required',
            'content' => 'required',
            'text_headline' => 'required',
        ];
    }
}
