<?php

namespace App\Http\Controllers;

use App\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'file' => 'required|image|max:1024'
        ]);

        $imagen = $request->file('file')->store('public/images');

        $url = Storage::url($imagen);

        Gallery::create([
            'url' => $url
        ]);*/

        //return redirect()->route('gallery.index');
        $request->validate([
            'file' => 'required|image'
        ]);

        $nameImage = Str::random(5).$request->file('file')->getClientOriginalName();
        $ruta = storage_path().'/app/public/images/'.$nameImage;

        Image::make($request->file('file'))
                            ->resize(900, null, function ($constraint){
                                $constraint->aspectRatio();
                            })
                            ->save($ruta);
        Gallery::create([
            'url' => '/storage/images/'.$nameImage
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $filename =  $request->get('filename');
        Gallery::where('filename',$filename)->delete();
        $path = public_path('uploads/gallery/').$filename;

        if (file_exists($path))
        {
            unlink($path);
        }
        return response()->json(['success'=>$filename]);
    }

    /*public function getImages()
    {
        $images = Gallery::all()->toArray();

        foreach($images as $image)
        {
            $tableImages[] = $image['filename'];
        }

        $storeFolder = public_path('uploads/gallery');
        $file_path = public_path('uploads/gallery/');
        $files = scandir($storeFolder);

        foreach ( $files as $file )
        {
            if ($file !='.' && $file !='..' && in_array($file, $tableImages))
            {       
                $obj['name'] = $file;
                $file_path = public_path('uploads/gallery/').$file;
                $obj['size'] = filesize($file_path);          
                $obj['path'] = url('public/uploads/gallery/'.$file);
                $data[] = $obj;
            }
            
        }
        //dd($data);
        return response()->json($data);
    }*/
}
