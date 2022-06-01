<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array
     */
    public function rules()
    {
        $nameRules = array('required', "regex:/\b([A-ZÀ-ÿ][-,a-z. ']+[ ]*)+/", 'max:255');
        $idRules = 'integer|numeric';

        return [
            'email' => 'required|email:rfc,dns|unique:users|max:255',
            'password' => 'required|between:5,255',
            'first_name' => $nameRules,
            'last_name' => $nameRules,

            'role_id' => $idRules,
            'is_active' => $idRules
        ];
    }
}
