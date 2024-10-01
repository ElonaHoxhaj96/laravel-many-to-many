
<form class="d-inline-flex"
    action="{{ $route }}" 
    method="POST"
    onsubmit="return confirm('{{ $message }}')">
    @csrf
    @method('DELETE')
    
    <input type="submit" value="Elimina" class=" btn btn-danger">
</form>

