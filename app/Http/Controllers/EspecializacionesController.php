<?php

namespace App\Http\Controllers;

use App\Actividad;
use App\Especializacion;
use App\UserActividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EspecializacionesController extends Controller
{

    public function actividades(Request $request, $id)
    {
        if($request->ajax()){
            $actividades = Actividad::actividades($id);
            return response()->json($actividades);
        }
    }

    public function index()
    {
        $especializaciones = \DB::table('actividad')
                    ->select('user_actividad.*','actividad.nombre as actividad','actividad.especializacion_id', 'especializacion.nombre as especializacion')
                    ->join('user_actividad','actividad.id', '=', 'user_actividad.actividad_id' )
                    ->join('especializacion','actividad.especializacion_id', '=', 'especializacion.id' )
                    ->where('user_actividad.user_id', '=', Auth::user()->id)
                    ->get();

        return view('especializaciones.index')->with('datos_tabla', $especializaciones);
    }


    public function create()
    {
        $especializaciones = Especializacion::all();

        return view('especializaciones.create', compact('especializaciones'));
    }



    public function store(Request $request)
    {

        $ingresar = new UserActividad;
        $ingresar->tiempo = $request->input('tiempo');
        $ingresar->actividad_id = $request->input('actividad');
        $ingresar->user_id = Auth::user()->id;
        $ingresar->save();

        Session::flash('message','Actividad en la Especiaizacion creado con exito');
        return redirect()->route('especializaciones.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $especializaciones = Especializacion::all();

        $datos = \DB::table('actividad')
                    ->select('user_actividad.*','actividad.nombre as actividad','actividad.especializacion_id', 'especializacion.nombre as especializacion')
                    ->join('user_actividad','actividad.id', '=', 'user_actividad.actividad_id' )
                    ->join('especializacion','actividad.especializacion_id', '=', 'especializacion.id' )
                    ->where('user_actividad.id', '=', $id)
                    ->first();
                    // dd($datos);
       return view('especializaciones.edit', compact('especializaciones'))->with('datos',$datos);
    }


    public function update(Request $request, $id)
    {
        $actualizar = UserActividad::find($id);
        $actualizar->actividad_id = $request->input('actividad');
        $actualizar->save();

        Session::flash('message','Actividad en la Especiaizacion Editado con exito');
        return redirect()->route('especializaciones.index');
    }


    public function destroy($id)
    {
        $borrar = UserActividad::find($id);
        $borrar->delete();
        Session::flash('message-error','Se borro la Actividad con exito');
        return redirect()->route('especializaciones.index');
    }
}
