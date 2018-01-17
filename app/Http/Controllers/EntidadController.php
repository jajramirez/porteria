<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use App\con_division;
use App\con_enti;
use App\con_vinc;
class EntidadController extends Controller
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
          $datos = DB::table('con_enti')
            ->get();   
            return view('entidad.index')
                ->with('datos', $datos);
    }


    public function create()
    {   
        $tipvinc =  con_vinc::where('ind_esta', '=', 'A')->get();
        return view('entidad.create')
            ->with("tipvinc", $tipvinc);
    } 


    public function store(Request $request)
    {

        $name = null;
        $nombre = null;
        if($request->file('dir_logo'))
        {
            $file = $request->file('dir_logo');
            $name = 'logo' . time() . "." . $file->getClientOriginalExtension();
            $nombre = $file->getClientOriginalName();
            $path = public_path().'/logo/entidades/';
            $file->move($path, $name);
        }


        
        $respuesta=null;
        DB::beginTransaction();
        try {

                 $fec_vinv = substr($request->fec_vinv,6,4) .'-'.substr($request->fec_vinv,0,2) .'-'. substr($request->fec_vinv,3,2);

                  $fec_expl = substr($request->fec_expl,6,4) .'-'.substr($request->fec_expl,0,2) .'-'. substr($request->fec_expl,3,2);

                $entidad = con_enti::create([
                        'nom_enti'=> $request->nom_enti,
                        'cod_pais'=> $request->cod_pais,
                        'cod_estado'=> $request->cod_estado,
                        'cod_ciud'=> $request->cod_ciud,
                        'dir_enti'=> $request->dir_enti,
                        'tel_enti'=> $request->tel_enti,
                        'cel_enti'=> $request->cel_enti,
                        'cor_enti'=> $request->cor_enti,
                        'nom_repr'=> $request->nom_repr,
                        'tel_repr'=> $request->tel_repr,
                        'tip_vinc'=> $request->tip_vinc,
                        'fec_vinv'=> $fec_vinv,
                        'fec_expl'=> $fec_expl,
                        'dir_logo'=> $name,
                        'ind_esta'=> $request->ind_esta
                        ]);
            


            DB::commit();
           
        } catch(\Illuminate\Database\QueryException $ex){ 
            DB::rollback();
            $respuesta = $ex->getMessage(); 
        }
        
        if($respuesta !=null)
        {
            Flash::warning($respuesta);
            return redirect()->route('entidad.create');
        }
        else
        {
            Flash::success("Se insertó correctamente el registro");
            return redirect()->route('entidad.index');
        }
    }


    public function edit($id)
    {
        $dato = con_enti::where('id', '=', $id)->get();

        $dato[0]->fec_vinv =   substr($dato[0]->fec_vinv,5,2) .'/'.substr($dato[0]->fec_vinv,8,2) .'/'. substr($dato[0]->fec_vinv,0,4);

        $dato[0]->fec_expl =   substr($dato[0]->fec_expl,5,2) .'/'.substr($dato[0]->fec_expl,8,2) .'/'. substr($dato[0]->fec_expl,0,4);
 
        $paises =  con_division::where('tip_dipo', '=', 'P')->get();
        $estados =  con_division::where('tip_dipo', '=', 'E')
            ->where('cod_dest', '=', $dato[0]->cod_pais)
            ->get();
        $ciudades =  con_division::where('tip_dipo', '=', 'C')
            ->where('cod_dest', '=', $dato[0]->cod_estado)
            ->get();
     

        $tipvinc =  con_vinc::where('ind_esta', '=', 'A')->get();
        

        return view('entidad.edit')
                ->with('dato', $dato[0])
                ->with('id', $id)
                ->with('paises', $paises)
                ->with('estados', $estados)
                ->with('ciudades', $ciudades)
                ->with("tipvinc", $tipvinc);
    }

    public function update(Request $request, $id)
    {
        $datos = con_enti::find($id);
        $datos->fill($request->all());
        $datos->fec_vinv = substr($request->fec_vinv,6,4) .'-'.substr($request->fec_vinv,0,2) .'-'. substr($request->fec_vinv,3,2);

        $datos->fec_expl = substr($request->fec_expl,6,4) .'-'.substr($request->fec_expl,0,2) .'-'. substr($request->fec_expl,3,2);
        $datos->save();
        
        Flash::success("El registro se actualizó correctamente");
        return redirect()->route('entidad.index');
    }

    public function destroy($id)
    {
        $datos = con_enti::find($id);
      
        $datos->delete();
        Flash::success("Se ha eliminado correctamente");
        return redirect()->route('division.index');
    }

}
