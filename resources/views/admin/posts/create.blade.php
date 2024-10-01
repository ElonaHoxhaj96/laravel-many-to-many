@extends('layouts.app')

@section('content')
<div class="container my-5">
   <h1>Add New Comics</h1>
   
   <form action="{{ route('admin.posts.store') }}" method="POST">
       @csrf
       <div class="mb-3">
           <label for="title" class="form-label">Titolo</label>
           <input 
           type="text" 
           class="form-control @error('title') is-invalid @enderror" 
           id="title" 
           name="title" 
           placeholder="inserisci il titolo" 
           value="{{ old('title') }}"
           >
           @error('title')
              <small class="text-danger"> {{ $message }} </small>
           @enderror
       </div> 
       <div class="mb-3">
        <label for="category" class="form-lable">Categoria</label>
        <select class="form-select" id="category" aria-label="Floating label select example">
            <option name="category_id" selected>Seleziona una categoria</option>
                @foreach($categories as $category)
                    <option 
                    value="{{ $category->id }}"
                    @if(old('category_id') == $category->id) selected @endif
                    >{{$category->name}}</option>
                @endforeach
          </select>
       </div> 
       <div class="mb-3">
           <label for="content" class="form-label">Contenuto</label>
           <textarea 
                class="form-control @error('txt') is-invalid @enderror" 
                id="content" 
                name="txt" 
                placeholder="inserisci il contenuto"
                value="{{ old('txt') }}">
            </textarea>
           @error('txt')
              <small class="text-danger">
                  {{ $message }}
              </small>
           @enderror
       </div>
      
       <div class="mb-3">
           <label for="reading_time" class="form-label">Tempo di lettura</label>
           <input type="text" class="form-control @error('reading_time') is-invalid @enderror" id="reading_time" name="reading_time" placeholder="inserisci il tempo di lettura" value="{{ old('reading_time') }}">
           @error('reading_time')
              <small class="text-danger">
                  {{ $message }}
              </small>
           @enderror
       </div>
       <div class="mb-3">
           <button type="submit" class="btn btn-success">Salva</button>
       </div>
   </form>
</div>
@endsection
