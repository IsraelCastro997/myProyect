@extends('master')

@section('title', 'my requests')
@section('content')

<section class="page-section bg-light mt-5" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Aplicantes a este proyecto</h2>

        </div>
        <div class="row">

        @foreach ($requests as $request)
            <div class="col-lg-4 col-sm-6 mb-4">
                <!-- Portfolio item 1-->
                <div class="portfolio-item">
                    <a class="portfolio-link" href="/assets/documents/CVIsraelCastro.pdf" target="_blank">
                        {{-- {{ $request->student->pdf }}  --}}
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content"><i class="fas fa-eye fa-3x"></i></div>
                        </div>
                        <img class="img-fluid" src="/assets/img/portfolio/1.jpg" alt="..." />
                    </a>
                    <div class="portfolio-caption">
                        <div class="portfolio-caption-heading">{{ $request->user->name }}</div>
                        <div class="portfolio-caption-subheading text-muted">{{ $request->user->email }}</div>
                        <a href="/acceptRequest/{{ $request->id }}" class="btn btn-success">Aceptar</a>
                    </div>
                </div>
            </div>

        @endforeach

        </div>
    </div>
</section>

<link rel="stylesheet" href="css/master.css">
@endsection
