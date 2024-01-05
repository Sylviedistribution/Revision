<?php

namespace App\Http\Controllers;

use App\Models\Matiere;
use App\Models\UniteEnseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatiereControllerNew extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listeMatieres = Matiere::all();

        return view('matieres.liste', compact('listeMatieres') );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $listeUnitesEnseignement = UniteEnseignement::all();

        return view('matieres.create', compact('listeUnitesEnseignement'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $listeUnitesEnseignement = UniteEnseignement::all();
        $listeMatiere = Matiere::all();

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
        return view('matieres.liste',['listeUnitesEnseignement'=>$listeUnitesEnseignement,'listeMatieres'=>$listeMatiere]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matiere = Matiere::findOrFail($id);
        return view('matiere.edit', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matiere = Matiere::findOrFail($id);
        // Logique de mise à jour ici
        $matiere->update($request->all());
        return redirect()->route('matieres-liste')->with('success', 'Matière mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matiere::findOrFail($id)->delete();

        return redirect()->route('matieres-liste');
    }
}
