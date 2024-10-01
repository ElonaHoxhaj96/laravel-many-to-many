@extends('layouts.app')

@section('content')
<div class="container my-5">
   <h1>Modifica Post: {{$posts->title}}</h1>
   @if($errors->any())
      <div class="alert alert-danger">
           <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
           </ul>
      </div>
   @endif
   <form action="{{ route('admin.posts.update', $posts )}}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input type="text" 
           class="form-control @error('title') is-invalid @enderror" 
           id="title" 
           name="title" 
           placeholder="inserisci il titolo" 
           value="{{ old('title', $posts->title) }}">
           @error('title')
              <small class="text-danger">{{ $message }}</small>
           @enderror
       </div> 
       <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="category" name="category_id" aria-label="Seleziona una categoria">
                <option value="" disabled selected>Seleziona una categoria</option>
                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}"
                        @if(old('category_id', $posts->category->id) == $category->id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
       <div class="mb-3">
        <label for="content" class="form-label">Contenuto</label>
        <textarea class="form-control @error('txt') is-invalid @enderror" id="content" name="txt" placeholder="inserisci il contenuto"> {{ old('txt', $posts->txt) }}</textarea>
        @error('txt')
           <small class="text-danger">
               {{ $message }}
           </small>
        @enderror
    </div>
      
    <div class="mb-3">
        <label for="reading_time" class="form-label">Tempo di lettura</label>
        <input type="text" 
        class="form-control @error('reading_time') is-invalid @enderror" 
        id="reading_time" 
        name="reading_time" 
        placeholder="inserisci il tempo di lettura" 
        value="{{ old('reading_time', $posts->reading_time) }}">
        @error('reading_time')
            <small class="text-danger">
                {{ $message }}
            </small>
        @enderror
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-success">Aggiorna</button>
    </div>
   </form>
</div>
@endsection
