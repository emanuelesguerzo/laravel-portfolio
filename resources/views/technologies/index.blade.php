@extends('layouts.technologies')

@section('title', 'Tutte le tecnologie')

@section('content')
    <div class="d-flex gap-3 py-4">
        <a class="btn btn-outline-primary" href="{{ route('technologies.create') }}">Aggiungi una Tecnologia</a>
    </div>
    <ul class="list-group mb-4 d-flex justify-content-center flex-row flex-wrap gap-3">
        @foreach ($technologies as $technology)
            <li class="list-group-item rounded" style="border-color: {{ $technology->color }}">
                <h5>{{ $technology->name }}</h5>
                <p class="mb-0 text-muted mb-2">{{ $technology->description }}</p>
                <a class="btn btn-outline-success" href="{{ route('technologies.edit', $technology) }}">Modifica</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#destroyModal-{{ $technology->id }}">
                    Elimina
                </button>
            </li>

            <x-modals.delete-technology :technology="$technology" />
            
        @endforeach
    </ul>
@endsection
