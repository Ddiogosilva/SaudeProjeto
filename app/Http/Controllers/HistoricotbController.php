<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\historicotb;

class HistoricotbController extends Controller
{
    

    public function showFormHistorico(){
        return view('TelaCadastro');
    }

    public function storeHistorico(Request $request){
        $historico= $request->validate([
            'nomeFK'=>'string|required',
            'colesterol_HDL'=>'string|required',
            'colesterol_LDL'=>'string|required',
            'glicemia'=>'string|required',
            'pressao'=>'string|required'

        ]);

        historico::create($historico);
        return redirect::route('Home');
    }


    public function showGerenciador(Request $request){
       $dados= historico::query();
       $dados->when($request->nome,function($query,$nome){
        $query->where('nomeFK', 'like' , '%'.$nome.'%');
       });

       $dadoshistorico = $dadoshistorico->get();

       return view('Hitórico', ['historicotb' => $dadoshistorico]);
    }


    public function destroy(historico $id){
        $id->delete();
        return redirect::route('historicotodos');
        
    }


    public function update(historico $id, Request $request){
        $historico = $request->validate([
            'nomeFK'=>'string|required',
            'colesterol_HDL'=>'string|required',
            'colesterol_LDL'=>'string|required',
            'glicemia'=>'string|required',
            'pressao'=>'string|required'
        ]);

        $id->fill($historico);
        $id->save();
        return redirect::route('historicotodos');
    }


    public function show(historico $nome){
        return view('historicotodos', ['historicotb'=> $id]);
    }
}