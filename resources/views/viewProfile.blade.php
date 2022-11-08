@extends('master')
@section('title', 'profile')
@section('content')

<link rel="stylesheet" href="css/master.css">
<section>
    <div class="container text-center">
        <div class="row">

            <div class="site-section bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-8 mb-5">
                        <div class="p-4 mb-3 bg-danger text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE <i class="fa fa-user-md fa-2x" aria-hidden="true"></i></h3>
                            <p>El SARS-Cov-2 es muy contagioso, por lo que recomendamos realizar tus juntas o reuniones a través de las siguientes aplicaciones de videoconferencia: Zoom, Google Meet o Teams, así evitamos los contagios.</p>
                        </div>
                            <div class="row form-group">


                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="name">Nombre</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <p>{{$user->student->name_student}}</p>
                                    <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <p>{{$user->student->paternal_surname_student}}</p>
                                    <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                                    <p>{{$user->student->maternal_surname_student}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Celular</label>
                                    <p>{{$user->student->phone_student}}</p>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Email</label>
                                    <p>{{$user->email}}</p>
                                </div>
                            </div>

                            {{-- <div class="p-4 mb-3 bg-white">
                                <h3 class="h5 text-black mb-3"> CV</h3>

                                <p>
                                    <a href="/img/avatars/{{$user->document}}" target="_blank" class="btn btn-primary">Ver documento</a>
                                </p>
                            </div> --}}

                    </div>
                    <div class="col-lg-4">

                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Foto</h3>
                            <p class="mb-0 font-weight-bold">
                                {{-- <a href="./foto.php">Editar foto</a> --}}
                                <p type="file" >
                            </p>
                        </div>

                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Info</h3>
                            <p>Tienes más preguntas sobre los modulares.</p>
                            <p>
                                <a href="/faq" class="btn btn-primary  py-2 px-4">Ir</a>
                            </p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Enlaces rápidos a cucei o UDG</h3>
                            <a href="http://www.cucei.udg.mx/" target="_blank">
                            <i class="fa fa-circle" aria-hidden="true" title="CUCEI"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://es-la.facebook.com/udgcucei/" target="_blank">
                            {{-- <i class="fas fa-facebook-square" ></i> --}}
                            <i class="fab fa-facebook" aria-hidden="true" title="Facebook"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://twitter.com/udgcucei?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">
                            <i class="fab fa-twitter-square" aria-hidden="true" title="Twitter"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://www.instagram.com/udgcucei/?hl=es-la" target="_blank">
                            <i class="fab fa-instagram" aria-hidden="true" title="Instagram"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="https://www.youtube.com/user/videoscucei" target="_blank">
                            <i class="fab fa-youtube" aria-hidden="true" title="Youtube"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="http://www.siiau.udg.mx/" target="_blank">
                            <i class="fa fa-university" aria-hidden="true" title="SIIAU"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="http://siiauescolar.siiau.udg.mx/wus/gupprincipal.inicio" target="_blank">
                            <i class="fa fa-graduation-cap" aria-hidden="true" title="SIIAU ESCOLAR"></i>
                            <i class="f"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            </div>


    </div>

    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
</section>
@endsection
