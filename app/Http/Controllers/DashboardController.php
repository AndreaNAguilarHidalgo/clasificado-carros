<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Modelo;
use App\Anuncio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    
    public function index(Request $request)
    {
        $usuario = auth()->user();
        $anuncios = Anuncio::where('user_id', $usuario->id)->paginate(10);
        $marcaCarro = Marca::all(['id', 'marca']);
        $modeloCarro = Modelo::all(['id', 'modelo']);

        $request->user()->authorizeRoles(['admin', 'user']);

        if(($request->user()->hasRole('user')))
        {
            return view('dashboards.anunciante', compact('anuncios', 'marcaCarro', 'modeloCarro'));
        }
        else
        {
            return view('dashboards.administrador');
        }
        
    }
}