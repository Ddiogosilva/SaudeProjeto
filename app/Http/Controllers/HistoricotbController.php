<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\pressaoarterialtb;
use App\Models\colesteroltb;
use App\Models\glicosetb;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;




class HistoricotbController extends Controller
{
    

    
//---------------------------------Store Histórico
    public function storePressao(Request $request){
        $pressao= $request->validate([
            'iduser'=>'integer|required',
            'sistolica'=>'integer',
            'diastolica'=>'integer'
        ]);
        pressaoarterialtb::create($pressao);
        return redirect::route('dashboard');
    }


public function storeColesterol(Request $request)
{

    
        // Validação dos dados
        $colesterol = $request->validate([
            'iduser' => 'integer|required',
            'colesterol_HDL' => 'integer',
            'colesterol_LDL' => 'integer',
        ]);

        colesteroltb::create($colesterol);

       return redirect()->route('dashboard');
    
}
   
    
    public function storeGlicose(Request $request){
        $glicose= $request->validate([
            'iduser'=>'integer|required',
            'glicose'=>'integer',
           
        ]);
        glicosetb::create($glicose);
        return redirect()->route('dashboard');
    }
    

    //-----------------------------------Show historico 

    public function showExames(Request $request){
        //------------------------------- Todos os Dados de Glicose 
        $dadosglicose= glicosetb::query();
        $dadosglicose->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , '%'.$id.'%');
        });
        $dadosglicose = $dadosglicose->get();

        //------------------------------- Todos os Dados do Colesterol 
        $dadoscolesterol= colesteroltb::query();
        $dadoscolesterol->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , $id);
        });
       
        $dadoscolesterol = $dadoscolesterol->get();

        //------------------------------- Todos os Dados de Pressão 
        $dadospressao= pressaoarterialtb::query();
       $dadospressao->when($request->iduser,function($query,$id){
        $query->where('iduser', 'like' , '%'.$id.'%');
       });
       $dadospressao = $dadospressao->get();


        return view('dashboard', [
            'glicosetb' => $dadosglicose,
            'pressaoarterialtb' => $dadospressao,
            'colesteroltb' => $dadoscolesterol
        ]);
    }


    
    
    
}