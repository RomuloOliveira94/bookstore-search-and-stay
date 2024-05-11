<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'string|max:255|required',
            'address' => 'string|max:255|required',
            'active' => 'nullable|boolean'
        ];
    }
}
