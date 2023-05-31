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

    public function show($slug)
    {
        // controllo di ottenere lo slug
        // dd($slug);

        // per prendere effettivamente solo il risultato devo aggiungere ->first()
        // dopo il where possiamo aggiunegere anche altri filtri(orderby....)
        // inn questo caso è cme scrivere: SELECT * FROM projects WHERE slug = $slug
        $project = Project::where('slug', $slug)->first();

        // dd($project);

        // il risultato di projects, quando mettiamo uno slug che non esiste, è uguele a "null" 
        if ($project) {

            // inviamolo come json per poterlo passare ad axios
            return response()->json([
                'success' => true,
                'projects' => $project,
            ]);
        } else {

            return response()->json([
                'success' => false,
                'error' => "Il progetto non esiste",
            ]);
        }
    }
}
