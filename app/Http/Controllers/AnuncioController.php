<?php

namespace App\Http\Controllers;

use App\Estado;
use App\Anuncio;
use App\Condicion;
use App\Municipio;
use App\TipoCarros;
use App\Combustible;
use App\Marca;
use App\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AnuncioController extends Controller
{

    public function byState($id)
    {
        return Municipio::where('estado_id', $id)->get();
    }

    public function byBrands($id)
    {
        return Modelo::where('marca_id', $id)->get();
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario = auth()->user();

        $anuncios = Anuncio::where('user_id', $usuario->id)->paginate(10);

        return view('anuncios.index', compact('anuncios', 'usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoCarros = TipoCarros::all(['id', 'nombre']);
        $combustible = Combustible::all(['id', 'tipo']);
        $condicion = Condicion::all(['id', 'estado']);
        $estado = Estado::all();
        $municipio = Municipio::all(['id', 'municipio','estado_id']);
        $marca = Marca::all(['id', 'marca']);
        $modelo = Modelo::all(['id', 'modelo','marca_id']);

        //dd($municipio1);

        return view('anuncios.create', compact('tipoCarros', 'combustible', 'condicion', 'municipio', 'estado', 'marca', 'modelo'));
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
            'titulo'=> 'required|min:2',
            'año' => 'required',
            'combustible' => 'required',
            'condicion' => 'required',
            'tipo_carro'=>'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje'=>'required',
            'municipio' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'modelo'=>'required',

        ]);

        //Almacenar datos con modelo
        auth()->user()->anuncios()->create([
            'titulo'=> $data['titulo'],
            'marca_id' => $data['marca'],
            'modelo_id' => $data['modelo'],
            'año' => $data['año'],
            'carro_id'=> $data['tipo_carro'],
            'combustible_id' => $data['combustible'],
            'condicion_id' => $data['condicion'],
            'total_puertas' => $data['total_puertas'],
            'precio' => $data['precio'],
            'kilometraje' => $data['kilometraje'],
            'municipio_id' => $data['municipio'],
            'estado_id' => $data['estado'],
            'descripcion' => $data['descripcion'],
            //'imagen' => $data['imagen'],
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

        $tipoCarros = TipoCarros::all(['id', 'nombre']);
        $tipoCombustible = Combustible::all(['id', 'tipo']);
        $condicionCarro = Condicion::all(['id', 'estado']);
        $municipioCarro = Municipio::all(['id', 'municipio']);
        $estadoCarro = Estado::all(['id', 'estado']);

        return view('anuncios.edit', 
               compact('tipoCarros','tipoCombustible','condicionCarro','anuncio','municipioCarro', 'estadoCarro'));
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
            'titulo'=> 'required|min:2',
            'año' => 'required',
            'tipo_carro'=>'required',
            'combustible'=>'required',
            'condicion'=>'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje'=>'required',
            'municipio' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',

        ]);

        //Asignar valores
        $anuncio->titulo = $data['titulo'];
        $anuncio->año = $data['año'];
        $anuncio->carro_id = $data['tipo_carro'];
        $anuncio->combustible_id = $data['combustible'];
        $anuncio->condicion_id = $data['condicion'];
        $anuncio->total_puertas = $data['total_puertas'];
        $anuncio->precio = $data['precio'];
        $anuncio->kilometraje = $data['kilometraje'];
        $anuncio->descripcion = $data['descripcion'];
        $anuncio->municipio_id = $data['municipio'];
        $anuncio->estado_id = $data['estado'];

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

    public function imagen(Request $request)
    {
        $imagen = $request->file('file');

        $nameImage = time().'.'.$imagen->extension();

        $ruta = storage_path().'/app/public/images/'.$nameImage;

        dd($ruta);
        
        return response()->json(['correcto' => $nameImage]);
    }

    // Borrar imagen vía Ajax
    public function borrarimagen(Request $request)
    {
        if($request->ajax())
        {
            $imagen =  $request->get('imagen');

            if( File::exists( 'storage/images/'.$imagen ) )
            {
                File::delete( 'storage/images/'.$imagen );
            }

            return response('Imagen eliminada', 200);
        }
    }
}
