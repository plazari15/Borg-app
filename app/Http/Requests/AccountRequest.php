<?php

namespace borg\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AccountRequest extends FormRequest
{
    protected $rules = [];
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
//        $this->rules['cnpj'] = ['required', 'max:20', 'unique:accounts'];
        return [
            'name' => 'required',
            'email' => 'required|email',
            'cnpj' => 'required|max:20|unique:accounts|',
            'social'  => 'required',
            'website'  => 'url',
            'occupation'  => 'required|numeric',
            'cep'  => 'required',
            'address'  => 'required',
            'number'  => 'required',
            'complement'  => 'required',
            'district'  => 'required',
            'city'  => 'required',
            'state'  => 'required',
            'country'  => 'required',
//            'logomarca'  => 'required|image',
//            'certificado'  => 'required|file',
        ];
    }
}
