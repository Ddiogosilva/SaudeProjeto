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

    public function showFormGlicose(){
        return view('MedirGlicose');
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

    public function showFormDHstorico(){
        return view('Historico');
    }




    // enviar email-----------------------------------------------------------------------------
    public function enviaContato(){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $mensagem = $_POST['mensagem'];
    //$dpto = $_POST['dpto'];
 
    $msg = "<strong>Nome: </strong>" . $nome . "<br />";
    $msg .= "<strong>E-mail: </strong>" . $email . "<br />";
    //$msg .= "<strong>Departamento: </strong>" . $dpto . "<br />";
    $msg .= "<strong>Mensagem: </strong>" . $mensagem . "<br />";
 
    $mensagem = $msg;
    $remetente = $email;
    $destinatario = "matheus.bataim@gmail.com";
    $headers = "MIME-Version: 1.1\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "From:" . $email . "\r\n";
    $headers .= "Return-Path: matheus.bataim@gmail.com\r\n";
   
    if(!mail($destinatario,$mensagem,$headers)){
        print "falha no envio da mensagem";
    } else {
       echo "<script>window.location.href='/index'</script>";
    }

    return view('index');
    }




    
    // calculos Exames ------------------------------------------------------------------------

    //calculos HDL LDL

    public function calculoColesterol(){-

        $colesterolHDL = $request->input('colesterol_hdl');
        $colesterolLDL = $request->input('colesterol_ldl');

        $classificacaoHDL = $this->classificarColesterolHDL($colesterolHDL);
        $classificacaoLDL = $this->classificarColesterolLDL($colesterolLDL);

        
    }

    private function classificarColesterolHDL($colesterolHDL)
    {
        if ($colesterolHDL < 40) {
            return 'Baixo';
        } elseif ($colesterolHDL >= 40 && $colesterolHDL <= 60) {
            return 'Normal';
        } else {
            return 'Alto';
        }
    }

    private function classificarColesterolLDL($colesterolLDL)
    {
        if ($colesterolLDL < 100) {
            return 'Ótimo';
        } elseif ($colesterolLDL >= 100 && $colesterolLDL <= 129) {
            return 'Normal';
        } elseif ($colesterolLDL >= 130 && $colesterolLDL <= 159) {
            return 'Limítrofe';
        } elseif ($colesterolLDL >= 160 && $colesterolLDL <= 189) {
            return 'Alto';
        } else {
            return 'Muito alto';
        }
    }





    //calculos Glicose

    public function calculoGlicose(){
        
        $valorGlicemia = $request->input('valor_glicemia');

        $classificacao = $this->classificarGlicemia($valorGlicemia);

       
    }

    private function classificarGlicemia($valorGlicemia)
    {
        if ($valorGlicemia < 70) {
            return 'Baixa';
        } elseif ($valorGlicemia >= 70 && $valorGlicemia <= 130) {
            return 'Normal';
        } else {
            return 'Alta';
        }
    }






    //Calculos Pressão

    public function calculoPressao(){
        
        $pressaoSistolica = $request->input('pressao_sistolica');
        $pressaoDiastolica = $request->input('pressao_diastolica');

        // Lógica para classificar a pressão arterial
        $classificacao = $this->classificarPressao($pressaoSistolica, $pressaoDiastolica);

        
    }

    private function classificarPressao($pressaoSistolica, $pressaoDiastolica)
    {
        if ($pressaoSistolica < 90 || $pressaoDiastolica < 60) {
            return 'Baixa';
        } elseif (($pressaoSistolica >= 140 || $pressaoSistolica >= 90) && ($pressaoSistolica < 180 && $pressaoDiastolica < 120)) {
            return 'Alta';
        } else {
            return 'Normal';
        }
    }

}
