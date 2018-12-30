<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AtLeastOneNum;


class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                new AtLeastOneNum()
            ], 
            'terms' => 'accepted'
        ];
    }
}
