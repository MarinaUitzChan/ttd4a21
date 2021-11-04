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

    	$mascota->id_mascota=$request->get('id_mascota');
    	$mascota->nombre=$request->get('nombre');
    	$mascota->genero=$request->get('genero');
    	$mascota->peso=$request->get('peso');
    	
    	$mascota->save();




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
    	$mascota->nombre=$request->get('genero');
    	$mascota->nombre=$request->get('peso');

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
    	$mascota->destroy();
    }

}
