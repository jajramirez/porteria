<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_division;

class DivisionController extends Controller
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
          $datos = DB::table('con_division')
            ->get();   
            return view('division.index')
                ->with('datos', $datos);
    }


    public function create()
    {   

        return view('division.create');
    } 


    public function store(Request $request)
    {
        
        $respuesta=null;
        DB::beginTransaction();
        try {

            if($request->tip_dipo == "P")
            {
                $division = con_division::create([
                        'tip_dipo'=> $request->tip_dipo, 
                        'nom_dipo'=> $request->nom_dipo, 
                        ]);
            }
             if($request->tip_dipo == "E")
            {
                $division = con_division::create([
                        'tip_dipo'=> $request->tip_dipo, 
                        'cod_dest'=> $request->cod_dest, 
                        'nom_dipo'=> $request->nom_dipo, 
                        ]);
            }
             if($request->tip_dipo == "C")
            {
                $division = con_division::create([
                        'tip_dipo'=> $request->tip_dipo,
                        'cod_dest'=> $request->cod_dest2,  
                        'nom_dipo'=> $request->nom_dipo, 
                        ]);
            }
            


            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('division.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('division.create');
        }
    }

    public function datos(Request $request)
    {
        echo '<option value="">Seleccione una opcion</option>'; 

        if($request->cargar == null)
        {
            $datos = con_division::where('tip_dipo', '=', $request->cargar)->get();
        }
        else
        {
            $datos = con_division::where('tip_dipo', '=', $request->cargar)
                ->where('cod_dest', '=', $request->filtro)->get();
        }
        

        if($datos != null)
        {
            foreach ($datos as $c) {
            
                echo '<option value="'.$c->id.'">'.$c->nom_dipo.'</option>';
            
            }
        }
    }

    public function edit($id)
    {
        $dato = con_division::where('id', '=', $id)->get();
        
        return view('division.edit')
                ->with('dato', $dato[0])
                 ->with('id', $id);
    }

    public function update(Request $request, $id)
    {
        $datos = con_division::find($id);
        $datos->nom_dipo = $request->nom_dipo;
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('division.index');
    }

    public function destroy($id)
    {
        $datos = con_division::find($id);
        $datos_sub = con_division::where('cod_dest', '=', $id)->get();
        if(count($datos_sub) > 0)
        {
            Flash::success("No se puede eliminar un registro que contenga dependencias");
            return redirect()->route('division.index');   
        }
        else
        {
            $datos->delete();
            Flash::success("Se ha eliminado correctamente");
        } return redirect()->route('division.index');
    }

}
