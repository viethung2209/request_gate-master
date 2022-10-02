<?php

namespace App\Http\Requests\Api\Books;

use App\Http\Requests\Api\ApiRequest;

class UpdateOrCreateBooksRequest extends ApiRequest
{
    /**
     * Get rules for validator errors.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|integer',
            'name' => 'required|string',
            'description' => 'nullable|string',
            'author' => 'nullable|string',
            'category_id' => 'required|integer',
            'quantity' => 'nullable|integer',
        ];
    }
}
