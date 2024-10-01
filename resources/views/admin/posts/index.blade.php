@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Elenco dei Post:
    </h2>
    @if(session('delete'))
      <div class="alert alert-danger">
          {{session('delete')}}
      </div>
   @endif
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col"># Id</th>
            <th scope="col">Titolo</th>
            <th scope="col">Categoria</th>
            <th scope="col">Data</th>
            <th scope="col">Azione</th>
            <th scope="col">Tag</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{ $post->category ? $post->category->name : 'Nessuna categoria' }}</td>
                    <td>{{( $post->created_at )->format('d/m/Y')}}</td>
                    <td>
                        @if ($post->gategory)
                            <span class="badge text-bg-success">
                                <a class="text-white" href="{{ route('admin.postPerCategory', $post->caregory)}}">
                                    {{$post->category->name}}
                                </a>
                            </span>
                        @else 
                            -
                        @endif
                    </td>
                    <td>
                        @forelse($post->tags as $tag)
                            <span class="badge text-bg-warning">
                                {{$tag->name}}
                            </span>
                        @empty
                            -
                        @endforelse
                    </td>
                    <td class="d-flex justify-content-between">
                        <a href="{{ route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-info">Modifica</a>
                       @include('admin.partials.formdelete', [
                        'route' => route('admin.posts.destroy', $post),
                        'message' => 'Sei sicuro di voler eliminare il post' . $post->title . '?'
                       ])
                    </td>
                                    
                </tr>
            @endforeach
        </tbody>
    </table>
   {{$posts->links()}}
</div>
@endsection

