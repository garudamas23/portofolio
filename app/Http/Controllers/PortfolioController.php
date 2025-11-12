<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date', 'desc')->get();
        $educations = Education::orderBy('start_year', 'desc')->get();
        
        $skills = Skill::all();
        $skillCategories = $skills->groupBy('category');
        
        $projects = Project::where('featured', true)->get();

        return view('welcome', compact(
            'experiences', 
            'educations', 
            'skillCategories', 
            'projects'
        ));
    }
}