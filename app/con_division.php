<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_division extends Model
{
    protected $table = "con_division";

    public $timestamps = false;

	protected $fillable =[
		'tip_dipo',
		'cod_dest',
		'nom_dipo',
		'num_ptel',
		'cod_impu',
		'cod_sisb',
		'nom_dipo_antes'
		];
}
