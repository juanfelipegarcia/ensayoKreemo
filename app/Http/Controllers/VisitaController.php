<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisitaController extends Controller
{
    public function index(){
        return view('visita.index');
    }
}

