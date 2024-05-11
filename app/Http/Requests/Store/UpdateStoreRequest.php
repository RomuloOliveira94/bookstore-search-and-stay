<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'string|required|max:255',
            'address' => 'string|required|max:255',
            'active' => 'nullable|boolean'
        ];
    }
}
