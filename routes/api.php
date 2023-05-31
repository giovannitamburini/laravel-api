<?php

use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('projects', [ProjectController::class, 'index']);

// rotta della show del progetto in vue
// {slug} = variabile, in questo caso ci serve lo slug per comporre la rotta (adesso lo devo passare al controller)
// (se si apre la lista delle rotte si vedrà la stessa cosa per alcune rotte)
Route::get('projects/{slug}', [ProjectController::class, 'show']);
