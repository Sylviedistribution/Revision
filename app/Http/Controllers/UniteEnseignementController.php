<?php

namespace App\Http\Controllers;
use App\Models\UniteEnseignement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UniteEnseignementController extends Controller
{
    public function index(){
        $listeUe = UniteEnseignement::all();
        return view('unites_enseignement.liste', compact('listeUe'));
    }

    public function create()
    {
        return view('unites_enseignement.create');
    }

    public function store( Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nom" => "required",
        ]);

        // Si la validation échoue, redirigez avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        UniteEnseignement::create($request->all());
        return redirect()->route('ue-liste')->with('success', 'Unité d\'enseignement créé avec succès.');

    }
    public function edit($id)
    {
        $uniteEnseignement = UniteEnseignement::findOrFail($id);

        return view('unites_enseignement.edit', compact('uniteEnseignement'));

    }

    public function update(Request $request, UniteEnseignement $uniteEnseignement )
    {
        $request->validate([
            "nom" => "required",
        ]);
        // Utilisez la méthode update pour mettre à jour le modèle directement
        $uniteEnseignement->update($request->all());

        return redirect()->route('ue-liste')->with('success', 'Unite d\'enseignement mise à jour avec succès.');
    }

    public function delete($id)
    {
        UniteEnseignement::findOrFail($id)->delete();

        return redirect()->route('ue-liste');
    }
}
