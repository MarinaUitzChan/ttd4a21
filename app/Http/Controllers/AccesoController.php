<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,

class AccesoController extends Controller
{
    //
    public function validar(Request $r){
    	$usuario=$r->get('usuario');
    	$password=$r->get('password');

    	$validarUsuario = DB::select("SELECT * 
    									FROM usuario 
    									WHERE usuario= '$usuario'");
    	//return $validarUsuario;
    	if(!empty ($validarUsuario)){
    		//return "El usuario exite";
    		$validarUsuario = $validarUsuario[0];
    		return $valisarUsuario;


    		$passDB=$validarUsuario[0]->password==$password;

    		if($passDB==$password){
    			return "BIENVENIDOS AL SISTEMA";
            }
    		else{
    			return "LA CONTRASEÑA ES INCORRECTA";
            }
    	}
    	else{
    		return "El usuario no exite";
    	}

    	return "Mi usuario es : $usuario y mi contraseña es : $password";
    }
}