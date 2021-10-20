<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourierRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric|phone_number|unique:couriers,phone,'.$this->id,
            'email' => 'required|email|unique:couriers,email,'.$this->id,
            'address' => 'required|string',
            'password' => 'required_without:id|confirmed',
            'password_confirmation' => 'required_without:id',
        ];
    }
}
