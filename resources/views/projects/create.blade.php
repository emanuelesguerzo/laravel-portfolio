@extends('layouts.projects')
@section('title', 'Inserisci un nuovo progetto')

@section('content')

    <form action="{{ route('projects.store') }}" method="POST">
        @csrf

        <div class="form-control d-flex flex-column mb-3">

            {{-- Titolo Progetto --}}
            <label for="title">Titolo del Progetto</label>
            <input type="text" name="title" id="title" required>

            {{-- Descrizione Progetto --}}
            <label for="description">Descrizione del Progetto</label>
            <textarea type="text" name="description" id="description" rows="2" required></textarea>

            {{-- Immagine Progetto --}}
            <label for="cover_image">Immagine del Progetto</label>
            <input type="" name="cover_image" id="cover_image">

            {{-- URL Repo Progetto --}}
            <label for="repo_url">URL Repo del Progetto</label>
            <input type="text" name="repo_url" id="repo_url" required>

            {{-- URL Sito Progetto --}}
            <label for="website_url">URL Pagina Web del Progetto</label>
            <input type="text" name="website_url" id="website_url">

            {{-- Tipo del Progetto --}}
            <label for="type_id">Tipo di Progetto</label>
            <select name="type_id" id="type_id">
                @foreach ($types as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>

            {{-- Tecnologie del Progetto --}}
            <label for="technology-section">Tecnologie Utilizzate</label>
            <div id="technology-section" class="d-flex flex-wrap gap-3">
                @foreach ($technologies as $technology)
                    <div>
                        <input type="checkbox" name="technologies[]" value="{{ $technology->id }}" id="technology-{{ $technology->id }}">
                        <label class="user-select-none" for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>


        </div>

        {{-- Salva Progetto --}}
        <input type="submit" value="Salva">

    </form>

@endsection
