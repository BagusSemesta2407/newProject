<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
        $rules=[
            'name'=>'required',
            'file'=>'required|file',
            'kategori_id'=>'required'
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama Project Wajib Diisi',
            'file.required'        => 'File Project Wajib Diisi',
            'kategori_id.required'        => 'Kategori Wajib Diisi',
        ];
    }
}
