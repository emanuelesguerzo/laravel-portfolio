@extends('layouts.technologies')

@section('title', "Inserisci una nuova tecnologia")

@section('content')

    <form action="{{ route("technologies.store")}}" method="POST">
        @csrf

        <div class="form-control d-flex flex-column mb-3">

            {{-- Nome Tecnologia --}}
            <label for="name">Nome della Tecnologia</label>
            <input type="text" name="name" id="name" required>

            {{-- Colore Badge della Tecnologia --}}
            <label for="color">Colore del badge della Tecnologia</label>
            <input type="color" name="color" id="color" value="#000000" required>

        </div>

        {{-- Salva Progetto --}}
        <input type="submit" value="Salva">

    </form>
    
@endsection