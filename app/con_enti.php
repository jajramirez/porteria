<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class con_enti extends Model
{
    protected $table = "con_enti";

    public $timestamps = false;

	protected $fillable =[
		'nom_enti',
		'cod_pais',
		'cod_estado',
		'cod_ciud',
		'dir_enti',
		'tel_enti',
		'cel_enti',
		'cor_enti',
		'nom_repr',
		'tel_repr',
		'tip_vinc',
		'fec_vinv',
		'fec_expl',
		'dir_logo',
		'ind_esta'
		];
}
