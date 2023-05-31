<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'results' => $projects,
        ]);
    }

    public function show($slug){
        
        $project = Project::where('slug', $slug)->first();

        if($project == null) {

            return response()->json([

                'success' => false,
                'error' => 'Questo progetto non esiste!'
            ]);
        
        } else {

            return response()->json([
                'success' => true,
                'project' => $project, 
            ]);

        }

    }

}

