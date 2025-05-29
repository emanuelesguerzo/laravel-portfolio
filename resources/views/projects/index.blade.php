@extends('layouts.projects')

@section('title', 'Tutti i Progetti')

@section('content')
    <div class="d-flex gap-3 py-2">
        <a class="btn btn-outline-primary mb-2" href="{{ route('projects.create') }}">Aggiungi un Progetto</a>
    </div>

    <div class="row g-4 mb-5">
        @foreach ($projects as $project)
            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                <div class="card h-100 mb-3">
                    @if($project->cover_image)
                    <div class="card-header">
                        <img class="img-fluid w-100" style="height: 200px; object-fit: cover; object-position: top;" src="{{ asset("storage/" . $project->cover_image )}}" alt="Immagine della pagina {{ $project->title }}">
                    </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <div class="mb-2">
                            @foreach ($project->technologies as $technology)
                                <span class="badge" style="background-color: {{ $technology->color }}">{{ $technology->name }}</span>
                            @endforeach
                        </div>
                        <span class="mb-2">{{ $project->type->name }}</span>
                        <a class="repo-link" href="{{ $project->repo_url }}" target="_blank" rel="noopener noreferrer">Vedilo su GitHub!</a>
                        <span>{{ $project->website_url }}</span>
                        <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary mt-auto">Dettagli</a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a class="btn btn-outline-success" href="{{ route('projects.edit', $project) }}">Modifica</a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#destroyModal-{{ $project->id }}">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>

            {{-- Modale Destroy --}}
            <x-modals.delete-project :project="$project" />
            
        @endforeach
    </div>

@endsection
