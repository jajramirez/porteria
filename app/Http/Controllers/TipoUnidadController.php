<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_tipo_unidad;
use App\con_unidad;


class TipoUnidadController extends Controller
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
          $datos = DB::table('con_tipo_unidad')
            ->get();   
            return view('tipounidad.index')
                ->with('datos', $datos);
    }


    public function create()
    {   

        return view('tipounidad.create');
    } 


    public function store(Request $request)
    {
        
        $respuesta=null;
        DB::beginTransaction();
        try {
            $tipounidad = con_tipo_unidad::create([
                'tipo'=> $request->tipo,
            ]);

            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('tipounidad.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('tipounidad.index');
        }
    }


    public function edit($id)
    {
        $dato = con_tipo_unidad::where('id', '=', $id)->get();
        
        return view('tipounidad.edit')
                ->with('dato', $dato[0])
                 ->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        $datos = con_tipo_unidad::find($id);
        $datos->fill($request->all());
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('tipounidad.index');
    }

    public function destroy($id)
    {
        $datos = con_tipo_unidad::find($id);
        $entidad = con_unidad::where('tipo_uni', '=', $id)->get();
        if(count($entidad) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('tipounidad.index');   
        }
        else
        {
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        } return redirect()->route('tipounidad.index');
    }

}
