<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// QUESTA PARTE NON SERVE PERCHè TANTO MI DEVO CREARE UNA NUOVA ROTTA
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// dopo aver aggiunto la rotta protetta admin (route::middleware) questa non mi serve più

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// creo un gruppo di rotte per la sezione dedicata all'admin
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'home'])->name('home');

    // projects
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);

    // types
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);

    Route::resource('technologies', TechnologyController::class)->parameters(['technologies' => 'technology:slug']);
});


require __DIR__ . '/auth.php';
