<?php

namespace borg\Http\Requests\Admin;

use borg\Account;
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
        $account = Account::find($this->id);

        $this->rules['name'] = ['required'];
        $this->rules['email'] = ['required', 'email'];
        $this->rules['social'] = ['required'];
        $this->rules['website'] = ['url'];
        $this->rules['phone'] = ['required'];
        $this->rules['occupation'] = ['required', 'in:cooperativa,fornecedor,comprador'];
        $this->rules['cep'] = ['required'];
        $this->rules['address'] = ['required'];
        $this->rules['number'] = ['required'];
        $this->rules['district'] = ['required'];
        $this->rules['city'] = ['required'];
        $this->rules['state'] = ['required'];
        $this->rules['country'] = ['required'];

        if(empty($account->cnpj) OR $account->cnpj != $this->cnpj){
            $this->rules['cnpj'] = ['required', 'max:20', 'unique:accounts'];
            $this->rules['certificado'] = ['required_if:occupation,fornecedor'];
        }else{
            $this->rules['cnpj'] = ['required', 'max:20'];
        }

        return $this->rules;
    }

    public function messages()
    {
        return [
            'social.required' => 'O campo razão social é obrigatório',
            'certificdo.required' => 'O campo de certificado é obrigatório'
        ];
    }
}
