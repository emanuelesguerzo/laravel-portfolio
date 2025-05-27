@extends('layouts.projects')
@section('title', $project->title)

<a href="{{ route("projects.index") }}"><- Tutti i Progetti</a>

@section('content')
    <span>Tipo: {{ $project->type?->name }}</span>
    <div class="d-flex gap-3">
        <a class="btn btn-outline-success" href="{{ route('projects.edit', $project) }}">Modifica</a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#destroyModal-{{ $project->id }}">
            Elimina
        </button>
    </div>
    <p class="card-text">{{ $project->description }}</p>

    {{-- Modale Destroy --}}
    <x-modals.delete-project :project="$project" />

@endsection
