@extends('layouts.technologies')

@section('title', "Modifica una tecnologia")

@section('content')

    <form action="{{ route("technologies.update", $technology)}}" method="POST">
        @csrf

        @method("PUT")
        <div class="form-control d-flex flex-column mb-3">

            {{-- Nome Tecnologia --}}
            <label for="name">Nome della Tecnologia</label>
            <input type="text" name="name" id="name" value="{{ $technology->name }}" required>

            {{-- Colore Badge della Tecnologia --}}
            <label for="color">Colore del badge della Tecnologia</label>
            <input type="color" name="color" id="color" value="{{ $technology->color }}" required>

        </div>

        {{-- Salva Progetto --}}
        <input type="submit" value="Salva">

    </form>
    
@endsection