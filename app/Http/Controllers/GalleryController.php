<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Posts;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
        return view('gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $posts = new Posts();
        //use the request to do what we want

        // Check if the request has files
        if ($request->file('file')) {
            $path = 'public/images';

            /* Multiple file upload */
            $files = $request->file('file');

            if (!is_array($files)) {
                $files = [$files];
            }

            //loop throu the array 
            for ($i = 0; $i < count($files); $i++) {

                $file = $files[$i];
                $filename = time() . "_$i" . '.' . $file->clientExtension();
                $file= $file->storeAs($path, $filename);

                $images = new Gallery();
                $images->file = $filename;
                $images->path = $file;
                $images->save();

                
                
                
                $posts->images = $file;
                $posts->name = $request->name;
                $posts->email = $request->email;
                $posts->save();
                
            }

            
            
            return response()->json(['message' => 'file uploaded'], 200);
        } else {
            return response()->json(['message' => 'error uploading file'], 503);
        }
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
    public function destroy($id)
    {
        //
    }
}
