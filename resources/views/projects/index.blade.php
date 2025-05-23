@extends('layouts.projects')

@section('title', 'Tutti i Progetti')

@section('content')
    <div class="d-flex gap-3 py-2">
        <a class="btn btn-outline-primary" href="{{ route('projects.create') }}">Aggiungi un Progetto</a>
    </div>

    <div class="row g-4 mb-5">
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
                    <div class="card-footer d-flex justify-content-between">
                        <a class="btn btn-outline-success" href="{{ route('projects.edit', $project) }}">Modifica</a>
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Elimina
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    {{-- Modale Destroy --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il Progetto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Vuoi davvero eliminare il Progetto?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form action="{{ route('projects.destroy', $project) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger" value="Elimina">
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
