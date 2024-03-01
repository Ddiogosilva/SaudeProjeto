<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\historicotb;

class HistoricotbController extends Controller
{
    

    

    public function storeHistorico(Request $request){
        $historico= $request->validate([
            'iduser'=>'integer|required',
            'nome'=>'string|required',
            'colesterol_HDL'=>'string',
            'colesterol_LDL'=>'string',
            'glicemia'=>'string',
            'pressao'=>'string'

        ]);

        historicotb::create($historico);
        return redirect::route('index');
    }


    public function showGerenciador(Request $request){
       $dadoshistorico= historicotb::query();
       $dadoshistorico->when($request->nome,function($query,$nome){
        $query->where('nome', 'like' , '%'.$nome.'%');
       });

       $dadoshistorico = $dadoshistorico->get();

       return view('Historico', ['historicotb' => $dadoshistorico]);
    }


    public function destroy(historicotb $NomeFK){
        $NomeFK->delete();
        return redirect::route('historicotodos');
        
    }


    public function update(historico $id, Request $request){
        $historico = $request->validate([
            'iduser'=>'integer|required',
            'nome'=>'string|required',
            'colesterol_HDL'=>'string',
            'colesterol_LDL'=>'string',
            'glicemia'=>'string',
            'pressao'=>'string'
        ]);

        $id->fill($historico);
        $id->save();
        return redirect::route('historicotodos');
    }


    public function show(historico $nome){
        return view('historicotodos', ['historicotb'=> $nome]);
    }
}