<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_estado extends Model
{
    protected $table = "con_estado";

	public $timestamps = false;

	protected $fillable =[
		'estado'
		];
}
