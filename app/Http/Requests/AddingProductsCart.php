<?php

namespace borg\Http\Requests;

use borg\Itens;
use Illuminate\Foundation\Http\FormRequest;

class AddingProductsCart extends FormRequest
{
    public $itens;

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
        $item = Itens::find($this->item_id);
        $this->itens = $item;
        return [
            "item_id" => "required|numeric",
            "qtd" => "required|numeric|between:0,{$item->quantity}"
        ];
    }

    public function messages()
    {
        return [
            "item_id.required" => 'Encontramos um problema ao obter o item id',
            "item_id.numeric" => 'Encontramos um problema ao obter o item id',


            "qtd.required" => 'Campo quantidade é obrigatório',
            "qtd.between" => 'Campo quantidade deve receber um valor entre 0 e '.$this->itens->quantity,
            "qtd.numeric" => 'Campo quantidade deve receber um valor numérico',

        ];
    }
}
