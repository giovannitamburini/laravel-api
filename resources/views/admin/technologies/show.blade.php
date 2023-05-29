@extends('layouts/admin')

@section('content')

<div class="coontainer py-3">

    {{-- nome del tipo inserito nel titolo --}}
    <h1>Progetti della tipologia "{{$technology->name}}"</h1>

    {{-- comprendo l'eventualità che la tipologia mostrata non abbia alcun progetto --}}
    @if(count($technology->projects) > 0)

    <table class="table table-striped">
        <th>Titolo</th>
        <th>Slug</th>
        <th></th>
        
        
        <tbody>

            @foreach ($technology->projects as $project)
                
            <tr>
                {{-- titolo --}}
                <td>{{$project->title}}</td>
                {{-- slug --}}
                <td>{{$project->slug}}</td>
                {{-- link che porta alla show del singolo progetto --}}
                <td><a href="{{route('admin.projects.show', $project)}}"><i class="fa-solid fa-magnifying-glass"></i></a></td>
            </tr>

            @endforeach
        </tbody>
    </table>

    {{-- altrimenti --}}
    @else

    <em>Nessun progetto disponibile per la tecnologia selezionata</em>

    @endif

    <div class="d-flex justify-content-around">

        <a href="{{route('admin.technologies.edit', $technology)}}" class="btn btn-primary">Modifica</a>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
            Elimina
        </button>

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