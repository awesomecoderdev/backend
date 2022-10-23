<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Lang;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => "required|string|min:2",
            "last_name" => "required|string|min:2",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:8|max:12",
            "confirmed" => "required|same:password",
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    // public function attributes()
    // {
    //     return [
    //         "name" => "required",
    //         "email" => "required|email|unique:users,email",
    //         "password" => "required|min:8|max:12",
    //         "confirmed" => "required|same:password",
    //     ];
    // }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            "first_name.required" => Lang::get("auth.first_name.required"),
            "last_name.required" => Lang::get("auth.last_name.required"),
            "email.required" => Lang::get("auth.email.required"),
            "password.required" => Lang::get("auth.password.required"),
            "confirmed.required" => Lang::get("auth.confirmed.required"),
        ];
    }


    /**
     * @throws \HttpResponseException When the validation rules is not valid
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => [],
            'error'     => $validator->errors(),
        ]));
    }
}
