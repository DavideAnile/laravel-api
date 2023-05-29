<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['project_name' , 'project_description', 'github_link', 'created_by' ,'type_id' , 'project_cover'];


    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){

        return $this->belongsToMany(Technology::class);
    }
    
}
