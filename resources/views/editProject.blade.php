@extends('master')

@section('title', 'Edit project')
@section('content')
<link rel="stylesheet" href="{{ asset('css/master.css') }}">
<section>
    <div class="container text-center">
        <form action="/editProject/{{ $project->id }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="mx-auto col-md-12"><h3>Editar proyecto</h3><br></div>
        </div>
        <div class="row">
            <label for="title" class="col-sm-2 col-form-label">Nombre del proyecto</label>
            <div class="col-sm-10">
                <input type="text" id="title" name="title" class="form-control" placeholder="my-project" required="true" value="{{ $project->title }}">
            </div>
        </div>

    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">Carrera</label>
            <div class="col-sm-10">
                <select class="form-control" id="career_id" name="career_id" required="true">
                        <option value="">Seleccione...</option>
                        @foreach ($careers as $career)
                            <option value="{{ $career->id }}">{{ $career->name_career }}</option>
                        @endforeach
                </select>
            </div>
        </div>
  
    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">División</label>
            <div class="col-sm-10">
                <select class="form-control" id="division" name="division" required="true">
                    <option value="">Seleccione...</option>
                    <option value="ingenierias">Ingenierías</option>
                    <option value="ciencias basicas">Ciencias Básicas</option>
                    <option value="divec">Electronica y computación</option>
                </select>
            </div>
        </div>
    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">Prioridad</label>
            <div class="col-sm-10">
                <select class="form-control" id="priority" name="priority" required="true">
                    <option value="">Seleccione...</option>
                    <option value="baja">Baja</option>
                    <option value="media">Normal</option>
                    <option value="alta">Alta</option>
                </select>
            </div>
        </div>
    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">Horario para proyecto</label>
            <div class="col-sm-10">
                <select class="form-control" id="schedule" name="schedule" required="true">
                    <option value="">Seleccione...</option>
                    <option value="matunino">Matunino</option>
                    <option value="vespertino">Vespertino</option>
                    <option value="mixto">mixto</option>
                </select>
            </div>
        </div>
    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">Experencia requerida</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="experience" name="experience" required="true" value="{{ $project->experience }}">
            </div>
        </div>
    <br>
        <div class="row">
            <label class="col-sm-2 col-form-label">Área</label>
            <div class="col-sm-10">
                <select class="form-control" id="area" name="area" required="true">
                    <option value="ninguna">Seleccione...</option>
                    <option value="salud">Salud</option>
                    <option value="energia">Energia</option>
                    <option value="sociedad">Sociedad</option>
                    <option value="ambiente">Ambiente</option>
                    <option value="educacion">Educación</option>
                    <option value="desarrollo_sustentable">Desarrollo Sustentable</option>
                    <option value="desarrollo_tecnologico">Desarrollo Tecnológico</option>
                    <option value="conocimiento_del_universo">Conocimiento del Universo</option>
                </select>
            </div>
        </div>
    <br>
        <div class="row form-group">
            <div class="col-md-12 mb-3 mb-md-0">
                <label class="col-sm-2 col-form-label" for="notes"><h3 class="h5 mb-3">Notas</h3></label>
                <textarea class="form-control" name="notes" id="notes" required="true" cols="30" rows="5"></textarea>
            </div>
        </div>
    <br>
        <div class="row">
            <label  class="col-sm-2 col-form-label"  for="tags">Etiquetas</label>
            <div class="col-sm-10 my-3">
                <input type="text" id="tags" name="tags" class="form-control" placeholder="my-project, inni" required="true" value="{{ $project->tags }}">
                <label class="font-weight-bold" for="">*Separadas por comas</label>
            </div>
        </div>
        <br>
        <div class="row form-group">
            <label class="col-sm-2 col-form-label" for="document">Documento</label>
            <div class="col-md-5 mb-3 mb-md-0">
               <input type="file" name="document">
            </div>
            <div class="col-md-5 mb-3 mb-md-0">
                <a href="/uploads/projects/{{ $project->document }}" class="btn btn-primary" target="_blank" rel="noopener noreferrer">Ver Actual</a>
             </div>
        </div>
        <div class="row form-group my-5">
            <label class="col-sm-2 col-form-label" for="image">Imagen</label>
            <div class="col-md-5 mb-3 mb-md-0">
               <input type="file" name="image">
            </div>
            <div class="col-md-5 mb-3 mb-md-0">
               <img src="/uploads/projects/{{ $project->image }}" alt="img project">
             </div>
        </div>
        <div class="col-lg-12">
            <div class="p-4 mb-3 bg-white">
                <p>No olvides publicar el documento de tu propuesta. El formato es diferente dependiendo de la carrera.</p>
            </div>
        </div>
    <br>
        <div class="row">
            <div class="col-lg-12">
                <input type="submit" value="Editar" class="btn btn-primary py-2 px-5">
            </div>
        </div>
    <br>
        </form>
    </div>
</section>

<script>
    var division = document.getElementById("division");
    division.value = "<?php echo $project->division; ?>";
    var career = document.getElementById("career_id");
    career.value = "<?php echo $project->career_id; ?>";
    var priority = document.getElementById("priority");
    priority.value = "<?php echo $project->priority; ?>";

    var schedule = document.getElementById("schedule");
    schedule.value = "<?php echo $project->schedule; ?>";

    var area = document.getElementById("area");
    area.value = "<?php echo $project->area; ?>";

    var notes = document.getElementById("notes");
    notes.innerHTML = "<?php echo $project->notes; ?>";
</script>
@endsection

