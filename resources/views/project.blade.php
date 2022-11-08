@extends('master')

@section('title', 'project')
@section('content')
<section class="page-section bg-light mt-5" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Mis proyectos</h2> 
            @if ($project->user_id == Auth::id())
                <a href="/editProject/{{ $project->id }}" class="btn btn-primary"> Editar</a>
                <a href="/applycants/{{ $project->id }}" class="btn btn-secondary">Ver aplicantes</a>
            @else
                <a href="/applyProject/{{ $project->id }}" class="btn btn-primary"> Postularse al proyecto</a>
            @endif
            <h3 class="section-subheading text-muted">{{ $project->title }}</h3>
            <img src="/img/projects/{{ $project->image }}" alt="">
           
            <div> Tags <br>
                @foreach ($project->tags as $tag)
                <b>{{ $tag }}</b>
                @endforeach
            </div>

            <a href="/uploads/projects/{{ $project->document }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Documento</a>
            <p>Prioridad</p>
            <div class="mb-3">{{ $project->priority }}</div>
            <p>Disponibilidad</p>
            <div class="mb-3">{{ $project->schedule }}</div>
            <p>Experiencia</p>
            <div class="mb-3">{{ $project->experience }}</div>
            <p>Area</p>
            <div class="mb-3">{{ $project->area }}</div>
            <p>Notas</p>
            <div class="mb-3">{{ $project->notes }}</div>
            {{-- <p>Likes</p>
            <div class="mb-3">{{ $project->likes }}</div> --}}
        </div>
    </div>
</section>


<link rel="stylesheet" href="{{ asset('css/master.css') }}">
@endsection
