<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_vinc extends Model
{
    protected $table = "con_vinc";

    public $timestamps = false;

	protected $fillable =[
		'nom_vinc',
		'ind_esta'
		];
}
