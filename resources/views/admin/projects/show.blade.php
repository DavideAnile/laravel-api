@extends('layouts/admin')

@section('content')



    <table class="table table-striped">
        
        <h2 class="text-center p-4">Dettagli del progetto : {{$project->project_name}}</h2>

        <div class="text-center img-container mb-5">
          <img src="{{asset('storage/' . $project->project_cover) }}" alt="immagine progetto">
        </div>
    
        <div class="mb-3"><strong><em>Tipo di Progetto : {{$project->type->name ?? 'Undefined'}}</em> </strong>  </div>
        <div class="mb-3">
          <strong><em>Tecnologie Utilizzate : </em></strong>
          @foreach ($project->technologies as $technology)
              <span class="badge" style="background-color: {{$technology->color}}">{{$technology->name}}</span>
          @endforeach
        
        </div>
    
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
    
        <div class="d-flex justify-content-center gap-3 p-4">
          <div><button class="btn btn-info" ><a href="{{route('admin.projects.edit' , $project->slug)}}" class="my-link">Modifica</a></button></div>
          <div><button class="btn btn-danger my-link" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button></div>
          <div><button class="btn btn-warning"><a href="{{route('admin.projects.index')}}" class="my-link">Torna all'indice</a></button></div>
        </div>
    
      
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Eliminazione Progetto</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Sei sicuro di voler eliminare il progetto : <strong>{{$project->project_name}}</strong> ?
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
              <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                @csrf
                @method('DELETE')
              <button type="submit" class="btn btn-danger">Conferma</button>
            </form>
            </div>
          </div>
        </div>
      </div>
 


@endsection