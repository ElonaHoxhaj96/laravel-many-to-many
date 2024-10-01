@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="fs-4 text-secondary my-4">
        Gestione categorie:
    </h2>
    @if(session('delete'))
      <div class="alert alert-danger">
          {{session('delete')}}
      </div>
   @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-4">
                <form class="d-flex justify-content-between mt-3" action="{{ route('admin.categories.store')}}", method="POST">
                    @csrf
                    <input type="text" name="name" class="form-control me-3" placeholder="Nuova categoria">
                    <button class="btn btn-success" type="submit">Invia</button>

                </form>
                <table class="table table-striped mt-5">
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <form action="{{ route('admin.categories.update', $category)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{$category->name}}">
                                        </form>
                                    </td>
                                    <td></td>
                                    <td>
                                        <button class="btn btn-warning " type="submit">Aggiorna</button>
                                    </td>
                                    <td>
                                        <button class="btn btn-danger " type="submit">Elimina</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>
@endsection

