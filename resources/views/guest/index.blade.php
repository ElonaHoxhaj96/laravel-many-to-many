@extends('layouts.guest')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Pagina Pubblica
    </h2>
    <p>Vai a: <a href="{{route('admin.home')}}">Admin</a></p>
   
</div>
@endsection
