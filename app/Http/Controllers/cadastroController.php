<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cadastroController extends Controller
{
    public function index(){
        return view('Site/Cadastro/signup');
    }
    public function redirecionar(){
        return view('Site/Home/index');
    }
}
