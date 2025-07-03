<?php

namespace App\Http\Controllers\Unit\Validations;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UnitUserStoreValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * validateError to make this request.
     */
    public function validateError($data)
    {
        $errorPayload =  $data->getMessages();
        return response(['status' => 'validation_error', 'errors' => $errorPayload], 422);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException($this->validateError($validator->errors()));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //user table data
            'user_class_id' => ['required'],
            'unit_id' => ['sometimes', 'required', Rule::exists('org_units', 'id')],
            'full_name' => ['required'],
            'phone' => ['required'],
            'image' => ['nullable'],
            'telegram_id' => 'nullable|unique:users,telegram_id',
            'email' => ['required','unique:users'],
            'password' => ['required'],
            'blood_group' => ['nullable'],
            'educational_qualification' => ['nullable'],
            'age' => ['nullable'],
            'is_permitted' => ['sometimes', Rule::in([0,1])],
            'status' => ['sometimes', Rule::in([0,1])],

            //org_unit_responsible table data
            'responsibility_id' => ['nullable'],
            
            // 'short_description' => 'required|sometimes',
        ];
    }
}
