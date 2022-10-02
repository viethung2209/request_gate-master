<?php

namespace App\Http\Requests\Api\Deparments;

use App\Http\Requests\Api\ApiRequest;
use App\Models\Department;

class DepartmentRequest extends ApiRequest
{
    /**
     * Get custom rules for validator errors.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'per_page' => 'integer|min:1',
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'status' => 'required|in:'.Department::ENABLE.','.Department::DISABLE,
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            //
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            //
        ];
    }
}
