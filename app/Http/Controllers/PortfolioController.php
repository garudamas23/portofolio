<?php
// File: app/Http/Controllers/PortfolioController.php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Education;
use App\Models\Skill;
use App\Models\Project;
use App\Models\User;

class PortfolioController extends Controller
{
    public function index()
    {
        // 🎯 AMBIL DATA LANGSUNG DARI DATABASE - NO CACHE
        $user = User::find(1); // Ambil user dengan ID 1
        
        $portfolioData = [
            'user' => $user,
            'experiences' => Experience::where('is_public', true)
                ->orderBy('start_date', 'desc')
                ->get(),
            'educations' => Education::where('is_public', true)
                ->orderBy('start_year', 'desc')
                ->get(),
            'skills' => Skill::where('is_public', true)->get(),
            'skillCategories' => Skill::where('is_public', true)
                ->get()
                ->groupBy('category'),
            'projects' => Project::where('is_public', true)
                ->where('featured', true)
                ->get(),
        ];

        // 🎯 DEBUG: Log data yang akan ditampilkan
        logger('Portfolio Data Sent to View:', [
            'user_name' => $user->name,
            'user_title' => $user->professional_title,
            'user_bio' => $user->bio,
            'user_photo' => $user->photo
        ]);

        return view('portfolio.index', compact('portfolioData'));
    }
}