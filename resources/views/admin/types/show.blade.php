@extends('layouts/admin')

@section('content')
    
<h2 class="text-center p-4">All Projects <em>from</em> {{$type->name}}</h2>

@if (count($type->projects) > 0)

<div class="p-3">

    <table class="table table-striped text-center">
        
        
        <thead>
            
            
                <td ><strong class="text-nowrap"> Nome Progetto :</strong></td>
                <td><strong>Descrizione :</strong></td>
                <td><strong>Link Github :</strong></td>
                <td><strong>Data creazione :</strong></td>
                <td><strong>Creato da :</strong></td>
                
            </thead>
            
            
            <tbody>
                
                @foreach ($type->projects as $project)
                
                <tr>
                    
                    
                    <td >{{$project->project_name}}</td>
                    <td>{{$project->project_description}}</td>
                    <td> <a href="{{$project->github_link}}">{{$project->github_link}}</a></td>
                    <td>{{$project->created_at}}</td>
                    <td>{{$project->created_by}}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
    

@else

<div class="p-4">Nessun Progetto di Tipologia <strong>{{$type->name}}</strong> trovato! </div>
    
    @endif
@endsection
        

        
        
        
      
        
        
      
        