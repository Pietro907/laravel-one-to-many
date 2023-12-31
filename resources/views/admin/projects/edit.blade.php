@extends('layouts.admin')

@section('content')
    <div class="col-6 mx-auto">
        <form action="{{ route('project.update', $project) }}" method="post">

            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                    placeholder="scrivi un titolo per il tuo progetto" value="{{ old('title', $project->title) }}">
                <small id="titleHelper" class="form-text text-muted">Scrivi un titolo per il tuo progetto</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input type="text" class="form-control" name="description" id="description" aria-describedby="helpId"
                    placeholder="Scrivi una descrizione per il tuo progetto"
                    value="{{ old('description', $project->description) }}">
                <small id="descriptionHelper" class="form-text text-muted">Scrivi una descrizione per il tuo
                    progetto</small>
            </div>

            <div class="mb-3">
                <label for="authors" class="form-label">Autore/i</label>
                {{-- utilizziamo la funzione old per ridare all'utente i valori inseriti prima,in caso di errore --}}
                <input type="text" class="form-control" name="authors" id="authors" aria-describedby="help"
                    placeholder="Scrivi gli autori del tuo progetto" value="{{ old('authors', $project->authors) }}">
                <small id="authorsHelper" class="form-text text-muted">Scrivi gli autori del tuo progetto</small>
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Types</label>
                <select class="form-select @error('type_id') is-invalid  @enderror" name="type_id" id="type_id">

                    <option selected disabled>Select a type</option>
                    <option value="">Uncategorized</option>

                    @forelse ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->type }}
                        </option>
                    @empty
                    @endforelse



                    <button type="submit" class="btn btn-primary">Aggiungi Proj</button>
        </form>
    </div>
@endsection
