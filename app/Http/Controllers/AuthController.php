<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Etudiant;
use App\Models\UniteEnseignement;
use App\Models\Matiere;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    // Affiche le formulaire d'inscription
    public function register()
    {
        return view('auth/register');
    }

    // Traitement de la soumission du formulaire d'inscription
    public function registerSave(Request $request)
    {
        // Validation des données du formulaire
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ])->validate();

        // Création d'un nouvel utilisateur
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);

        // Redirection vers la page de connexion après l'inscription réussie
        return redirect()->route('login');
    }

    // Affiche le formulaire de connexion
    public function login()
    {
        return view('auth/login');
    }

    // Traitement de la soumission du formulaire de connexion
    public function loginAction(Request $request)
    {

        // Validation des données du formulaire
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        // Authentification de l'utilisateur
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            // En cas d'échec d'authentification, renvoie une erreur de validation
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }
        // Régénération de la session
        $request->session()->regenerate();


        // Redirection vers le tableau de bord après une connexion réussise
        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        $nombreEtudiants = Etudiant::count();
        $nombreMatieres = Matiere::count();
        $nombreNotes = Note::count();
        $nombreUnitesEnseignement = UniteEnseignement::count();

        return view('dashboard', compact('nombreEtudiants', 'nombreMatieres', 'nombreNotes', 'nombreUnitesEnseignement'));
    }

    // Déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        // Invalidation de la session
        $request->session()->invalidate();

        // Redirection vers la page d'accueil après la déconnexion
        return redirect('/login');
    }
}
