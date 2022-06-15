<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestValidateCategory extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => [
                'required',
                'min:3',
                'unique:App\Models\Category,category_title',
            ],

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute bắt buộc phải điển',
            'min' => ':attribute tối thiểu cần 3 ký tự',
            'unique' => ':attribute đã tồn tại vui lòng kiểm tra lại',
        ];
    }
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề danh mục',
        ];
    }
}
