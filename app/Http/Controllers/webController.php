<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class webController extends Controller
{

    public function index(){
        return view('index');
    }


    public function showFormCoslesterol(){
        return view('MedirColesterol');
    }

    public function showFormGlicemia(){
        return view('MedirGlicemia');
    }

    public function showFormPressao(){
        return view('MedirPressao');
    }

    public function showFormSuporte(){
        return view('Suporte');
    }

    public function showFormDuvidas(){
        return view('Duvidas');
    }

    
}
