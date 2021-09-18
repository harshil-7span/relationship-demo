<?php

namespace App\Http\Requests\Review;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Upsert extends FormRequest
{
    public function rules()
    {
        $rules = [
            'review_type' => 'required|in:order,product',
            'review' => 'required',
            'user_id' => 'required|exists:users,id'
        ];
        if($this->review_type == 'order'){
            $rules += [
                'type_id' => 'required|exists:orders,id',
            ];
        } else {
            $rules += [
                'type_id' => 'required|exists:products,id'
            ];
        }
        return $rules;
    }

    public function failedValidation(Validator $validator)
    {
        $data = $validator->errors();
        $response = response()->json($data->messages(), 422);
        throw new HttpResponseException($response);
    }
}
