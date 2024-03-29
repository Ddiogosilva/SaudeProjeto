<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Projeto saúde</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="imagens/icon.png" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ url('../index.php') }}"> Controle de pressão</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/duvidas">Dúvidas</a></li>
                        
                        
                @if (Route::has('login'))
                <div class="navbar-nav ms-auto">
                    @auth
                   
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ url('/dashboard') }}" class="nav-link py-3 px-0 px-lg-3 rounded">minha Conta</a></li>
                    @else
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Login</a></li>
 
                        @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('register') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Cadastro</a></li>
                        @endif
                    @endauth
                </div>
                @endif
                </div>
            </div>
    </nav>
        <!-- Pressao Section--> 
        <section class="page-section pressao" id="pressao" >
        <form action="{{ route('cadastrar-pressao') }} " method="POST">
        @csrf
            <div class="container">
                    <!-- Portfolio Section Heading-->
                    <h1>INSERIR TAXAS DE VALORES</h1>
                    
                    <div class="form-floating mb-3">
                        <input class="form-control" id="sistolica" type="number" name="sistolica" placeholder="Digite primeiro valor aqui..." data-sb-validations="required" />
                        <label for="sistolica">Inserir primeiro valor aqui</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
                    </div>
                <div class="form-floating mb-3">
                    <input class="form-control" id="diastolica" type="number" name="diastolica" placeholder="Digite o Segundo valor..." data-sb-validations="required" />
                    <label for="diastolica">Inserir Segundo valor aqui</label> 
                    <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
                </div>
                

                <button type="button"onclick="calcularPressao()" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#modalPressao">Resultado</button>
                @if (Route::has('login'))
                    @auth
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <input class="form-control" id="id_User" type="hidden" name="iduser" value="{{ Auth::user()->id }}" data-sb-validations="required" />
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Salvar</a>
                        @endif
                    @endauth
                @endif
            </div>
        </form>
        </section>
      


    <!-------------------------- Modal --->
    <div class="portfolio-modal modal fade" id="modalPressao" tabindex="-1" aria-labelledby="modalPressao" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header border-0"><button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button></div>
                    <div class="modal-body text-center pb-5">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <!-- Portfolio Modal - Title-->
                                    <h2 class="portfolio-modal-title text-secondary text-uppercase mb-0">Pressao</h2>
                                    <!-- Icon Divider-->
                                    <div class="divider-custom">
                                        <div class="divider-custom-line"></div>
                                        <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                                        <div class="divider-custom-line"></div>
                                    </div>

                                    <div class="modal_resul" id="resultado"></div>
                                    
                                    <a class="btn btn-primary" data-bs-dismiss="modal" role="button"></i>Agora não </a>
                                    
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>


<script>
        function calcularPressao() {
            var sistolicaInput = document.getElementById('sistolica');
            var diastolicaInput = document.getElementById('diastolica');
            var sistolica = parseFloat(sistolicaInput.value);
            var diastolica = parseFloat(diastolicaInput.value);

            var resultadoDiv = document.getElementById('resultado');

            if (isNaN(sistolica) || isNaN(diastolica)) {
                resultadoDiv.innerHTML = "Por favor, insira valores numéricos para a pressão sistólica e diastólica.";
                return;
            }

            var mensagem = "Sua pressão arterial é " + sistolica + "/" + diastolica + " mmHg.";

            if (sistolica < 90 || diastolica < 60) {
                mensagem += " Você está com hipotensão.";
            } else if ((sistolica >= 90 && sistolica < 120) && (diastolica >= 60 && diastolica < 80)) {
                mensagem += " Sua pressão está normal.";
            } else if ((sistolica >= 120 && sistolica < 130) && (diastolica >= 80 && diastolica < 85)) {
                mensagem += " Você está com pré-hipertensão.";
            } else if ((sistolica >= 130 && sistolica < 140) && (diastolica >= 85 && diastolica < 90)) {
                mensagem += " Você está com hipertensão estágio 1.";
            } else if ((sistolica >= 140 && sistolica < 180) && (diastolica >= 90 && diastolica < 120)) {
                mensagem += " Você está com hipertensão estágio 2.";
            } else {
                mensagem += " Você está em crise hipertensiva.";
            }

            resultadoDiv.innerHTML = mensagem;
        }
    </script>

    <!-- Footer-->
    <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Senac sbc</h4>
                        <p class="lead mb-0">
                            TI16M 2024
                            <br />
                            Projeto Saúde
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes sociais</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4"></h4>
                        <p class="lead mb-0">
                            Para entender mais sobre o nosso propósito, temos o WordPress como documentação com mais detalhes de autores... 
                            <a href="http://startbootstrap.com">Saiba mais</a><!--COLOCAR O LINK DO WORDPRESS AQUI-->
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Medtech 2024</small></div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
