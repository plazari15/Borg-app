<?php

namespace borg\Http\Controllers\web;

use Illuminate\Http\Request;
use borg\Http\Controllers\Controller;

class homeController extends Controller
{
    public function index(){
        return view('web.app.layout');
    }
}
