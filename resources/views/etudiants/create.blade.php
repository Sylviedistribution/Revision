@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Formulaire d'étudiant</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('etudiants-form') }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Prenom:</label><br>
                    <input class="form-control @error('prenom') is-invalid @enderror" type="text" name="prenom">
                    @error('prenom')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Nom:</label> <br>
                    <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror">
                    @error('nom')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Sexe:</label><br>
                    <div class="form-check">
                        <input type="radio" id="masculin" name="sexe" value="M" class="form-check-input">
                        <label for="masculin" class="form-check-label">M</label>

                        <input type="radio" id="feminin" name="sexe" value="F" class="form-check-input ml-2">
                        <label for="feminin" class="form-check-label ml-4">F</label>
                    </div>
                    @error('sexe')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>

                    <label>Filiere:</label> <br>
                    <select class="form-control @error('filiere') is-invalid @enderror" name="filiere">
                        @foreach($filieres as $key => $filiere)
                            <option value="{{ $key }}">{{ $filiere }}</option>
                        @endforeach
                    </select>
                    @error('filiere')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Nationalite:</label> <br>
                    <select class="form-control @error('nationalite') is-invalid @enderror" name="nationalite">
                        @foreach($nationalites as $nationalite)
                            <option value="{{ $nationalite }}">{{ $nationalite }}</option>
                        @endforeach
                    </select>
                    @error('nationalite')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <label>Annee de naissance:</label> <br>
                    <input type="date" name="dateNaissance" class="form-control @error('dateNaissance') is-invalid @enderror">
                    @error('dateNaissance')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>

                    <label>Matricule:</label> <br>
                    <input type="text" name="matricule" class="form-control @error('matricule') is-invalid @enderror">
                    @error('matricule')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>

                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@endsection
