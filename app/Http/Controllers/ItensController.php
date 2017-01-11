<?php

namespace borg\Http\Controllers;

use Illuminate\Http\Request;

class ItensController extends Controller
{
    public function index(){
        return view('itens.index');
    }
}
