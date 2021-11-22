<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});


//login es clase presencial de cualquier sistema, ya que permite acceder al sistema.
Route::get('prueba', function(){
	//return base64_encode('HOLA'); //base64_encode codifca un string
	return DB::select("SELECT * FROM usuario");
}); 

Route::get('descriptar',function(){
	return base64_decode('SE9MQQ=='); //_decone lo regresa a su forma normal osea un string
});


Route::post('validar','AccesoController@validar');
 


Route::apiResource('apiMascota','MascotaController');
Route::apiResource('apiEspecie','EspecieController');
Route::apiResource('apiPropietario','PropietarioController');
Route::apiResource('apiProducto', 'ProductoController');


//Ruta anonima
Route::get('mascotas' ,function(){
	return view ('mascotas');
});

Route::get('especies' , function(){
		return view('especies');
});

Route::get('propietarios' , function(){
		return view('propietarios');
});

//Rutas parametrizada
//Route::get('metodo/{parametro}',[
//'as' => 'metodo',
//'uses' => 'Controlador@metodo',
//]);

Route::get('getRazas/{id_especie}', [
'as' => 'getRazas',
'uses' => 'EspecieController@getRazas',
]);

