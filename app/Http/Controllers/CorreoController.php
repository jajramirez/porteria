<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function enviocorreo(Request $request)
    {

  

        Mail::to($request->destinatario)->send(new Mail\Welcome('prueba'));

        /*
        $destinatario = $request->destinatario;
        $mail = "Prueba de mensaje";
        //Titulo
        $titulo = "PRUEBA DE TITULO";
        //cabecera
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
        //dirección del remitente 
        $headers .= "From: Geeky Theory < jeffersonrairez31@gmail.com >\r\n";
        //Enviamos el mensaje a tu_dirección_email 
        $bool = mail("jeffersonrairez31@gmail.co",$titulo,$mail,$headers);

        if($bool){
            echo "Mensaje enviado";
        }else{
            echo "Mensaje no enviado";
        }
    */
    }
}
