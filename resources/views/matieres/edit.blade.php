@extends('layouts.app')

@section('contents')
    <h2 class="text-center">Éditer la matiere</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card col-md-8 mx-auto">
        <form action="{{ route('matieres-update', $matiere->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <label>Nom:</label><br>
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom">
                @error('nom')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <br>

                <label>Professeur:</label> <br>
                <input type="text" name="professeur" class="form-control @error('professeur') is-invalid @enderror">
                @error('professeur')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <br>

                <label>Coefficient:</label><br>
                <select class="form-control @error('coefficient') is-invalid @enderror" name="coefficient">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select>
                @error('coefficient')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror<br>

                <label>Unité d'enseignement:</label> <br>
                <select class="form-control @error('unites_enseignement_id') is-invalid @enderror" name="unites_enseignement_id">
                    @foreach($listeUniteEnseignement as $ue)
                        <option value="{{ $ue->id }}">{{ $ue->nom}}</option>
                    @endforeach
                </select>
                @error('unites_enseignement_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <br>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
