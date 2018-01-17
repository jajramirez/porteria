<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_tipo_unidad extends Model
{
    protected $table = "con_tipo_unidad";

	public $timestamps = false;

	protected $fillable =[
		'tipo'
		];
}
