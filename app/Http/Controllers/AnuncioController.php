<?php

namespace App\Http\Controllers;

use App\Marca;
use App\Estado;
use App\Modelo;
use App\Anuncio;
use App\Condicion;
use App\Municipio;
use App\TipoCarros;
use App\Combustible;
use App\Gallery;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\FuncCall;

class AnuncioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'search', 'byState', 'byBrands']]);
    }

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
        $municipio = Municipio::all(['id', 'municipio', 'estado_id']);
        $marca = Marca::all(['id', 'marca']);
        $modelo = Modelo::all(['id', 'modelo', 'marca_id']);
        $images = Gallery::all(['id', 'url', 'imageable_id']);

        //dd($municipio1);

        return view('anuncios.create', compact('tipoCarros', 'combustible', 'condicion', 'municipio', 'estado', 'marca', 'modelo', 'images'));
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
            'año' => 'required',
            'combustible' => 'required',
            'condicion' => 'required',
            'tipo_carro' => 'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'imagenes.*' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048'

        ]);

        $urlimagenes = [];

        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');

            foreach ($imagenes as $imagen) {

                $filename = time() . '_' . trim($imagen->getClientOriginalName());
                $path = '/public/images';
                $imagen = $imagen->storeAs($path, $filename);
                $urlimagenes[]['url'] = 'storage/images/' . $filename;
            }

            $anuncio = new Anuncio();
            $anuncio->user_id = Auth::user()->id;
            $anuncio->marca_id = $data['marca'];
            $anuncio->modelo_id = $data['modelo'];
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

            $anuncio->images()->createMany($urlimagenes);
        }
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
        $marcaCarro = Marca::all(['id', 'marca']);
        $modeloCarro = Modelo::all(['id', 'modelo']);
        $images = Gallery::all(['id', 'url', 'imageable_id']);

        return view(
            'anuncios.edit',
            compact(
                'tipoCarros',
                'tipoCombustible',
                'condicionCarro',
                'anuncio',
                'municipioCarro',
                'estadoCarro',
                'marcaCarro',
                'modeloCarro',
                'images'
            )
        );
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
            'año' => 'required',
            'tipo_carro' => 'required',
            'combustible' => 'required',
            'condicion' => 'required',
            'total_puertas' => 'required',
            'precio' => 'required',
            'kilometraje' => 'required',
            'municipio' => 'required',
            'estado' => 'required',
            'descripcion' => 'required',
            'marca' => 'required',
            'modelo' => 'required',
            'imagenes.*' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048'

        ]);

        $urlimagenes = [];

        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');

            foreach ($imagenes as $imagen) {

                $filename = time() . '_' . trim($imagen->getClientOriginalName());
                $path = '/public/images';
                $imagen = $imagen->storeAs($path, $filename);
                $urlimagenes[]['url'] = 'storage/images/' . $filename;
            }

            //Asignar valores
            $anuncio->marca_id = $data['marca'];
            $anuncio->modelo_id = $data['modelo'];
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

            $anuncio->images()->createMany($urlimagenes);
        }
        // Redirección
        return redirect()->action('AnuncioController@index')->with('datos', 'Datos actualizados correctamente!');
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

        $anuncio->with('images');

        foreach ($anuncio->images as $image) {
            $archivo = substr($image->url, 1);
            File::delete($archivo);
            $image->delete();
        }
        $anuncio->delete();

        // Redireccionamiento
        return redirect()->action('AnuncioController@index');
    }

    // Función para búsqueda en el index
    public function search(Request $request)
    {
        if (
            (!is_null($request->priceMin) || !is_null($request->priceMax)) || !is_null($request->marca) ||
            !is_null($request->doors) || !is_null($request->combustible) || !is_null($request->tipoCarro)
        ) {

            $searchBrand = $request->get('marca');
            $searchDoors = $request->get('doors');
            $searchFuel = $request->get('combustible');
            $searchCar = $request->get('tipoCarro');
            $searchPrice = $request->get('priceRange');
            $searchPriceMin = $request->get('priceMin');
            $searchPriceMax = $request->get('priceMax');


            $anuncios = Anuncio::orderBy('id', 'DESC')
                ->Marca($searchBrand)
                ->Doors($searchDoors)
                ->Combustible($searchFuel)
                ->tipoCarro($searchCar)
                ->Precio($searchPriceMin, $searchPriceMax)
                ->paginate(4);
                
            $contador = $anuncios->count();

            return view('busquedas.show', compact(
                'anuncios',
                'searchBrand',
                'searchDoors',
                'searchFuel',
                'searchCar',
                'contador',
                'searchPriceMin',
                'searchPriceMax'
            ));
        } else {
            return redirect()->action('InicioController@index');
        }
    }
}
