@extends('layouts.admin')

@section('content')

<h1>Modifica il progetto</h1>

<form action="{{route('admin.types.update', $type)}}" method="POST">

    @csrf

    @method('PUT')

    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $type->name}}">

        @error('name')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror
    </div>

    <div class="mb-3">
        <label for="">Descrizione</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description') ?? $type->description}}</textarea>

        @error('description')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Modifica</button>
</form>
    
@endsection