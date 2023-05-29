@extends('layouts/admin')

@section('content')

<div class="container py-3">

    <h1>Tipologie</h1>

    <table class="table table-striped">
        <th>Nome</th>
        <th>Descrizione</th>
        <th>Slug</th>
        <th>N° progetti</th>
        <th></th>
        
        <tbody>

            @foreach ($types as $type)
                
            <tr>
                <td>{{$type->name}}</td>
                <td>{{$type->description}}</td>
                <td>{{$type->slug}}</td>
                <td>{{count($type->projects)}}</td>
                <td><a href="{{route('admin.types.show', $type)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-around mb-5">
        <a href="{{route('admin.types.create')}}" class="btn btn-primary">
            Aggiungi una tipologia
        </a>
    </div>

</div>
    
@endsection