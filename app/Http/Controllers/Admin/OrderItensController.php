<?php

namespace borg\Http\Controllers\Admin;

use borg\OrderItens;
use borg\Orders;
use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class OrderItensController extends Controller
{
    public function index(){
        return view('admin.OrderItens.index');
    }

    /**
     * TODO: Corrigir o export
     */
    public function export($id){
       $pedido = Orders::find($id);

       Excel::create('Pedido #'.$pedido->id, function ($excel){
           $excel->sheet('PedidoExport', function ($sheet) {
               $sheet->rows(array(
                   array('ITEM', 'Quantidade'),
                   array('test3', 'test4')
               ));
           });
       })->download('csv');;
    }
}
