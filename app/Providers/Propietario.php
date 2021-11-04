<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    //
    protected $table='propietarios';
    protected $primarykey='id_propietario';
    //public $with=['mascotas'];

    public $incrementing=true;
    public $timestamps=false;

    public $fillable=[
    	'nombre',
    	'primer_apellido',
    	'segundo_apellido',
    	'genero',
    	'celular',
    ];

    public function mascotas(){
    	return $this->hasMAny(Mascota::class, 'id_propietario' , 'id_mascota');
    }
}
