@extends('layouts.app')

@section('contents')
<h2>Liste des etudiants</h2><br>
<a href="{{route('etudiants-create')}} " class="btn btn-primary float-end">Ajouter</a>
<table class="table ">
    <thead>
    <tr>
        <td>Id</td>
        <td>Prenom</td>
        <td>Nom</td>
        <td>Sexe</td>
        <td>Filiere</td>
        <td>Nationalite</td>
        <td>Date de naissance</td>
        <td>Matricule</td>
        <td>Options</td>

    </tr>
    </thead>

    @foreach($listeEtudiants as $etudiants)
        <tr>
            <td>{{$etudiants->id}}</td>
            <td>{{$etudiants->prenom}}</td>
            <td>{{$etudiants->nom}}</td>
            <td>{{$etudiants->sexe}}</td>
            <td>{{$etudiants->filiere}}</td>
            <td>{{$etudiants->nationalite}}</td>
            <td>{{$etudiants->dateNaissance}}</td>
            <td>{{$etudiants->matricule}}</td>
            <td>
                <a href="{{ route('etudiants-edit', $etudiants->id) }}" class="btn btn-warning">
                    <i class="fas fa-book"></i>
                </a>
                <a  href="{{ route('etudiants-delete', $etudiants->id) }}"  class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </a>

            </td>
        </tr>
    @endforeach
    <tbody>

    </tbody>
</table>
@endsection
