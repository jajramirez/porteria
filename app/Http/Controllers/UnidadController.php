<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_tipo_unidad;
use App\con_unidad;
use App\con_estado;
use App\con_enti;
use App\con_usua;


class UnidadController extends Controller
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
          $datos = DB::table('con_unidad')
            ->get();   
            return view('unidad.index')
                ->with('datos', $datos);
    }


    public function create()
    {   
        $entidades = DB::table('con_enti')
            ->get(); 
        $tipos = DB::table('con_tipo_unidad')
            ->get(); 
        $estados = DB::table('con_estado')
            ->get(); 
        return view('unidad.create')
            ->with('entidades', $entidades)
            ->with('tipos', $tipos)
            ->with('estados', $estados);
   } 


    public function store(Request $request)
    {
        
        $respuesta=null;
        DB::beginTransaction();
        try {
            $unidad = con_unidad::create([
                'cod_enti'=> $request->cod_enti, 
                'num_predia'=> $request->num_predia,
                'tipo_uni'=> $request->tipo_uni,
                'band_estado'=> $request->band_estado
            ]);

            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('unidad.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('unidad.index');
        }
    }


    public function edit($id)
    {
        $dato = con_unidad::where('id', '=', $id)->get();
        $entidades = DB::table('con_enti')
            ->get(); 
        $tipos = DB::table('con_tipo_unidad')
            ->get(); 
        $estados = DB::table('con_estado')
            ->get(); 
  
        return view('unidad.edit')
            ->with('dato', $dato[0])
            ->with('id', $id)
            ->with('entidades', $entidades)
            ->with('tipos', $tipos)
            ->with('estados', $estados);
    }

    public function update(Request $request, $id)
    {
        $datos = con_unidad::find($id);
        $datos->fill($request->all());
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('unidad.index');
    }

    public function destroy($id)
    {
        $datos = con_unidad::find($id);
        $entidad = con_usua::where('uni_vivi', '=', $id)->get();
        if(count($entidad) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('unidad.index');   
        }
        else
        {
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        } return redirect()->route('unidad.index');
    }

}
