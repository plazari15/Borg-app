<?php

namespace borg\Service\Market;

use borg\Itens;
use borg\Notifications\NewOrderCreated;
use borg\Notifications\NewOrderCreatedBorg;
use borg\Orders;
use DebugBar\DebugBar;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use League\Flysystem\Exception;

class CreateOrder
{
    protected $cart;
    protected $order;
    /**
     * Inicia todo o processo da classe!
     * CreateOrder constructor.
     */
    public function __construct()
    {
        $this->cart = Cart::content();
        $this->checkStock();
    }

    /**
     * Verifica o estoque para este item e atualiza substituindo a quantidade solicitada pelo cliente.
     */
    protected function checkStock()
    {
       DB::beginTransaction();
       try{
           foreach ($this->cart as $item){
               $unit = Itens::find($item->id);
               $qtd = !empty($unit->quantity) ? $unit->quantity : $unit->weight;

               if($qtd >= $item->qty){
                   if(!empty($unit->quantity)){
                       $unit->quantity = $unit->quantity - $item->qty;
                   }else{
                       $unit->weight = $unit->weight - $item->qty;
                   }
                   $unit->save();
               }
           }
           DB::commit();
           $this->addItensToOrder();
           Session::flash('error', 'INfelizmente não foi possível processar sua compra devido a falta de estoque para um de nossos itens em cotação');
       }catch (Exception $e){
           DB::rollback();
           DebugBar::addException($e);
       }

    }

    /**
     * Cria a compra no sistema
     * @return mixed
     */
    protected function createOrder(){
       $order = Auth::user()->orders()->create(['status' => 'aguardando']);

       return $order;
    }

    /**
     * Salva os itens adquiridos
     */
    protected function addItensToOrder()
    {
        DB::beginTransaction();
        try{
            $this->order = $this->createOrder();
            foreach ($this->cart as $cart) {
                $this->order->orderItens()->create([
                    'itens_id' => $cart->id,
                    'quantity' => $cart->qty,
                    'price' => $cart->price,
                    'program' => $cart->options->program
                ]);
            }
            DB::commit();
            $this->notyUsers();
        }catch(Exception $e){
            DB::rollback();
            DebugBar::addException($e);
        }
    }

    /**
     * Sistema de Notificações
     */
    protected function notyUsers()
    {
        Auth::user()->notify(new NewOrderCreated(Auth::user()));
        Notification::send(new NewOrderCreatedBorg(Auth::user(), $orders))
        dd($this->order);
    }
}