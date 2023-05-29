@extends('layouts.admin')

@section('content')

<div class="container">
    
    <table class="table table-striped mb-5">
        <thead>
            <th>
                Titolo
            </th>
            <th>
                Contenuto
            </th>
        <th>
            Slug
        </th>
        <th>
            Tipologie
        </th>
        <th>
            Tecnologie
        </th>
        <th>
            {{-- comandi --}}
        </th>
    </thead>
    
    <tbody>
        
        {{-- ciclo per ogni project --}}
        @foreach ($projects as $project)
            
        <tr>
            <td>{{$project->title}}</td>
            <td>{{$project->content}}</td>
            <td>{{$project->slug}}</td>
            {{-- aggiungo il punto di domanda per includere la possibilitò che la tipologia sia nulla --}}
            <td>{{$project->type?->name}}</td>
            {{-- tecnologie --}}
            <td>
                {{-- primo metodo --}}
                {{-- ciclo all'interno delle tecnologie del progetto --}}
                {{-- @foreach ($project->technologies as $technology)
                <span class="badge rounded-pill mx-1" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
                @endforeach --}}

                {{-- secondo metodo --}}
                @php
                    // mi creo un array vuoto
                    $technologyNames = [];
                    // ciclo per riempire l'array con i nomi dei progetti
                    foreach ($project->technologies as $technology) {    
                        $technologyNames[] = $technology->name;
                    }
                    // stampo a schermo gli elementi dell'array separati da una virgola con lo spazio
                    echo implode(', ', $technologyNames);
                @endphp

            </td>
            <td>
                <a href="{{route('admin.projects.show', $project->slug)}}">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>

<div class="d-flex justify-content-around mb-5">
    <a href="{{route('admin.projects.create')}}" class="btn btn-primary">
        Aggiungi un progetto
    </a>
</div>

</div>

@endsection