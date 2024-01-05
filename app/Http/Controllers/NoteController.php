<?php

namespace App\Http\Controllers;
use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index(){
        $listeNotes = Note::all();

        return view('notes.liste', compact('listeNotes') );

    }
    public function create()
    {
        $listeMatieres = Matiere::all();
        $listeEtudiants = Etudiant::all();

        return view('notes.create', compact('listeMatieres','listeEtudiants'));
    }
    public function store( Request $request)
    {
        $validator = Validator::make($request->all(), [
            "valeur" => "required|numeric|min:0|max:20",
            "etudiants_id" => "required",
            "matieres_id" => "required",
        ]);

        // Si la validation échoue, redirigez avec les erreurs
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Note::create($request->all());
        return redirect()->route('notes-liste')->with('success', 'Note créée avec succès.');

    }
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        $listeMatiere = Matiere::all();
        $listeEtudiant = Etudiant::all();

        return view('notes.edit', compact('note','listeMatiere','listeEtudiant'));

    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            "valeur" => "required|numeric|min:0|max:20",
            "etudiants_id" => "required",
            "matieres_id" => "required",
        ]);
        // Logique de mise à jour ici
        $note->update($request->all());
        return redirect()->route('notes-liste')->with('success', 'Note mise à jour avec succès.');
    }

    public function delete($id)
    {
        Note::findOrFail($id)->delete();

        return redirect()->route('notes-liste');
    }

}
