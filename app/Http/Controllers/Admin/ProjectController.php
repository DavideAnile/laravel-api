<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = Project::all();

        return view('admin/projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();

       return view('admin/projects/create' , compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        
        $this->validation($formData);
        
        
        

        $newProject = new Project();

        $newProject->project_name = $formData['project_name'];
        $newProject->project_description = $formData['project_description'];
        $newProject->github_link = $formData['github_Link'];
        $newProject->created_by = $formData['created_by'];
        $newProject->slug = Str::slug($formData['project_name'] , '-');
        $newProject->type_id = $formData['type_id'];

        if($request->hasFile('project_cover')){

            $path = Storage::put('projects_images', $request->project_cover);

            $formData['project_cover'] = $path;

            $newProject->project_cover = $formData['project_cover'];
        }


        $newProject->save();

        if(array_key_exists('technologies', $formData)){

            $newProject->technologies()->attach($formData['technologies']);
        }

        return redirect()->route('admin.projects.show', $newProject->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin/projects/show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)

    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin/projects/edit', compact('project', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $formData = $request->all();

        $this->validation($formData);

       

        if($request->hasFile('project_cover')) {

            if($project->project_cover){

                Storage::delete($project->project_cover);
            }

            $path = Storage::put('projects_images', $request->project_cover);

            $formData['project_cover'] = $path;

        } 

        $project->update($formData);

        $project->save();

        if(array_key_exists('technologies', $formData)){

            $project->technologies()->sync($formData['technologies']);

        } else {

            $project->technologies()->detach();
        }
        
        return redirect()->route('admin.projects.show',  $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if($project->project_cover){

            Storage::delete($project->project_cover);
        }

        $project->delete();

        return redirect()->route('admin.projects.index');
    }

    private function validation($formData){
        $validator = Validator::make($formData , [
            'project_name' => 'required|max:200|min:5',
            'project_description' => 'required|min:5',
            'github_Link' => 'required',
            'created_by' => 'required',
            'type_id' => 'nullable|exists:types,id',
            'project_cover' => 'nullable|image|max:4096',
        ] , [
            
            'project_name.required' => 'Devi inserire un titolo',
            'project_name.max' => 'Il titolo può contenere un massimo di :max caratteri',
            'project_name.min' => 'il titolo deve contenere un minimo di :min caratteri',
            'project_description.required' => 'Inserisci una descrizione!',
            'project_description.min' => 'la descrizione deve contenere un minimo di :min caratteri',
            'github_Link.required' => 'Inserisci un link Github!',
            'created_by.required' => 'Inserisci il nome del creatore del progetto!',
            'type_id.exists' =>'Categoria non trovata!',
            'project_cover.max' => 'La dimensione del file è troppo grande!',
            'project_cover.image' => 'Devi inserire un file di tipo immagine!',


        ])->validate();

        
    }
}
