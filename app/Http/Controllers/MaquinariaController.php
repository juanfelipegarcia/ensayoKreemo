<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaquinariaController extends Controller
{
    public function index(){
        return view('maquinaria.index');
    }
}
