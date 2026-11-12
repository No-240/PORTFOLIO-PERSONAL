<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;

class HomeController extends Controller
{
    public function index()
    {
        $profile = Profile::first();
        $skills = Skill::orderBy('sort_order')->get();
        $experiences = Experience::orderByDesc('start_date')->get();
        $educations = Education::orderByDesc('start_year')->get();

        $projects = Project::where('is_published', true)
            ->orderBy('sort_order')
            ->latest()
            ->get();

        return view('home', compact('profile', 'projects', 'skills', 'experiences', 'educations'));
    }
}