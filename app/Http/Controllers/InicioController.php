<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Marca;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{   
    public function index()
    {
        $nuevos = Anuncio::latest()->take(6)->get();
        $anuncio = Anuncio::latest()->take(6)->get();

         // Agrupar las recetas por categoria
         $anuncios = [];

         $marcas = [];

         foreach($marcas as $marca) {
             $anuncios[ Str::slug( $marca->nombre ) ][] = Anuncio::where('marca_id', $marca->id )->take(3)->get();
         }

        return view('inicio.index', compact('nuevos', 'marcas', 'anuncio'));
    }
}
