@extends('master')
@section('title', 'profile')
@section('content')



<link rel="stylesheet" href="css/master.css">
<section>
    <div class="container text-center">
        <form action=" /profile " method="post" class="form-horizontal" enctype="multipart/form-data">
        @csrf
        <div class="row">


            <div class="container text-center">
                <h2 class="mb-0">Edita tus datos de Estudiante</h2>
            </div>
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
                                    <input type="text" id="name_student" name="name_student" class="form-control"  required="true" value="{{$user->student->name_student}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                                    <input type="text" id="paternal_surname_student" name="paternal_surname_student" class="form-control"  required="true" value="{{$user->student->paternal_surname_student}}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                                    <input type="text" id="maternal_surname_student" name="maternal_surname_student" class="form-control"  required="true" value="{{$user->student->maternal_surname_student}}">
                                </div>
                            </div>

                            <div class="row form-group mb-5">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="phone">Celular</label>
                                    <input type="number" id="phone_student" name="phone_student" class="form-control"  required="true" value="{{$user->student->phone_student}}">
                                </div>
                            </div>

                            <div class="p-4 mb-3 bg-white">
                                <h3 class="h5 text-black mb-3">Documeto</h3>
                                <p class="mb-0 font-weight-bold">
                                    {{-- <a href="./foto.php">Editar foto</a> --}}
                                    <input type="file" name="document" id="document">
                                    <p>Documeto actual</p>
                                    <a href="/img/avatars/{{$user->document}}" target="_blank" class="btn btn-primary">Ver documento</a>
                                </p>

                            </div>

                            {{-- <div class="row form-group">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <label class="font-weight-bold" for="career">Carrera</label>
                                    <select class="form-control" id="career_id" name="career_id" required="true">
                                        <option value="">Seleccione..</option>
                                        @foreach ($careers as $career)
                                            <option value="{{$career->id}}">{{$career->name_career}} </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div> --}}
                            <div class="row form-group" >
                                <div class="col-md-12">
                                    <input type="submit" value="Actualizar" class="btn btn-primary  py-2 px-5">
                                </div>
                            </div>
                            <p></p>

                        </form>
                        <p></p>
                        <div class="p-4 mb-3 bg-white">
                            <p></p>


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
                    <div class="col-lg-4">
                        <div class="p-4 mb-3 bg-info text-white">
                            <h3 class="h5 text-white mb-3">IMPORTANTE</h3>
                            <p>Mantén tu perfil completo y actualizado, si lo mantienes así, mas estudiantes te pueden contactar para unirte a sus equipos.</p>
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Más detalles</h3>
                            <i class="fa fa fa-trash" aria-hidden="true" title="Eliminar" aria-hidden="true" data-toggle="modal" data-target="#dialogo1" color="yellow"></i>


                            <div class="modal fade" id="dialogo1">
                              <div class="modal-dialog">
                                <div class="modal-content">

                                  <!-- cabecera del diálogo -->
                                  <div class="modal-header">
                                    <h4 class="modal-title">Eliminar Perfil</h4>
                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                  </div>

                                  <!-- cuerpo del diálogo -->
                                  <div class="modal-body">
                                    ¿Estas seguro de eliminar tu Perfil?.
                                  </div>

                                  <!-- pie del diálogo -->
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                        <form action=" /eliminarStudent " method="get" class="form-horizontal">
                                            <input type="submit" value="Aceptar" class="btn btn-primary  py-2 px-5">
                                            </form>
                                </div>

                                </div>
                              </div>
                            </div>



                          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
                          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

                            &nbsp;&nbsp;
                            <a href="./soporte.php" target="_blank">
                            <i class="fa fa-life-ring" aria-hidden="true" title="Soporte Personal"></i>
                            </a>
                            &nbsp;&nbsp;
                            <a href="./soporte.php" target="_blank">
                            <i class="fa fa-lock" aria-hidden="true"  title="Cambiar contraseña"></i>
                            </a>
                            &nbsp;&nbsp;
                        </div>
                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3">Foto</h3>
                            <p class="mb-0 font-weight-bold">
                                {{-- <a href="./foto.php">Editar foto</a> --}}
                                <input type="file" name="avatar" id="avatar">
                                <p>Imagen actual</p>
                                <img src="/img/avatars/{{$user->avatar}}" alt="avatar" width="400px">
                            </p>
                        </div>


                        <div class="p-4 mb-3 bg-white">
                            <h3 class="h5 text-black mb-3"> Info</h3>
                            <p>Tienes más preguntas sobre los modulares.</p>
                            <p>
                                <a href="/faq" class="btn btn-primary  py-2 px-4">Ir</a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            </div>

        </form>
    </div>


</section>
@endsection
