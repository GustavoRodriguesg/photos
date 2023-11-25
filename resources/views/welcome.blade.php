@extends('layouts.main')
@section('content')
<main>
    <form action="/" method="POST" enctype="multipart/form-data" class="postPhoto">
        @csrf
    
        <div class="form-group">
            <label for="image">Colocar Imagem:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        
        <input type="submit" value="Enviar foto" class="btn btn-primary">
    </form>

    <div id="images">
        @foreach ($photos as $photo)
            <img src="/img/photos/{{ $photo->name }}" alt="foto">
        @endforeach
    </div>
</main>
@endsection
