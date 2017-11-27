<?php

namespace App\Http\Controllers;

use App\Imagen;
use App\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProyectoController extends Controller
{
    public function index()
    {

         $datos = Proyecto::where('user_id', Auth::user()->id)->get();

         foreach ($datos as  $value) {
             $fotos = Imagen::where('proyecto_id',$value->id)->get();
         }

        return view('proyectos.index')->with('fotos',$fotos)->with('datos_tabla',$datos);
        return view('proyectos.index')->with('datos_tabla',$datos);
    }


    public function create()
    {
        return view('proyectos.create');
    }

    public function store(Request $request)
    {
        $ingresar = new Proyecto;
        $ingresar->nombre = $request->input('nombre');
        $ingresar->descripcion = $request->input('descripcion');
        $ingresar->detalle = $request->input('detalles');
        $ingresar->user_id = Auth::user()->id;
        $ingresar->save();

        Session::flash('message','Proyecto '.$request->input('nombre').' creado con exito');
        return redirect()->route('proyectos.index');
    }


    public function show($id)
    {

        $datos = Proyecto::find($id);
        $fotos = \DB::table('imagenes')
                    ->select('*')
                    ->where('proyecto_id', '=', $id)
                    ->get();
        $foto = \DB::table('imagenes')
                    ->select('*')
                    ->where('proyecto_id', '=', $id)
                    ->first();


        if ($datos->user_id == Auth::user()->id)
        {
            if($foto == null)
            {
                $foto = "docs/imagenblanco.jpg";
            }else{
                 $foto = $foto->ruta;
            }
            return view('imagenes.index', ['datos'=>$datos, 'fotos'=>$fotos, 'foto'=>$foto]);
        }else{
            Session::flash('message-error', 'No es Propietario de ese Proyecto');
            return redirect()->route('proyectos.index');
        }

    }

    public function edit($id)
    {
        return "editar ".$id;
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
