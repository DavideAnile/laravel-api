<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){

        $types = Type::all();

        $requestData = $request->all();
        
        if($request->has('type_id') && $requestData['type_id']){

            $projects = Project::where('type_id' , $requestData['type_id'])->with('type' , 'technologies')->get();

            return response()->json([
                'success' => true,
                'results' => $projects,
                'types' => $types,
            ]);

        } else {

            $projects = Project::with('type', 'technologies')->get();
    
            
    
            return response()->json([
                'success' => true,
                'results' => $projects,
                'types' => $types,
            ]);

        }

    }

    public function show($slug){
        
        $project = Project::where('slug', $slug)->with('type' , 'technologies')->first();

        

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

