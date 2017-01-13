<?php

namespace borg\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class Item extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'goodto' => 'required|in:venda,processamento',
            'type' => 'required|in:naturais,industrializados',
            'weight' => 'required_without_all:quantity',
            'quantity' => 'required_without_all:weight',
            'foto' => 'required'
        ];
    }
}
