<?php

namespace App\Http\Requests\Product;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Upsert extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'price' => 'required|numeric'
        ];
        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        $data = $validator->errors();
        $response = response()->json($data->messages(), 422);
        throw new HttpResponseException($response);
    }
}
