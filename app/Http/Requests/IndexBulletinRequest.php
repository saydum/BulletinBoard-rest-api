<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexBulletinRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sort_by' => 'in:price,created_at|nullable',
            'sort_direction' => 'in:asc,desc|nullable',
            'page' => 'integer|min:1|nullable',
            'per_page' => 'integer|min:1|max:100|nullable',
        ];
    }
}
