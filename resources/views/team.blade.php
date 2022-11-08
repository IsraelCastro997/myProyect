@extends('master')
@section('title', 'profile')
@section('content')


<link rel="stylesheet" href="css/master.css">
<section>
    <div class="container text-center">

      <div class="row">
        @if ($team != null)
          <table class="table">
            <thead class="bg-dark">
              <tr class="text-white">
                <th scope="col">#</th>
                <th scope="col">Acesor</th>
                <th scope="col">Nombre del proyecto</th>
                <th scope="col">Lider</th>
                <th scope="col">Estudiante 1</th>
                <th scope="col">Estudiante 2</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                @if ($team->advisor_id != null)
                <td>{{ $team->advisor->name_academic }}</td>
                @else
                <td>Sin Acesor</td>
                @endif
                <td>{{ $team->project->title }}</td>
                <td>{{ $team->owner->name_student }}</td>
                <td>{{ $team->student1->name_student }}</td>
                @if ($team->user2_id != null)
                <td>{{ $team->student2->name_student }}</td>
                @else
                <td>Sin Miembro</td>
                @endif
                
              </tr>
              <tr>
                <th scope="row"></th>
                @if ($team->advisor_id != null)
                <td><a href="/profileAcademic/{{ $team->advisor->user_id }}" class="btn btn-primary">Ver info</a></td>
                @else
                <td><a href="addAcademic/" class="btn btn-success">Agregar</a></td>
                @endif
                
                <td><a href="/viewProject/{{ $team->project_id }}" class="btn btn-primary">Ver info</a></td>
                <td><a href="/profile/{{ $team->owner->user_id }}" class="btn btn-primary">Ver info</a></td>
                <td><a href="/profile/{{ $team->student1->user_id }}" class="btn btn-primary">Ver info</a></td>
                @if ($team->user2_id != null)
                <td><a href="/profile/{{ $team->student2->user_id }}" class="btn btn-primary">Ver info</a></td>
                @else
                <td>Sin Miembro</td>
                @endif
                
              </tr>
              
            </tbody>
          </table>
        @else
          <div>Aun no tienes un equipo</div>
        @endif

      </div>
    </div>

</section>
@endsection
