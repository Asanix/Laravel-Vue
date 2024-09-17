<?php

namespace App\Http\Requests\Person;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'age' => 'required|integer',
            'job' => 'required|string',
        ];
    }
}
