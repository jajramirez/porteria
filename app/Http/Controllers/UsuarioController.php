<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_unidad;
use App\con_enti;
use App\con_usua;
use App\con_division;


class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $datos = DB::table('con_usua')
            ->get();   
            return view('usuario.index')
                ->with('datos', $datos);
    }


    public function create()
    {   
        $entidades = DB::table('con_enti')
            ->get(); 
        $unidades = DB::table('con_unidad')
            ->get(); 
        return view('usuario.create')
            ->with('entidades', $entidades)
            ->with('unidades', $unidades);
   } 


    public function store(Request $request)
    {

        $name = null;
        $nombre = null;
        if($request->file('dir_phot'))
        {
            $file = $request->file('dir_phot');
            $name = 'logo' . time() . "." . $file->getClientOriginalExtension();
            $nombre = $file->getClientOriginalName();
            $path = public_path().'/logo/usuarios/';
            $file->move($path, $name);
        }

        $reg = DB::table('con_usua')->where('cod_usua' , '=' ,$request->cod_usua)
            ->get();  

        
        if(count($reg) == 0)
        {
            $respuesta=null;
            DB::beginTransaction();
            try {
                $unidad = con_usua::create([
                    'cod_enti'=> $request->cod_enti, 
                    'cod_usua'=> $request->cod_usua,
                    'con_usua'=> ' ',
                    'nom_usua'=> $request->nom_usua,
                    'cod_pais'=> $request->cod_pais,
                    'cod_esta'=> $request->cod_esta,
                    'cod_ciud'=> $request->cod_ciud,
                    'dir_usua'=> $request->dir_usua,
                    'tel_usua'=> $request->tel_usua,
                    'cel_usua'=> $request->cel_usua,
                    'uni_vivi'=> $request->uni_vivi,
                    'dir_phot'=> $nombre,
                    'tip_perf'=> $request->tip_perf,
                    'ind_esta'=> '0'
                ]);

                DB::commit();
               
            } catch(\Illuminate\Database\QueryException $ex){ 
                DB::rollback();
                $respuesta = $ex->getMessage(); 
            }
            
            if($respuesta !=null)
            {
                Flash::warning($respuesta);
                return redirect()->route('usuario.create');
            }
            else
            {
                Flash::success("Se insertó correctamente el registro");
                return redirect()->route('usuario.index');
            }
        }
        else
        {
            $respuesta = "El correo ingresado ya se encuentra registrado en el sistema";
            Flash::warning($respuesta);
            return redirect()->route('usuario.create');
        }
    }


    public function edit($id)
    {
        $dato = con_usua::where('id', '=', $id)->get();


        $entidades = DB::table('con_enti')
            ->get(); 
        $unidad = DB::table('con_unidad')
            ->get(); 

        $paises =  con_division::where('tip_dipo', '=', 'P')->get();
        $estados =  con_division::where('tip_dipo', '=', 'E')
            ->where('cod_dest', '=', $dato[0]->cod_pais)
            ->get();
        $ciudades =  con_division::where('tip_dipo', '=', 'C')
            ->where('cod_dest', '=', $dato[0]->cod_esta)
            ->get();
     


        return view('usuario.edit')
            ->with('dato', $dato[0])
            ->with('id', $id)
            ->with('entidades', $entidades)
            ->with('unidades', $unidad)
            ->with('paises', $paises)
            ->with('estados', $estados)
            ->with('ciudades', $ciudades);
    }

    public function update(Request $request, $id)
    {
        $datos = usuario::find($id);
        $datos->fill($request->all());
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('usuario.index');
    }

    public function destroy($id)
    {
        $datos = con_usua::find($id);
        /*/$entidad = con_usua::where('uni_vivi', '=', $id)->get();
        if(count($entidad) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('unidad.index');   
        }
        else
        {*/
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        //} 
            return redirect()->route('usuario.index');
    }

}
