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
        if($this->id) {
            return [
                'title' => 'required',
                'description' => 'required',
                'goodto' => 'required|in:venda,processamento',
                'measure' => 'required|in:unidades,bandeija,kilos,gramas,toneladas',
                'type' => 'required|in:naturais,industrializados',
                'weight' => 'required_without_all:quantity|required_if:measure,kilos,gramas,toneladas',
                'quantity' => 'required_without_all:weight|required_if:measure,unidades,bandeijas',
                'price' => 'required',
                'status' => 'required|in:disponivel,breve',
                'available_date' => 'required_if:status,breve',
            ];
        }
        return [
            'title' => 'required',
            'description' => 'required',
            'goodto' => 'required|in:venda,processamento',
            'measure' => 'required|in:unidades,bandeija,kilos,gramas,toneladas',
            'type' => 'required|in:naturais,industrializados',
            'weight' => 'required_without_all:quantity|required_if:measure,kilos,gramas,toneladas',
            'quantity' => 'required_without_all:weight|required_if:measure,unidades,bandeija',
            'price' => 'required',
            'status' => 'required|in:disponivel,breve',
            'available_date' => 'required_if:status,breve',
            'foto' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'quantity.required_if' => 'preencha quantidade quando você selecionar a quantidade como ":value"',
            'weight.required_if' => 'preencha peso quando você selecionar a quantidade como ":value"',
            'available_date.required_if' => 'preencha data de disponibilidade quando você selecionar a disponibilidade como ":value"'
        ];
    }
}
