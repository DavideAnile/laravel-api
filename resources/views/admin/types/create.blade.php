@extends('layouts/admin')

@section('content')
    <h1 class="text-center p-3">Aggiungi nuova tipologia</h1>

    <form action="{{route('admin.types.store')}}" method="POST">
@csrf


<div class="mb-3">
    <label for="name"></label>
    <input class="form-control" type="text" id="name" name="name" placeholder="Inserisci nome Tipologia">
</div>

<div class="mb-3">
    <label for="description"></label>
    <textarea class="form-control" type="text" id="description" name="description" cols="30" rows="10" placeholder="Inserisci Descrizione Tipologia"></textarea>
</div>

<div class="text-center p-4"><button class="btn btn-primary" type="submit">Salva Tipologia</button></div>

    </form>
@endsection