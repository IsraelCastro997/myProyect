<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>@yield('title') - Myproject</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/modal.css') }}" rel="stylesheet" />
         {{-- Bootstrap  --}}

    </head>
    <body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
        {{-- <img src="assets/img/navbar-logo.svg" alt="..." /> --}}
            <a class="navbar-brand" href="#page-top">My Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="/">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('universityNetwork') }}">Red Universitaria</a></li>
                    <li class="nav-item"><a class="nav-link" href="/myProjects">Mis Proyectos</a></li>
                    <li class="nav-item"><a class="nav-link shadowL" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="/team">Team</a></li>
                    <li class="nav-item"><a class="nav-link shadowL" href="#contact">Contact</a></li>
                    @php
                        // dd(Auth::id());
                    @endphp
                    @if (Auth::guest())
                    <li class="nav-item"><a class="nav-link" href="/register">Registrar</a></li>
                    @else
                        @if (empty(Auth::user()->academic) && empty(Auth::user()->student ))
                            <li class="nav-item"><a class="nav-link" href="/addProfile">Perfil</a></li>
                        @endif
                        @if (isset(Auth::user()->academic))
                            <li class="nav-item"><a class="nav-link" href="/profileAcademic">Perfil</a></li>
                        @endif
                        @if (isset(Auth::user()->student))
                            <li class="nav-item"><a class="nav-link" href="/profile">Perfil</a></li>
                        @endif



                    @endif
                    <a href="{{ route('postProject') }}" class="btn btn-primary btn-block"><span class="h5"><i class="fa fa-plus" aria-hidden="true"></i></span> Publicar</a>
                </ul>
            </div>
        </div>
    </nav>
      {{-- Alert master  --}}
    @if(Session::has('message'))
        <div class="container mt-100">
            <div class="mt-100 alert alert-{{ Session::get('typealert') }}" style="display:block; margin-bottom: 16px">
                {{ Session::get('message') }}
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <script>
                    $('.alert').slideDown();
                    setTimeout(function() { $('.alert').slideUp();},10000);
                </script>
            </div>
        </div>
    @endif

    @section('content')

    @show
 <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start text-white">Copyright &copy; Your Website 2021</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-white text-decoration-none me-3" href="#!">Privacy Policy</a>
                    <a class="link-dark text-white text-decoration-none" href="#!">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>
        <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
