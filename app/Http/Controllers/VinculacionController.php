<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_vinc;
use App\con_enti;

class VinculacionController extends Controller
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
          $datos = DB::table('con_vinc')
            ->get();   
            return view('vinculacion.index')
                ->with('datos', $datos);
    }


    public function create()
    {   

        return view('vinculacion.create');
    } 


    public function store(Request $request)
    {
        
        $respuesta=null;
        DB::beginTransaction();
        try {
            $vinculacion = con_vinc::create([
                'nom_vinc'=> $request->nom_vinc,
                'ind_esta'=> $request->ind_esta,
            ]);

            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('vinculacion.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('vinculacion.index');
        }
    }


    public function edit($id)
    {
        $dato = con_vinc::where('id', '=', $id)->get();
        
        return view('vinculacion.edit')
                ->with('dato', $dato[0])
                 ->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        $datos = con_vinc::find($id);
        $datos->fill($request->all());
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('vinculacion.index');
    }

    public function destroy($id)
    {
        $datos = con_vinc::find($id);
        $entidad = con_enti::where('tip_vinc', '=', $id)->get();
        if(count($entidad) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('vinculacion.index');   
        }
        else
        {
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        } return redirect()->route('vinculacion.index');
    }

}
