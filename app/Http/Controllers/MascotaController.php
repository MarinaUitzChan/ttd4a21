<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mascota;

class MascotaController extends Controller
{
    /**
    *Display a listing of the resource.
    *
    *@return \Iluminate\Http\Response
    */
    public function index()
    {
    	return $mascotas=Mascota::all();
    }

    /**
    *Store a newly created resource in storage.
    *
    * @param \Iluminate\Http\Request $request
    * @return \Iluminate\Http\Response
    */
    public function store(Request $request)
    {
    	$mascota=new Mascota();

    	$mascota->id_mascota=9;
    	$mascota->nombre=$request->get('nombre');
    	$mascota->genero=$request->get('genero');
    	$mascota->peso=$request->get('peso');
        $mascota->edad=$request->get('edad');
    	
    	return $mascota->save();

        // return $request;

        // return $dato=$request->get('nombre');
    }

    /**
    *Display the specified resource.
    *
    * @param int $id
    * @return \Iluminate\Http\Response
    */
    public function show($id)
    {
    	return $mascota=Mascota::find($id);
    }

    /**
    *Update the specified resource in storage.
    *
    * @param \Iluminate\Http\Request $request
    * @param int $id
    * @return \Iluminate\Http\Response
    */
    public function update(Request $request, $id)
    {
    	$mascota=Mascota::find($id);
    	$mascota->nombre=$request->get('nombre');
        $mascota->nombre=$request->get('edad');
        $mascota->nombre=$request->get('peso');
    	$mascota->nombre=$request->get('genero');
        $mascota->id_especie=$request->get('id_especie');
       
        ;
    	

    	$mascota->update();

    }

    /**
    *Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Iluminate\Http\Response
    */
    public function destroy($id)
    {
    	$mascota=Mascota::find($id);
    	$mascota->delete();
    }

}
