<?php

namespace App\Http\Requests;

use App\Http\Requests\ImageUploadRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class CrudRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'post' => 'required',
            'img' => 'required|image|mimes:jpg,png,jpeg|max:2048|',
        ];
    }
}
