@extends('layouts/admin')



  @section('content')

 
  
      <h1 class="text-center p-3">Tutti i progetti</h1>
      <div class="d-flex flex-wrap mt-4 gap-4 my-container">
      
          
          <table class="table table-striped text-center">
              <thead>
                  <tr>
                      
                      <th scope="col">Nome Progetto</th>
                      <th scope="col">Creato da </th>
                      <th scope="col">Tipo Progetto</th>
                      <th scope="col">Mostra dettagli</th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($projects as $singleProject)
            <tr>
              
              <td>{{$singleProject->project_name}}</td>
              <td>{{$singleProject->created_by}}</td>
              <td>{{$singleProject->type->name ?? 'Undefined'}}</td>
              <td><a href="{{route('admin.projects.show', $singleProject->slug)}}"><i class="fa-solid fa-link"></i></a></td>
            </tr>
            
            @endforeach
          </tbody>
        </table>
      
      </div>
    
    
    
    <div class="text-center p-4"><button class="btn btn-success "><a href="{{route('admin.projects.create')}}" class="my-link">Aggiungi un progetto</a></button></div>
    
  
  
  
  
      
  @endsection
