@extends('layouts.app')

@section('contents')
<h2>Liste des matieres</h2><br>
<a href="{{route('matieres-create')}} " class="btn btn-primary float-end">Ajouter</a>
<table class="table ">
    <thead>
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Professeur</td>
        <td>Coefficient</td>
        <td>Unité d'enseignement</td>
        <td>Option</td>

    </tr>
    </thead>

    @foreach($listeMatieres as $matieres)
        <tr>
            <td>{{$matieres->id}}</td>
            <td>{{$matieres->nom}}</td>
            <td>{{$matieres->professeur}}</td>
            <td>{{$matieres->coefficient}}</td>
            <td>{{$matieres->unites_enseignement_id}}</td>
            <td>
                <a href="{{ route('matieres-edit', $matieres->id) }}" class="btn btn-warning">
                    <i class="fas fa-book"></i>
                </a>
                <a href="{{ route('matieres-delete', $matieres->id) }}" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>

        </tr>
    @endforeach
    <tbody>

    </tbody>
</table>
@endsection
