@extends('layouts/app')
@section('content')

<h1 class="text-center mt-4">Projects List</h1>



<div class="d-flex flex-wrap mt-4 gap-4 container">

    
    <table class="table table-striped text-center">
        <thead>
            <tr>
                
                <th scope="col">Nome Progetto</th>
                <th scope="col">Creato da </th>
                <th scope="col">Mostra dettagli</th>
                
            </tr>
        </thead>
        <tbody>
        @foreach ($projects as $singleProject)
      <tr>
        
        <td>{{$singleProject->project_name}}</td>
        <td>{{$singleProject->created_by}}</td>
        <td><a href="{{route('projects.show', $singleProject->slug)}}"><i class="fa-solid fa-link"></i></a></td>
        
        
      </tr>
      
      @endforeach
    </tbody>
  </table>

</div>


@endsection