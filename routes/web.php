<?php

use App\Http\Controllers\CommentEtapeController;
use App\Http\Controllers\CommentVoyageController;
use App\Http\Controllers\ShowUserController;
use App\Http\Controllers\UserController;
use App\Models\Like;
use App\Models\Voyage;
use App\Http\Controllers\EtapeController;
use App\Http\Controllers\VoyagesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $journey = Voyage::query()
        ->leftJoin('likes', 'voyages.id', '=', 'likes.voyage_id')
        ->select('voyages.*', DB::raw('COUNT(likes.voyage_id) as like_count'))
        ->groupBy('voyages.id')
        ->orderByDesc('like_count')
        ->first();
    $journeys = Voyage::query()->inRandomOrder()->take(3)->get();
    return view('welcome', ['journeys' => $journeys, 'journey' => $journey]);
})->name("accueil");

Route::get('/contact', function () {
    return view('errors.404');
})->name("contact");

Route::get('/info', function () {
    return view('errors.404');
})->name("info");

Route::middleware('auth')
    ->get('/profile', [ShowUserController::class, 'showProfile'])
    ->name('showprofile.index');

Route::get('/home', function () {
    return view('dashboard');
})->name("home") -> middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name("dashboard") -> middleware('auth');

Route::get('/voyages', [VoyagesController::class, 'index'])->name('voyages.index');
Route::resource('voyages', VoyagesController::class);

Route::prefix('/voyages/{voyageId}')->group(function () {
    Route::get('/etapes', [EtapeController::class, 'index'])->name('etapesVoyage.index');
    Route::get('/etapes/create', [EtapeController::class, 'create'])->name('etapesVoyage.create'); // Afficher le formulaire de création
    Route::post('/etapes', [EtapeController::class, 'store'])->name('etapesVoyage.store'); // Enregistrer une nouvelle étape
    Route::get('/etapes/{etapeId}', [EtapeController::class, 'show'])->name('etapesVoyage.show');
    Route::get('/etapes/{etapeId}/edit', [EtapeController::class, 'edit'])->name('etapesVoyage.edit'); // Afficher le formulaire d'édition
    Route::put('/etapes/{etapeId}', [EtapeController::class, 'update'])->name('etapesVoyage.update');
    Route::delete('/etapes', [EtapeController::class, 'destroy'])->name('etapesVoyage.destroy'); // Supprimer une étape
});


Route::get('like/{voyageId}', function ($voyageId) {
    $voyage = Voyage::find($voyageId);
    $like = new Like(Auth::id(), $voyageId);
    $like->save();
    return redirect()->route('voyages.show', compact('voyage'));
})->name('likes.create');

Route::resource('users', UserController::class);

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/about', function () {
    return view('apropos');
})->name('about');

Route::get('/qui', function () {
    return view('qui');
})->name('qui');

Route::post('/commentsV', [CommentVoyageController::class, 'store'])->name('commentsV.store');
Route::post('/commentsS', [CommentEtapeController::class, 'store'])->name('commentsS.store');
