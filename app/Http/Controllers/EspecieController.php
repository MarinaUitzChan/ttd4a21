<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Especie;

class EspecieController extends Controller
{
    /**
    *Display a listing of the resource.
    *
    *@return \Iluminate\Http\Response
    */
    public function index()
    {
    	return $especies=Especie::all();
    }

    /**
    *Store a newly created resource in storage.
    *
    * @param \Iluminate\Http\Request $request
    * @return \Iluminate\Http\Response
    */
    public function store(Request $request)
    {
    
    }

    /**
    *Display the specified resource.
    *
    * @param int $id
    * @return \Iluminate\Http\Response
    */
    public function show($id)
    {
 
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
    	
    }

    /**
    *Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Iluminate\Http\Response
    */
    public function destroy($id)
    {
    	
    }
}

