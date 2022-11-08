@extends('master')
@section('title', 'profile')
@section('content')


<link rel="stylesheet" href="css/master.css">
<section>
    <div class="container text-center">

      <div class="row">

          <table class="table">
              <thead class="bg-dark">
                <tr class="text-white">
                  <th scope="col">#</th>
                  <th scope="col">Acesor</th>
                  <th scope="col">Info</th>
                  <th scope="col">Agregar</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($academics as $key => $academic)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $academic->name_academic }} {{ $academic->maternal_surname_academic }} {{ $academic->paternal_surname_academic }}</td>
                    <td><a href="/profileAcademic/{{ $academic->user_id }}" class="btn btn-primary"><i class="far fa-eye"></i></a></td>
                    <td><a href="/addAcademic/{{ $academic->user_id }}" class="btn btn-success"><i class="fas fa-user-plus"></i></a></td>
                </tr>
                 
                @endforeach
                
              </tbody>
            </table>
      </div>
    </div>

</section>
@endsection
