<?php

namespace App\Http\Controllers;

use Illuminate\support\facades\redirect;
use Illuminate\Http\Request;
use App\Models\cadastrotb;

class CadastrotbController extends Controller
{
    public function index(){
        return view('index');
    }

    public function showFormCadastro(){
        return view('Telacadastro');
    }

    public function storecadastro(Request $request){
        $cadastro= $request->validate([
            'nome'=>'string|required',
            'email'=>'string|required',
            'senha'=>'string|required'
        ]);

        cadastro::create($cadastro);
        return redirect::route('Index');
    }


    public function update(cadastro $id, Request $request){
        $cadastro = $request->validate([
            'nome'=>'string|required',
            'email'=>'string|required',
            'senha'=>'string|required'
        ]);

        $id->fill($cadastro);
        $id->save();
        return redirect::route('Home');
    }


    public function show(cadastro $id){
        return view('EditarConta', ['cadastrotb'=> $id]);
    }
}