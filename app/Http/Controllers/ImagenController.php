<?php

namespace App\Http\Controllers;

use App\Imagen;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    public function index()
    {
    }


    public function create($id)
    {
        return view('imagenes.create', compact('id'));
    }


    public function store(Request $request)
    {
            $path = public_path().'/uploads/';
            $files = $request->file('file');
            foreach($files as $file){
               // $fileName = $file->getClientOriginalName();
                $fileName = 'edificapp'. time().'.'.$file->getClientOriginalExtension();
                $file->move($path, $fileName);

                $ingresar = new Imagen;
                $ingresar->ruta = $fileName;
                $ingresar->proyecto_id = $request->input('proyecto');
                $ingresar->save();
            }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
