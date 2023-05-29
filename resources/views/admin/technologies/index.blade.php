@extends('layouts/admin')

@section('content')

<div class="container py-3">

    <h1>Tecnologie</h1>

    <table class="table table-striped">
        <th>Nome</th>
        <th>Slug</th>
        <th>N° progetti</th>
        <th></th>
        <th></th>
        
        <tbody>

            @foreach ($technologies as $technology)
                
            <tr>
                <td>{{$technology->name}}</td>
                <td>{{$technology->slug}}</td>
                <td>{{count($technology->projects)}}</td>
                <td><a href="{{route('admin.technologies.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
                <td>
                    {{-- <a href="{{route('admin.technology.show', $technology)}}"><i class="fa-solid fa-magnifying-glass"></i></a> --}}
                    <div class="d-flex gap-1">

                        <a href="{{route('admin.technologies.edit', $technology)}}" class="btn btn-primary">Modifica</a>
                
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            Elimina
                        </button>
                
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-around mb-5">
        <a href="{{route('admin.technologies.create')}}" class="btn btn-primary">
            Aggiungi una tecnologia
        </a>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Elimina Tipologia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Sei sicuro di voler eliminare definitivamente la tecnologia "{{$technology->name}}" ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
          
                <form action="{{route('admin.technologies.destroy', $technology)}}" method="POST">
        
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Elimina</button>
                </form>

            </div>
        </div>
    </div>
</div>
    
@endsection