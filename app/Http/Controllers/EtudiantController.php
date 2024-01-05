<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

//Toujours importer le model dans le controleur

class EtudiantController extends Controller
{
    public function index()
    {
        $listeEtudiants = Etudiant::all();

        return view('etudiants.liste', compact('listeEtudiants'));

    }

    public function create()
    {
        /* 1ere methode
        $filieres = trans('filieres'); recupere les donne se trouvant dans ressources/lang
         $nationalites = trans('nationalites');
        */
        $filieres = Lang::get('filieres');

        // Tableau des nationalités
        $nationalites = Lang::get('nationalites');

        // Passer les filières et nationalités à la vue du formulaire

        return View::make('etudiants.create', ['filieres' => $filieres, 'nationalites' => $nationalites]);

    }

    public function store(Request $request)
    {

        //dd($request->all());//dd signifie die and dump
        // dd($request->input('nom'));
        /*Etudiant::create([
            'nom' => $request-> input('nom'),
            'prenom' => $request-> input('prenom'),
            'sexe' => $request-> input('sexe'),
            'matricule' => $request-> input('matricule'),
            'classe' => $request-> input('classe'),
            'date_naissance' => $request-> input('date_naissance'),

        ]);*/
        $validator = Validator::make($request->all(), [
            "prenom" => "required",
            "nom" => "required",
            "sexe" => "required",
            "filiere" => "required",
            "nationalite" => "required",
            "dateNaissance" => "required",
            "matricule" => "required",
        ]);

        // Si la validation échoue, redirigez avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        Etudiant::create($request->all());
        return redirect()->route('etudiants-liste')->with('success', 'Étudiant créé avec succès.');

    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $filieres = Lang::get('filieres');
        $nationalites = Lang::get('nationalites');

        return view('etudiants.edit', compact('etudiant', 'filieres', 'nationalites'));

    }

    public function update(Request $request, Etudiant $etudiant)
    {
        $request->validate([
            "prenom" => "required",
            "nom" => "required",
            "sexe" => "required",
            "filiere" => "required",
            "nationalite" => "required",
            "dateNaissance" => "required",
            "matricule" => "required",
        ]);

        // Utilisez la méthode update pour mettre à jour le modèle directement
        $etudiant->update($request->all());

        // Redirigez vers la page de liste des étudiants avec un message de succès
        return redirect()->route('etudiants-liste')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function delete( $id)
    {
        //Etudiant::findOrFail($id)->delete();
        Etudiant::findOrFail($id)->delete();

        return redirect()->route('etudiants-liste');
    }

}
