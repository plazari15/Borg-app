<?php

namespace borg\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    protected $rules;
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
            'pass' => "required|password:{$this->rpass}",
            'rpass' => "required",
        ];
    }

    public function messages()
    {
      return [
          'pass.password' => 'As senhas não são iguais'
      ]; //
    }
}
