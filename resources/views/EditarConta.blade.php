@extends('Index')
@section('content')

<header>
        <img src="imagens/medtech (2).png" alt="">
        <figcaption>Tela de Cadastro</figcaption>
    </header>
    <form method="post" action="{{Route('EditarBanco-alterar', $cadastrotb->id)}}" class="row g-3 needs-validation" novalidate>

      @csrf
        <div class="col-md-8">
          <label for="validationCustom01" class="form-label">Seu nome</label>
          <input type="text" class="form-control" value="{{$cadastrotb->nome }}" id="validationCustom01"required>        
        </div>

        <div class="col-md-5">
          <label for="validationCustomUsername" class="form-label">Seu email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" value="{{$cadastrotb->email}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          </div>

          <div class="col-md-5">
          <label for="validationCustomUsername" class="form-label">Sua Senha</label>
          <div class="input-group has-validation">
            <input type="password" class="form-control" value="{{$cadastrotb->senha}}" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          </div>
      
            </div>
          </div>
        </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
    </form>
      <footer>
        <p>Copyringht 2020 Leticia <br>
        Slogan: Sua saúde inteligente.</p>
    </footer>



@endsection