<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class con_usua extends Authenticatable
{
    use Notifiable;


    public $timestamps = false;
    

    protected $table = "con_usua";


	protected $fillable =[
		'cod_enti', 
		'cod_usua',
		'con_usua',
		'nom_usua',
		'cod_pais',
		'cod_esta',
		'cod_ciud',
		'dir_usua',
		'tel_usua',
		'cel_usua',
		'uni_vivi',
		'dir_phot',
		'tip_perf',
		'ind_esta'
		];

	    protected $hidden = [
        'con_usua',
    ];
}

