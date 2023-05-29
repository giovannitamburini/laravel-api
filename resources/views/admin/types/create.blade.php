@extends('layouts/admin')

@section('content')

<div class="container py-3">

    <h1>Aggiungii una tipologia</h1>

    <hr>

    <form action="{{route('admin.types.store')}}" method="POST">
    
        @csrf

        <div class="mb-3">

            
            <label for="">Nome</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            
            @error('name')

            <div class="invalid-feedback">
                {{$message}}
            </div>

            @enderror
            
        </div>

        <div class="mb-3">

            <label for="">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{old('description')}}</textarea>
    
            @error('description')
    
            <div class="invalid-feedback">
                {{$message}}
            </div>
                
            @enderror

        </div>

        <button class="btn btn-primary" type="submit">Aggiungi</button>

    </form>

</div>
    
@endsection