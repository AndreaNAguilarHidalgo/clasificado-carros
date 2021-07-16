<?php

namespace App\Http\Controllers;

use SplStack;
use App\Posts;
use App\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Jsonable;
use JsonSerializable;

use function PHPUnit\Framework\isJson;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'imagenes:*' => 'image|mimes:jpeg,jpg,png,svg,gif|max:2048'
        ]);

        $urlimagenes = [];

        if($request->hasFile('imagenes')){
            $imagenes = $request->file('imagenes');
            
            foreach($imagenes as $imagen){

                $filename = time() .'_' . trim($imagen->getClientOriginalName());
                $path = 'public/images';
                $imagen = $imagen->storeAs($path, $filename);
                $urlimagenes[]['url'] = $imagen;
            }
            
            $post = new Posts();

            $post->name = $request->name;
            $post->email = $request->email;
            $post->save();

            $post->images()->createMany($urlimagenes);

            return view('posts.index');
        }

        /*$post = new Posts();
        $urlimages = [];

        $post->name = $request->name;
        $post->email = $request->email;
        $post->save();

        if ($request->file('file')) {
            $path = 'public/images';

            //Multiple file upload
            $files = $request->file('file');

            if (!is_array($files)) {
                $files = [$files];
            }

            //loop throu the array 
            for ($i = 0; $i < count($files); $i++) {

                $file = $files[$i];
                $filename = time() . "_$i" . '.' . $file->clientExtension();
                $file= $file->storeAs($path, $filename);
                $urlimages[]['url'] = $file; 

                $images = new Gallery();
                $images->url = $file;
                $images->save();
                
            }

            
            
            return response()->json(['message' => 'file uploaded'], 200);
        } else {
            return response()->json(['message' => 'error uploading file'], 503);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $posts)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Posts  $posts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $posts)
    {
        //
    }
}
