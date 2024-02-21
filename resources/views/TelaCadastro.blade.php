

@extends('Index')
@section('content')
    <header>
        <img src="imagens/medtech (2).png" alt="">
        <figcaption>Tela de Cadastro</figcaption>
    </header>
    <form method="post" action="{{route('cadastrar-user')}}" class="row g-3 needs-validation" novalidate>

      @csrf
        <div class="col-md-8">
          <label for="validationCustom01" class="form-label">Digite seu nome</label>
          <input type="text" class="form-control" name="nome" id="validationCustom01"required>        
        </div>

        <div class="col-md-5">
          <label for="validationCustomUsername" class="form-label">Digite seu email</label>
          <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" class="form-control" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          </div>

          <div class="col-md-5">
          <label for="validationCustomUsername" class="form-label">Digite sua Senha</label>
          <div class="input-group has-validation">
            <input type="password" class="form-control" name="senha" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
          </div>

        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
            Concordar com os termos e condições.
            </label>
            <div class="invalid-feedback">
                
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
      