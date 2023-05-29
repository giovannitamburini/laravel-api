@extends('layouts/admin')

@section('content')

<div class="container">
    
    <h1>Pagina di amministrazione</h1>
    
    <hr>
    
    <ul>
        <li><a href="{{route('admin.projects.index')}}">Mostra Progetti</a></li>
    </ul>
    
</div>
@endsection