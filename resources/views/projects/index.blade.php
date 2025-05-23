@extends('layouts.projects')

@section('title', 'Tutti i Progetti')

@section('content')
    <div class="d-flex gap-3 py-2">
        <a class="btn btn-outline-success" href="{{ route('projects.create') }}">Aggiungi un Progetto</a>
    </div>

    <div class="row g-4">
        @foreach ($projects as $project)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 mb-3">
                    <div class="card-header">
                        {{ $project->cover_image }}
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <a href="{{ route('projects.show', $project->id) }}" class="btn btn-primary">Dettagli</a>
                        <a class="repo-link mt-auto" href="{{ $project->repo_url }}">Vedilo su GitHub!</a>
                        <span>{{ $project->website_url }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


@endsection
