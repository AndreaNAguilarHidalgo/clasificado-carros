<?php

namespace App\Http\Controllers;

use App\Anuncio;
use App\Combustible;
use App\Marca;
use App\TipoCarros;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InicioController extends Controller
{
    public function index()
    {
        $nuevas = Anuncio::latest()->take(6)->get();

        $marcas = Marca::all();
        $tipoAuto = TipoCarros::all();
        $combustible = Combustible::all();
        // Agrupar los anuncios por marca
        $anuncios = [];

        foreach ($marcas as $marca) {
            $anuncios[Str::slug($marca->marca)][] = Anuncio::where('marca_id', $marca->id)->take(3)->get();
        }

        return view('inicio.index', compact('nuevas', 'anuncios', 'marcas', 'tipoAuto', 'combustible'));
    }
}
