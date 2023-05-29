@extends('layouts/app')

@section('content')



<table class="table table-striped">
    
    <h2 class="text-center m-5">Dettagli del progetto : {{$project->project_name}}</h2>
    <tbody>
      <tr>
       
        <td ><strong class="text-nowrap"> Nome Progetto :</strong>  </td>
        <td >{{$project->project_name}}</td>
        
      </tr>
      <tr>
        
        <td><strong>Descrizione :</strong></td>
        <td>{{$project->project_description}}</td>
        
      </tr>
      <tr>
        
        <td><strong>Link Github :</strong></td>
        <td> <a href="{{$project->github_link}}">{{$project->github_link}}</a></td>
      </tr>

      <tr>
        <td><strong>Data creazione :</strong></td>
        <td>{{$project->created_at}}</td>
      </tr>

      <tr>
        <td><strong>Creato da :</strong></td>
        <td>{{$project->created_by}}</td>
      </tr>
    </tbody>
  </table>

  <div><button class="btn btn-warning"><a href="{{route('projects.index')}}" class="my-link">Torna all'indice</a></button></div>

  @endsection