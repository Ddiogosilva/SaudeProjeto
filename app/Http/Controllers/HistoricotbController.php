<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\pressaoarterialtb;
use App\Models\colesteroltb;
use App\Models\glicosetb;

class HistoricotbController extends Controller
{
    

    
//---------------------------------Store Histórico
    public function storePressao(Request $request){
        $pressao= $request->validate([
            'iduser'=>'integer|required',
            'sistolica'=>'string',
            'diastolica'=>'string'
        ]);
        pressaoarterialtb::create($pressao);
        return redirect::route('dashboard');
    }
    public function storeColesterol(Request $request){
        $colesterol= $request->validate([
            'iduser'=>'integer|required',
            'colesterol_HDL'=>'string',
            'colesterol_LDL'=>'string',
        ]);
        colesteroltb::create($colesterol);
        return redirect::route('dashboard');
    }
    
    public function storeGlicose(Request $request){
        $glicose= $request->validate([
            'iduser'=>'integer|required',
            'glicose'=>'string',
           
        ]);
        glicosetb::create($glicose);
        return view('dashboard');
    }
    

    //-----------------------------------Show historico 
    public function showExames(Request $request){
        $dadosglicose= glicosetb::query();
        $dadosglicose->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , $id);
        });
 
        $dadosglicose = $dadosglicose->get();

        $dadoscolesterol= colesteroltb::query();
        $dadoscolesterol->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , $id);
        });
        $dadoscolesterol = $dadoscolesterol->get();

        $dadospressao= pressaoarterialtb::query();
        $dadospressao->when($request->iduser,function($query,$id){
         $query->where('iduser', 'like' , $id);
        });
        
        $dadospressao = $dadospressao->get();

//var_dump($dadosglicose);
        return view('dashboard',['glicosetb' => $dadosglicose, 'colesteroltb' => $dadoscolesterol,'pressaoarterialtb' => $dadospressao]);
    }

    
    
    











    
} 
