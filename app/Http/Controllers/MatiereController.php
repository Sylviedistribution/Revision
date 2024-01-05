<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\UniteEnseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class MatiereController extends Controller
{
    public function index()
    {
        $listeMatieres = Matiere::all();

        return view('matieres.liste', compact('listeMatieres') );

    }
    public function create()
    {
        $listeUnitesEnseignement = UniteEnseignement::all();

        return view('matieres.create', compact('listeUnitesEnseignement'));
    }

    public function store( Request $request)
    {

        $validator = Validator::make($request->all(), [
            "nom" => "required",
            "professeur" => "required",
            "coefficient" => "required",
            "unites_enseignement_id" => "required",
        ]);

        // Si la validation échoue, redirigez avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // 2 eme methode d'insertion
        Matiere::create($request->all());
        return redirect()->route('matieres-liste')->with('success', 'Matiere créée avec succès.');
    }

    public function edit($id)
    {
        $matiere = Matiere::findOrFail($id);
        $listeUniteEnseignement = UniteEnseignement::all();

        return view('matieres.edit', compact('matiere','listeUniteEnseignement'));

    }

    public function update(Request $request, Matiere $matiere)

    {
        $request->validate([
            "nom" => "required",
            "professeur" => "required",
            "coefficient" => "required",
            "unites_enseignement_id" => "required",
        ]);

        // Utilisez la méthode update pour mettre à jour le modèle directement
        $matiere->update($request->all());

        return redirect()->route('matieres-liste')->with('success', 'Matière mise à jour avec succès.');
    }

    public function delete($id)
    {
        Matiere::findOrFail($id)->delete();

        return redirect()->route('matieres-liste');
    }

}
