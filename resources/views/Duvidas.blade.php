@extends('Home')
@section('content')


    <a href="{{Route('index')}}"> 
      <button type="button" class="btn btn-primary btn-lg">Voltar</button>
    </a>
    
    <h1>Duvidas Frequentes</h1>
    <h4>1- Como colocar o valor do exame de Pressão Arterial ?
        Resposta:
         Sempre coloque o valor inteiro, como por exemplo 120 x 80, dessa forma você receberá o resultado correto</h4>
    <h4>2- Se o exame de Glicose foi realizado sem o tempo de jejum necessario, o resultado pode vir alterado ? 
            Resposta:
             Sim, para que o exame de Gilcose retorne o valor correto de fato, é necessario que pessoa se prepare para o tal, realizando um jejum de 12h!</h4>
    <h4>3-Como colocar o valor do colesterol (LDL) e (HDL) ?
                Resposta:
                 Os dois tipos de colesterol deverão ser inseridos no mesmo campo (Um por vez) Ex. (link)!</h4>


@endsection