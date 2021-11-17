<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table='mascotas';
    protected $primaryKey='id_mascota';

    public $with=['especie'];

    //define si la llave primaria es o no un número autoincrementable
    public $incrementing=true;

    //activar o desactivar etiquetas de tiempo
    public $timestamps=true;

    public $fillable=[
    	'nombre',
    	'genero',
    	'peso',
    	'id_especie',
        'id_propietario'
        
    ];

    public function especie()
    {
        return $this-> belongsTo(Especie::class, 'id_especie', 'id_especie');
    }

}
