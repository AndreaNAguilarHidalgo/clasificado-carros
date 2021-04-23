<?php

namespace App\Http\Controllers;

use App\Anuncio;
use Illuminate\Http\Request;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();

        $anuncios = Anuncio::where('user_id', $usuario->id)->paginate(10);

        return view('anuncios.index')->with('anuncios', $anuncios)->with('usuario', $usuario);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anuncios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación
        $data = $request->validate([
            'titulo'=> 'required|min:6',
            'año' => 'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje'=>'required',
            'descripcion' => 'required'

        ]);

        //Almacenar datos con modelo
        auth()->user()->anuncios()->create([
            'titulo'=> $data['titulo'],
            'año' => $data['año'],
            'total_puertas' => $data['total_puertas'],
            'precio' => $data['precio'],
            'kilometraje' => $data['kilometraje'],
            'descripcion' => $data['descripcion'],
        ]);

        // Redirección
        return redirect()->action('DashboardController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function show(Anuncio $anuncio)
    {
        return view('anuncios.show', compact('anuncio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function edit(Anuncio $anuncio)
    {
        //
        $this->authorize('view', $anuncio);

        return view('anuncios.edit', compact('anuncio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anuncio $anuncio)
    {
        // Revisar el policy
        $this->authorize('update', $anuncio);

        // Validación
        $data = $request->validate([
            'titulo'=> 'required|min:6',
            'año' => 'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje'=>'required',
            'descripcion' => 'required'

        ]);

        //Asignar valores
        $anuncio->titulo = $data['titulo'];
        $anuncio->año = $data['año'];
        $anuncio->total_puertas = $data['total_puertas'];
        $anuncio->precio = $data['precio'];
        $anuncio->kilometraje = $data['kilometraje'];
        $anuncio->descripcion = $data['descripcion'];

        $anuncio->save();

         // Redirección
         return redirect()->action('AnuncioController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Anuncio  $anuncio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anuncio $anuncio)
    {
        // Revisar el policy
        $this->authorize('delete', $anuncio);

        $anuncio->delete();

        // Redireccionamiento
        return redirect()->action('AnuncioController@index');
    }
}
