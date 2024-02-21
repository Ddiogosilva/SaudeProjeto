<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\cadastrotb;

class CadastrotbController extends Controller
{
   
    

    public function storecadastro(Request $request){
        $cadastro= $request->validate([
            'nome'=>'string|required',
            'email'=>'string|required',
            'senha'=>'string|required'
        ]);

        cadastrotb::create($cadastro);
        return redirect::route('index');
    }


    public function update(cadastrotb $id, Request $request){
        $cadastro = $request->validate([
            'nome'=>'string|required',
            'email'=>'string|required',
            'senha'=>'string|required'
        ]);

        $id->fill($cadastro);
        $id->save();
        return redirect::route('index');
    }


    public function show(cadastrotb $id){
        return view('Editar-cadastro', ['cadastrotb'=> $id]);
    }
}