@extends('layouts.projects')
@section('title', "Modifica il progetto")

<a href="{{ route("projects.show", $project) }}"><- Torna al Progetto</a>
@section('content')

    <form action="{{ route("projects.update", $project) }}" method="POST">
        @csrf

        @method("PUT")

        <div class="form-control d-flex flex-column mb-3">

            {{-- Titolo Progetto --}}
            <label for="title">Titolo del Progetto</label>
            <input type="text" name="title" id="title" value="{{ $project->title }}" required>

            {{-- Descrizione Progetto --}}
            <label for="description">Descrizione del Progetto</label>
            <textarea type="text" name="description" id="description" rows="5" required>{{ $project->description }}</textarea>

            {{-- Immagine Progetto --}}
            <label for="cover_image">Immagine del Progetto</label>
            <input type="" name="cover_image" id="cover_image" value="{{ $project->cover_image }}">

            {{-- URL Repo Progetto --}}
            <label for="repo_url">URL Repo del Progetto</label>
            <input type="text" name="repo_url" id="repo_url" value="{{ $project->repo_url }}" required>

            {{-- URL Sito Progetto --}}
            <label for="website_url">URL Pagina Web del Progetto</label>
            <input type="text" name="website_url" id="website_url" value="{{ $project->website_url }}">

        </div>

        {{-- Salva Progetto --}}
        <input type="submit" value="Salva">

    </form>
    
@endsection