<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{

    public function dashboard()
    {
        $user = Auth::user();
        return view('dashboard.index', compact('user'));
    }

    public function editarCuenta()
    {
        $user = Auth::user();
        return view('cuenta/index', ['user' => $user]);
    }

    public function cotizaciones()
    {
        if (Auth::check())
        {
           return view('cotizacion.create');
        }else{
            return view('cotizacion.directa');
         }
    }

    public function especialistas()
    {
        $user = Auth::user();
        return view('especialistas.buscar', ['user' => $user]);
    }


    public function tipoUser(Request $request)
    {
        $user = user::find(Auth::user()->id);
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->rol      = $request->rol;
        $user->save();
        $user = Auth::user();
        return view('dashboard.index', ['user' => $user]);
    }


    public function editUser(Request $request)
    {
        $datos = User::find(Auth::user()->id);

        dd($request->name);
       return view('especializaciones.edit', compact('especializaciones'))->with('datos',$datos);
    }

    public function update(Request $request)
    {
        $actualizar = UserActividad::find($id);
        $actualizar->age = $request->input('age');
        $actualizar->mes = $request->input('mes');
        $actualizar->actividad_id = $request->input('actividad');
        $actualizar->save();

        Session::flash('message','Actividad en la Especiaizacion Editado con exito');
        return redirect()->route('misEspecializaciones.index');
    }

    //////////////////////////////////////////////////////////


    public function misContratos()
    {
        return view('especializaciones.index');
    }

    public function calificaciones()
    {
        return view('especialistas.calificaciones');
    }

    public function membresia()
    {
        return view('especialistas.membresias');
    }

    public function misProyectos()
    {
        return view('proyectos.index');
    }
}
