<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UniteEnseignementController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Définition des routes pour le contrôleur AuthController

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');

    Route::get('dashboard', 'dashboard')->name('dashboard');

});

// Définition des routes apres connexion

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Définition des routes Etudiant
Route::controller(EtudiantController::class)->group(function () {
    Route::get('etudiants','index')->name('etudiants-liste');
    Route::get('etudiants/create','create')->name('etudiants-create');
    Route::post('etudiants/form','store')->name('etudiants-form'); //C'est pour differencier l'affichage et la saisie
    Route::get('etudiants/edit/{id}', 'edit')->name('etudiants-edit');
    Route::post('etudiants/update/{etudiant}', 'update')->name('etudiants-update');
    Route::get('etudiants/delete/{id}', 'delete')->name('etudiants-delete');
});

// Définition des routes Matieres

Route::controller(MatiereController::class)->group(function () {
    Route::get('matieres', 'index')->name('matieres-liste');
    Route::get('matieres/create', 'create')->name('matieres-create');
    Route::post('matieres.form', 'store')->name('matieres-form');
    Route::get('matieres/edit/{id}', 'edit')->name('matieres-edit');
    Route::post('matieres/edit/{matiere}', 'update')->name('matieres-update');
    Route::get('matieres/delete/{id}', 'delete')->name('matieres-delete');
});

//Route::resource('matieres',\App\Http\Controllers\MatiereControllerNew::class);

// Définition des routes Notes

Route::controller(NoteController::class)->group(function () {
    Route::get('notes', 'index')->name('notes-liste');
    Route::get('notes/create', 'create')->name('notes-create');
    Route::post('notes/form', 'store')->name('notes-form');
    Route::get('notes/edit/{id}', 'edit')->name('notes-edit');
    Route::post('notes/edit/{note}', 'update')->name('notes-update');
    Route::get('notes/delete/{id}', 'delete')->name('notes-delete');
});

// Définition des routes UniteEnseignement

Route::controller(UniteEnseignementController::class)->group(function () {
    Route::get('unites_enseignement', 'index')->name('ue-liste');
    Route::get('unites_enseignement/create', 'create')->name('ue-create');
    Route::post('unites_enseignement/form', 'store')->name('ue-form');
    Route::get('unites_enseignement/edit/{id}', 'edit')->name('ue-edit');
    Route::post('unites_enseignement/edit/{uniteEnseignement}', 'update')->name('ue-update');
    Route::get('unites_enseignement/delete/{id}', 'delete')->name('ue-delete');
});

