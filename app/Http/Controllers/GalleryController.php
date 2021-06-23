<?php

namespace App\Http\Controllers;

use App\Gallery;
use http\Env\Response;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

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
        /*$galeria = new Gallery($request->all());

        if($request->file('file'))
        {
            $img = $request->file('file');

            $nameImage = time().'.'.$img->clientExtension();

            $ruta = storage_path().'/app/public/images/'.$nameImage;

            $galeria->file = $ruta;
            $galeria->save();
        }

        return redirect()->route('gallery.index')->with('message_success', 'Se ha registrado una nueva galeria con éxito.');*/
        /*$data = $request->validate([
            'name' => 'required|2',
            'email' => 'required',
        ]);

        $galeria->name = $data['name'];
        $galeria->email = $data['email'];

        if($request->file('file')){
            $img = $request->file('file');

            $nameImage = time().'.'.$img->extension();

            $ruta = storage_path().'/app/public/images/'.$nameImage;

            Image::make($request->file('file'))
                            ->resize(900, null, function ($constraint){
                                $constraint->aspectRatio();
                            })
                            ->save($ruta);   
        }

        Gallery::create([
            'file' => '/storage/images/'.$nameImage
        ]);*/
        /*$request->validate([
            'file' => 'required|image|max:1024'
        ]);

        $imagen = $request->file('file')->store('public/images');

        $url = Storage::url($imagen);

        Gallery::create([
            'url' => $url
        ]);

        //return redirect()->route('gallery.index');
        /*$request->validate([
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
        ]);*/

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

    public function storeData(Request $request)
	{
			$user = new Gallery($request->all());
            $user->name = $request->name;
            $user->email = $request->email;

            if($request->file('file')){
                $path = 'public/images';
                $img = $request->file('file');
                $imageName = time().'.'.$img->clientExtension();

                $direccion = $img->storeAs($path, $imageName);
                $user->save();
            }
            
		return response()->json(['status'=>"success"]);
        //return redirect()->route('gallery.index')->with('message_succes');
	}



	// We are submitting are image along with userid and with the help of user id we are updateing our record
	public function storeImages(Request $request)
	{

		if($request->file('file')){

            $img = $request->file('file');

            $imageName = time().'.'.$img->clientExtension();
            $user_image = new Gallery();
            $original_name = $img->getClientOriginalName();
            $user_image->image = $imageName;

            if(!is_dir(storage_path() . '/app/public/images/')){
                mkdir(storage_path() . '/app/public/images/', 0777, true);
            }

            $request->file('file')->move(storage_path() . '/app/public/images/', $imageName);
        return response()->json(['status'=>"success",'imgdata'=>$original_name]);
        }
	}
}
