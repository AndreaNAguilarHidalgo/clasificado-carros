<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }
    
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['user', 'admin']);

        return view('inicio.index');
    }
}
