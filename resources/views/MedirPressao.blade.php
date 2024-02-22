@extends('Home')
@section('content')


    <a href="{{Route('index')}}"> 
      <button type="button" class="btn btn-primary btn-lg">Voltar</button>
    </a>
    
    <h1>Medir Pressão</h1>
    <h1>Inserir taxas de Valores</h1>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Introdução</h4>
        <p>Adicione a primeira informação do seu aparelho de medição,como ilustra a imagem e logo após clique no botão "Ok" abaixo,para mais informações .</p>
      </div>

      <button type="button" class="btn btn-primary btn-lg">Ok</button>


      
      @endsection