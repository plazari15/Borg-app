<?php

namespace borg\Http\Controllers\Admin;

use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

class ItensController extends Controller
{
    public function index(){
        return view('itens.index');
    }
}
