@extends('layouts.app')

@section('contents')
<h2>Liste des unités d'enseignement</h2><br>
<a href="{{route('ue-create')}} " class="btn btn-primary float-end">Ajouter</a>
<table class="table ">
    <thead>
    <tr>
        <td>Id</td>
        <td>Nom</td>
        <td>Options</td>
    </tr>
    </thead>

    @foreach($listeUe as $ue)
        <tr>
            <td>{{$ue->id}}</td>
            <td>{{$ue->nom}}</td>
            <td>
                <a href="{{ route('ue-edit', $ue->id) }}" class="btn btn-warning">
                    <i class="fas fa-book"></i>
                </a>
                <a href="{{ route('ue-delete', $ue->id) }}" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i>
                </a>
            </td>

            <td></td>

        </tr>
    @endforeach
    <tbody>

    </tbody>
</table>
@endsection
