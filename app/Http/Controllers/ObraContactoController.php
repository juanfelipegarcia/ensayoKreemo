<?php

namespace App\Http\Controllers;

use App\Models\ObraContacto;
use App\Models\Cliente;
use App\Models\Obra;
use App\Models\tipoContacto;
use App\Models\Empresa;

use Illuminate\Http\Request;
use Flash;
use DataTables;
use DB;

class ObraContactoController extends Controller
{
    public function index(){

        $tipocontacto = tipoContacto::all();
        $obra = Obra::all();
        $empresa = Empresa::all();
        $cliente = Cliente::all();

        return view("obracontacto.index", compact("tipocontacto","obra","empresa","cliente"));
    }

    public function save(Request $request)
    {
        $input = $request->all();
      
        try 
        {

            $obra = Obra::all();
            $cliente = Cliente::all();

            DB::beginTransaction();

            foreach ($input["contacto_id"] as $key => $value) {
            
                ObraContacto::create([
                    "idcontacto"=>$value,
                    "idobra"=> $obra->id,
                    "nombrecontacto" =>$value,
                ]);
            }  

            DB::commit();

            return redirect("/obracontacto/listar")->with('status', '1');
        } 
        catch (\Exception $e)
        {
            DB::rollBack();
            return redirect("/obracontacto/listar")->with('status', $e->getMessage());
        }
    }

    public function listar(Request $request){

        $obracontacto = ObraContacto::all();
        //dd($obracontacto);

        return DataTables::of($obracontacto);   
    
    }

}
