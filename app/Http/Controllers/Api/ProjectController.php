<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // restituisce tutti i progetti del database
        // $projects = Project::all();
        // $projects = Project::with('type', 'technologies', 'user')->get();
        $projects = Project::with('type', 'technologies', 'user')->orderBy('projects.created_at', 'desc')->paginate(6);

        // return response()->json([]);

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }
}
