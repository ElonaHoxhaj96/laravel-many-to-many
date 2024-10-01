@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card">  
    <div class="card-body">
        <h5 class="card-title">Titolo: {{$posts->title}} 
            <a class="btn btn-warning" href="{{route('admin.posts.edit', $posts)}}" title="modifica" >Modifica</i>
            </a>
            @include('admin.partials.formdelete', [
                    'route' => route('admin.posts.destroy', $posts),
                    'message' => 'Sei sicuro di voler eliminare il post' . $posts->title . '?'
                ])
        </h5>
    </div>     
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><strong>Categoria:</strong> {{$posts->category ? $posts->category->name : 'Nessuna Categoria'}}</li>
        <li class="list-group-item"><strong>Contenuto:</strong> {{$posts->txt}}</li>
        <li class="list-group-item"><strong>Tempo di lettura:</strong> {{$posts->reading_time}}</li>
        <li class="list-group-item"><strong>Data di creazione:</strong> {{$posts->created_at}}</li>
        <li class="list-group-item"><strong>Data aggiornamento:</strong> {{$posts->updated_at}}</li>
    </ul>
    <a class="btn btn-sucsses" href="{{route('admin.posts.index')}}" >Torna all'elenco</a>
    </div>
</div>

@endsection


@section('titlePage')
    Dettagli Post
@endsection
