@extends('layouts.types')
@section('title', "Inserisci un nuovo tipo")

@section('content')

    <form action="{{ route("types.store")}}" method="POST">
        @csrf

        <div class="form-control d-flex flex-column mb-3">

            {{-- Titolo Progetto --}}
            <label for="name">Nome del Tipo</label>
            <input type="text" name="name" id="name" required>

            {{-- Descrizione Progetto --}}
            <label for="description">Descrizione del Progetto</label>
            <textarea type="text" name="description" id="description" rows="2"></textarea>

        </div>

        {{-- Salva Progetto --}}
        <input type="submit" value="Salva">

    </form>
    
@endsection