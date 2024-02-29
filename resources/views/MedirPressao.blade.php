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
    <header>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">* Controle de pressão</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/duvidas">Dúvidas</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="/suporte">Suporte</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">Histórico</a></li>
                @if (Route::has('login'))
                <div class="navbar-nav ms-auto">
                    @auth
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="#">Histórico</a></li> 
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ url('/dashboard') }}" class="nav-link py-3 px-0 px-lg-3 rounded">minha Conta</a></li>
                    @else
                    <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('login') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Login</a></li>
 
                        @if (Route::has('register'))
                        <li class="nav-item mx-0 mx-lg-1"><a href="{{ route('register') }}" class="nav-link py-3 px-0 px-lg-3 rounded">Cadastro</a></li>
                        @endif
                    @endauth
                </div>
                @endif
                </div>>
            </div>
        </nav>



    </header>
        <!-- Pressao Section-->
    <form class="medirGlicose" method="post" action="{{ route('cadastrar-dados') }}">    
        <section class="page-section pressao" id="pressao">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h1>INSERIR TAXAS DE VALORES</h1>
                <div class="form-floating mb-3">
                    <input class="form-control" id="valor" type="number" name="pressao_sistolica" placeholder="Digite primeiro valor aqui..." data-sb-validations="required" />
                    <label for="number">Inserir primeiro valor aqui</label>
                    <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
                </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="name" type="number" name="pressao_diastolica" placeholder="Digite o Segundo valor..." data-sb-validations="required" />
                <label for="number">Inserir Segundo valor aqui</label>
                <div class="invalid-feedback" data-sb-feedback="name:required">Um valor é necessário.</div>
            </div>
            <button type="submit" class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#modalPressao">Enviar</button>
        </div>
        </section>
    </form>    

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
                                    <img class="img-fluid rounded mb-5" src="imagens/medidorGlicose.png" alt="..." />
                                    <p class="mb-4"></p>
                                    <button class="btn btn-primary" data-bs-dismiss="modal">
                                        <i class="fas fa-xmark fa-fw"></i>
                                        Agora não      
                                    </button>
                                    <a class="btn btn-primary" role="button">Salvar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Location</h4>
                        <p class="lead mb-0">
                            2215 John Daniel Drive
                            <br />
                            Clark, MO 65243
                        </p>
                    </div>
                    
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">About Freelancer</h4>
                        <p class="lead mb-0">
                            Freelance is a free to use, MIT licensed Bootstrap theme created by
                            <a href="http://startbootstrap.com">Start Bootstrap</a> <!--LINK DENTRO DE UM PARÁGRAFO-->
                            .
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; Your Website 2023</small></div>
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
