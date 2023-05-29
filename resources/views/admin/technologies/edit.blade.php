@extends('layouts.admin')

@section('content')

<h1>Modifica la tecnologia</h1>

<form action="{{route('admin.technologies.update', $technology)}}" method="POST">

    @csrf

    @method('PUT')

    <div class="mb-3">
        <label for="">Nome</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name') ?? $technology->name}}">

        @error('name')

        <div class="invalid-feedback">
            {{$message}}
        </div>
            
        @enderror
    </div>

    <button class="btn btn-primary" type="submit">Modifica</button>
</form>
    
@endsection