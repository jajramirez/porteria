<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_estado;
use App\con_unidad;

class EstadoController extends Controller
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
          $datos = DB::table('con_estado')
            ->get();   
            return view('estado.index')
                ->with('datos', $datos);
    }


    public function create()
    {   

        return view('estado.create');
    } 


    public function store(Request $request)
    {
        
        $respuesta=null;
        DB::beginTransaction();
        try {
            $estado = con_estado::create([
                'estado'=> $request->estado,
            ]);

            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('estado.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('estado.index');
        }
    }


    public function edit($id)
    {
        $dato = con_estado::where('id', '=', $id)->get();
        
        return view('estado.edit')
                ->with('dato', $dato[0])
                 ->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        $datos = con_estado::find($id);
        $datos->fill($request->all());
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('estado.index');
    }

    public function destroy($id)
    {
        $datos = con_estado::find($id);
        $entidad = con_unidad::where('band_estado', '=', $id)->get();
        if(count($entidad) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('estado.index');   
        }
        else
        {
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        } return redirect()->route('estado.index');
    }

}
