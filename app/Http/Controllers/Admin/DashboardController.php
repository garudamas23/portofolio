<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $experienceCount = Experience::count();
        $educationCount = Education::count();
        $skillCount = Skill::count();
        $projectCount = Project::count();

        return view('admin.dashboard', compact(
            'experienceCount',
            'educationCount', 
            'skillCount',
            'projectCount'
        ));
    }
}