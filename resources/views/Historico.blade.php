@extends('Home')
@section('content')


    <a href="{{Route('index')}}"> 
      <button type="button" class="btn btn-primary btn-lg">Voltar</button>
    </a>
    
    <header>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Histórico</th>
           
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Método</td>
           
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Valor Inserido</td>
          
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Valor de Referencia</td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Resultado</td>
          </tr>
        </tbody>
      </table>
        

      </div>
    </header>
    @endsection