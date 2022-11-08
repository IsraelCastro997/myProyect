@extends('master')
{{-- @php --}}
    {{-- dd($user->student); --}}
{{-- @endphp --}}



@section('title', 'profile')
@section('content')
<link rel="stylesheet" href="css/master.css">


<section>
    <div class="container text-center">
        <div class="container text-center">
            <h1 class="mb-0">Hola  {{$user->name}}</h1>
        </div>
        <div class="container text-center">
            <br>
            <h2 >Por favor indiqueme que tipo de usuario eres</h2>
        </div>

<div class="mt-5">

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal" data-bs-whatever="@mdo">Estudiante</button>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#academicModal" data-bs-whatever="@fat">Academico</button>

</div>

<div class="mt-5">

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#dialogo1">Eliminar Cuenta</button>

    <div class="modal fade" id="dialogo1">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- cabecera del diálogo -->
          <div class="modal-header">
            <h4 class="modal-title">Eliminar Cuenta</h4>
            <button type="button" class="close" data-dismiss="modal">X</button>
          </div>

          <!-- cuerpo del diálogo -->
          <div class="modal-body">
            ¿Estas seguro de eliminar tu cuenta?.
          </div>

          <!-- pie del diálogo -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <form action=" /eliminarCuenta " method="get" class="form-horizontal">
                <input type="submit" value="Aceptar" class="btn btn-primary  py-2 px-5">
                </form>
          </div>

        </div>
      </div>
    </div>

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>



<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

     <form action=" /addProfileStudent " method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Estudiante</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <div class="row form-group">

            <div class="col-md-12 mb-3 mb-md-0">
                <label class="font-weight-bold" for="name">Nombre</label>
                <input type="text" id="name_student" name="name_student" class="form-control" placeholder="Ejemplo: Perla Janeth"   required="true" >
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                    <input type="text" id="paternal_surname_student" name="paternal_surname_student" class="form-control" placeholder="Ejemplo: Soto"  required="true" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                    <input type="text" id="maternal_surname_student" name="maternal_surname_student" class="form-control" placeholder="Ejemplo: Martinez"  required="true" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="phone">Celular</label>
                    <input type="number" id="phone_student" name="phone_student" class="form-control" placeholder="Ejemplo: 3310256478" required="true" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="phone">Codigo</label>
                    <input type="number" id="code_student" name="code_student" class="form-control" placeholder="Ejemplo: 220083117" required="true" >
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="career">Carrera</label>
                    <select class="form-control" id="career_id" name="career_id" required="true">
                        <option value="">Seleccione..</option>
                        @foreach ($careers as $career)
                            <option value="{{$career->id}}">{{$career->name_career}} </option>
                        @endforeach

                    </select>
                </div>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" value="Registrar Perfil" class="btn btn-primary  py-2 px-5">
        </div>
      </div>
     </form>
    </div>
  </div>
</div>


<div class="modal fade" id="academicModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action=" /addProfileAcademic " method="post" class="form-horizontal">
          @csrf
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Academico</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

        <div class="modal-body">

            <div class="row form-group">

                <div class="col-md-12 mb-3 mb-md-0">
                    <label class="font-weight-bold" for="name">Nombre</label>
                    <input type="text" id="name_academic" name="name_academic" class="form-control" placeholder="Ejemplo: John"   required="true" >
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="paternalSurname">Apellido Paterno</label>
                        <input type="text" id="paternal_surname_academc" name="paternal_surname_academic" class="form-control" placeholder="Ejemplo: Soto"  required="true" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="maternalSurname">Apellido Materno</label>
                        <input type="text" id="maternal_surname_academic" name="maternal_surname_academic" class="form-control" placeholder="Ejemplo: Martinez"  required="true" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="phone">Celular</label>
                        <input type="number" id="phone_academic" name="phone_academic" class="form-control" placeholder="Ejemplo: 3310256478" required="true" >
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-12 mb-3 mb-md-0">
                        <label class="font-weight-bold" for="phone">Codigo</label>
                        <input type="number" id="code_academic" name="code_academic" class="form-control" placeholder="Ejemplo: 220083117" required="true" >
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <input type="submit" value="Registrar Perfil" class="btn btn-primary  py-2 px-5">
            </div>
        </div>
        </form>
      </div>
  </div>
</div>



</section>
@endsection
