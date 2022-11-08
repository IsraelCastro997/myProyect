@extends('master')

@section('title', 'Networking')
@section('content')

<link rel="stylesheet" href="css/master.css">
<section>
    <div class="container text-center">
        <div class="row">
            <div class="mx-auto col-md-12">Red universitaria con {{ $users }} usuarios activos</div>
        </div>
        <form action="/search" method="POST">
            @csrf
            <div class="form-group">
                <label for="search">Buscar</label>
                <div class="d-flex mt-3 align-items-center">
                    <i class="fas fa-search"></i><input id="search" class="form-control" name="search">
                </div>
                
                <input type="submit" class="btn btn-primary mt-3" value="Buscar">
            </div>
        </form>
    </div>

    @isset($students)
    <div class="container mt-5">
        @if ($students->count() < 1)
        <div>No se encontraron estudiantes</div>
        @endif
        @foreach ($students as $student)
        <table class="table">
            <thead class="bg-dark">
            <tr class="text-white">
              <th scope="col" width="50%">Nombre</th>
              <th scope="col" width="50%"> </th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td width="50%" >{{ $student->name_student }} </td>
              <td width="50%"><a href="/profile/{{ $student->user_id }}" class="btn btn-primary">Ver info</a></td>
            </tr>
        </tbody>
    </table>
           
        @endforeach
    </div>
    @endisset

  
</section>
@endsection