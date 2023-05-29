@extends('layouts/admin')

@section('content')


    

        <h2 class="p-4"> Modifica il progetto : {{$project->project_name}}!</h2>
        
        <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data">
        
            @csrf
        
            @method('PUT')
        
        
        
                <div class="mb-3">
                    <label for="type_id"></label>
                    <select class="form-control @error('type_id') is-invalid @enderror" type="text" name="type_id" id="type_id" placeholder="Inserisci il tipo di progetto">
                        
                        <option value="">Undefined</option>
        
                        @foreach ($types as $type)
                            <option value="{{$type->id}}" {{$type->id == old('type_id' , $project->type_id) ? 'selected' : ''}}>{{$type->name}}</option>
                        @endforeach
        
                    </select>
                    @error('type_id')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
        
                </div>
        
                <div class="mb-3">
                    <label for="project_name"></label>
                    <input class="form-control @error('project_name') is-invalid @enderror" type="text" name="project_name" id="project_name" placeholder="Inserisci il nome del progetto" value="{{old('project_name') ?? $project->project_name}}">
                    @error('project_name')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="project_cover"></label>
                    <input type="file" id="project_cover" name="project_cover" class="form-control @error('project_cover') is-invalid @enderror">
                    @error('project_cover')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                        
        
                <div class="mb-3 form-group">
                    <div class="text-uppercase fw-bold">Tecnologie usate :</div>
        
                    @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" id="tag-{{$technology->id}}" name="technologies[]" value="{{$technology->id}}" @checked($project->technologies->contains($technology))>
                        <label for="tag-{{$technology->id}}">{{$technology->name}}</label>
                    </div>
                    @endforeach
                        
        
        
                <div class="mb-3">
                    <label for="project_description"></label>
                    <textarea class="form-control @error('project_description') is-invalid @enderror" name="project_description" id="project_description" cols="30" rows="10" placeholder="inserisci la descrizione del progetto">{{old('project_description') ?? $project->project_description}}</textarea>
                    @error('project_description')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="github_Link"></label>
                    <input class="form-control @error('github_Link') is-invalid @enderror" type="text" name="github_Link" id="github_Link" placeholder="Inserisci il link Github del progetto" value="{{old('github_Link') ?? $project->github_link}}">
                    @error('github_Link')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        
                <div class="mb-3">
                    <label for="created_by"></label>
                    <input class="form-control @error('created_by') is-invalid @enderror" type="text" name="created_by" id="created_by" placeholder="Creato da :" value="{{old('created_by') ?? $project->created_by}}">
                    @error('created_by')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
        
                <div class="text-center p-4"><button class="btn btn-primary" type="submit">Salva Progetto</button></div>
        
        </form>
            
  
        @endsection
