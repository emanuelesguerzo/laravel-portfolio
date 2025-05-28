@extends('layouts.types')
@section('title', 'Tutti i tipi')

@section('content')
    <div class="d-flex gap-3 py-4">
        <a class="btn btn-outline-primary" href="{{ route('types.create') }}">Aggiungi un Tipo</a>
    </div>
    <ul class="list-group mb-4">
        @foreach ($types as $type)
            <li class="list-group-item mb-2 rounded">
                <h5>{{ $type->name }}</h5>
                <p class="mb-0 text-muted mb-2">{{ $type->description }}</p>
                <a class="btn btn-outline-success" href="{{ route('types.edit', $type) }}">Modifica</a>
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                    data-bs-target="#destroyModal-{{ $type->id }}">
                    Elimina
                </button>
            </li>

            <x-modals.delete-type :type="$type" />

        @endforeach
    </ul>
@endsection
