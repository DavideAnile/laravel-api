@extends('layouts/admin')

@section('content')

<h1 class="text-center p-4">Seleziona gestione</h1>

<div class="d-flex justify-content-center align-items-center p-4 gap-3">

    <div>
        <button class="btn btn-secondary"><a href="{{route('admin.projects.index')}}" class="text-uppercase text-decoration-none text-white">Gestisci i progetti</a></button>
    </div>
    <div>
        <button class="btn btn-secondary"><a href="{{route('admin.types.index')}}" class="text-uppercase text-decoration-none text-white">Gestisci Tipologie Progetto</a></button>
    </div>
</div>


    
@endsection