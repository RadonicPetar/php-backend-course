<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreZaposlenikRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ime'=>'required|min:2|max:50|regex:/^[A-ZČĆŽŠĐ]/u',
            'prezime'=>'required|min:2|max:50|regex:/^[A-ZČĆŽŠĐ]/u',
            'email'=>'required|email',
            'placa'=>'required|numeric|between:1000,10000'
        ];
    }

    public function messages(): array{
        return [
            'ime.required'=>'Ime je obavezno',
            'ime.min' => 'Ime ne smije biti manje od :min znaka',
            'ime.max' => 'Ime ne smije biti veće od :max znakova',
            'ime.regex' => 'Ime mora započeti velikim slovom',

            'prezime.required'=>'prezime je obavezno',
            'prezime.min' => 'prezime ne smije biti manje od :min znaka',
            'prezime.max' => 'prezime ne smije biti veće od :max znakova',

            'email.required'=>'Email polje je obavezno',
            'email.email' => 'Email nije u ispravnom formatu',

            'placa.required'=>'Plaća je obavezan podatak!',
            'placa.between'=>'Plaća treba biti između :min i :max!',
            'placa.numeric'=>'Plaća mora biti broj',
        ];
    }
}
