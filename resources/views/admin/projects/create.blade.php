@extends('layouts.admin')

@section('content')

<h1>Crea un progetto</h1>

{{-- aggiungo il parametro "enctype(tipologia di criptazione)" al tag per permettere di accettare anche i file --}}
<form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data">

    @csrf

    {{-- TITOLO --}}
    <div class="mb-3">
        <label for="">Titolo</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
        
        @error('title')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror
    </div>

    {{-- TIPOLOGIA --}}
    <div class="mb-3">
        <label for="type_id">Tipologia</label>
        {{-- name deve chiamarsi type_id per la corrispondenza nella tabella --}}
        <select name="type_id" id="type_id" class="form-select @error('type_id') is-invalid @enderror">

            {{-- opzione nulla --}}
            <option value="">Nessuna</option>

            {{-- ciclo per ogni tipologia contenuta nella tabella types --}}
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{$type->id == old('type_id') ? 'selected' : ''}}>{{$type->name}}</option>
            @endforeach

        </select>

        @error('type_id')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror

    </div>

    {{-- COVER_IMAGE --}}
    <div class="mb-3">

        <label for="cover_image">Immagine di copertina</label>
        <input type="file" id="cover_image" name="cover_image" class="form-control @error('cover_image') is-invalid @enderror">

        @error('cover_image')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror

    </div>

    {{-- TECNOLOGIA --}}
    <div class="mb-3 form-group">
        <h4>Tecnologie</h4>

        {{-- ciclo per ogni elemento contenuto in technologies --}}
        <div class="form-check">
            
            @foreach ($technologies as $technology)
            
            {{-- nel name ci devo inserire il nometabella[], in questo caso technologies[], perchè gli passo un array --}}
            {{-- nel value ci inserisco l'id di tech perchè sarà quello che effettivamente inserirò nella tabella ponte --}}
            {{-- nel id ci inserisco  l'id di tech e come prefisso il nome più il trattino--}}
            <input type="checkbox" id="technology_{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked(in_array($technology->id, old('technologies', [])))>
            <label for="technology_{{$technology->id}}">{{$technology->name}}</label>

            @endforeach
            
        </div>

        @error('technologies')
        <div class="fw-light" style="color: #ea868f">
            {{$message}}
        </div>
        @enderror


    </div>

    {{-- CONTENUTO --}}
    <div class="mb-3">
        <label for="">Contenuto</label>
        <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{old('content')}}</textarea>

        @error('content')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror
    </div>

    {{-- BUTTON SUBMIT --}}
    <button class="btn btn-primary" type="submit">Aggiungi</button>
</form>
    
@endsection