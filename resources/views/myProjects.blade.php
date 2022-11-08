@extends('master')

@section('title', 'my projects')
@section('content')

<section class="page-section bg-light mt-5" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Mis proyectos</h2>
            <h3 class="section-subheading text-muted">PROPUESTAS DE PROYCTOS CREADOS POR MI</h3>
        </div>
        <div class="row">

        @foreach ($projects as $project)
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="#modalP{{ $project->id }}">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $project->title }}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ $project->area }}</div>
                    </div>
                </div>
            </div>

            <!-- Portfolio Modal-->

            <div class="modalP" id="modalP{{ $project->id }}">
                <figure class="modal_picture">
                    <img src="/uploads/projects/{{ $project->image }}" alt="" class="modal_img">
                    <div class="container justify-content-center">
                        <a href="#{{ $project->id }}" class="modalP_close" >x</a>
                        <p class="text-white">{{ $project->notes }}</p>
                        <a href="/viewProject/{{ $project->id }}" class="btn btn-secondary pb-3">Visitar Proyecto</a>
                    </div>

                </figure>
            </div>
        @endforeach

        </div>
    </div>
</section>

<link rel="stylesheet" href="css/master.css">
@endsection
