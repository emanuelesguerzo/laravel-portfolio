@extends('layouts.projects')
@section('title', 'Modifica il progetto')

<a href="{{ route('projects.show', $project) }}"><- Torna al Progetto</a>
        @section('content')

            <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf

                @method('PUT')

                <div class="form-control d-flex flex-column mb-3">

                    {{-- Titolo Progetto --}}
                    <label for="title">Titolo del Progetto</label>
                    <input type="text" name="title" id="title" value="{{ $project->title }}" required>

                    {{-- Descrizione Progetto --}}
                    <label for="description">Descrizione del Progetto</label>
                    <textarea type="text" name="description" id="description" rows="5" required>{{ $project->description }}</textarea>

                    {{-- Immagine Progetto --}}
                    <label for="cover_image">Immagine del Progetto</label>
                    <input type="file" name="cover_image" id="cover_image">
                    @if($project->cover_image)
                    <div class="">
                        <img class="img-fluid w-25" src="{{ asset("storage/" . $project->cover_image )}}" alt="Immagine della pagina {{ $project->title }}">
                    </div>
                    @endif

                    {{-- URL Repo Progetto --}}
                    <label for="repo_url">URL Repo del Progetto</label>
                    <input type="text" name="repo_url" id="repo_url" value="{{ $project->repo_url }}" required>

                    {{-- URL Sito Progetto --}}
                    <label for="website_url">URL Pagina Web del Progetto</label>
                    <input type="text" name="website_url" id="website_url" value="{{ $project->website_url }}">

                    {{-- Tipo del Progetto --}}
                    <label for="type_id">Tipo di Progetto</label>
                    <select name="type_id" id="type_id">
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}" {{ $project->type_id == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}</option>
                        @endforeach
                    </select>

                    {{-- Tecnologie Progetto --}}
                    <label for="technology-section">Tecnologie Utilizzate</label>
                    <div id="technology-section" class="d-flex flex-wrap gap-3">
                        @foreach ($technologies as $technology)
                            <div>
                                <input type="checkbox" name="technologies[]" value="{{ $technology->id }}"
                                    id="technology-{{ $technology->id }}"
                                    {{ $project->technologies->contains($technology->id) ? 'checked' : '' }}>
                                <label class="user-select-none"
                                    for="technology-{{ $technology->id }}">{{ $technology->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Salva Progetto --}}
                <input type="submit" value="Salva">

            </form>

        @endsection
