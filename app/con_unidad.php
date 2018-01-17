<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_unidad extends Model
{
    protected $table = "con_unidad";

    public $timestamps = false;
    
	protected $fillable =[
		'cod_enti', 
		'num_predia',
		'tipo_uni',
		'band_estado'
		];
}
