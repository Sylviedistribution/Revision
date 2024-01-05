@extends('layouts.app')

@section('contents')
<h2>Liste des notes</h2><br>
<a href="{{route('notes-create')}} " class="btn btn-primary float-end">Ajouter</a>
<table class="table ">
    <thead>
    <tr>
        <td>Id</td>
        <td>Valeur</td>
        <td>Matiere</td>
        <td>Etudiant</td>
        <td>Options</td>

    </tr>
    </thead>

    @foreach($listeNotes as $notes)
        <tr>
            <td>{{$notes->id}}</td>
            <td>{{$notes->valeur}}</td>
            <td>{{$note->etudiant->nom ?? '' }}</td> <!-- Assuming 'nom' is the name column in your Matiere model -->
            <td>{{$notes->etudiant_id}}</td>
            <td>
                <a href="{{ route('notes-edit', $notes->id) }}" class="btn btn-warning">
                    <i class="fas fa-book"></i>
                </a>
                <a href="{{ route('notes-delete', $notes->id) }}" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>
        </tr>
    @endforeach
    <tbody>

    </tbody>
</table>
@endsection
