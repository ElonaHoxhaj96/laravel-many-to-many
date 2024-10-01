@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Welcome to your personalized page!
    </h2>
    <h4>Attualmente sono presenti {{ $count_post}} post</h4>
    
</div>
@endsection
