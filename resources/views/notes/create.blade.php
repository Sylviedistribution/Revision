@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Ajouter une note</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('notes-form') }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Valeur:</label><br>
                    <input type="text" class="form-control @error('valeur') is-invalid @enderror" name="valeur"   >
                    @error('valeur')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>

                    <label>Etudiant:</label> <br>
                    <select class="form-control @error('etudiants_id') is-invalid @enderror" name="etudiants_id">
                        @foreach($listeEtudiants as $et)
                            <option value="{{ $et->id }}">{{ $et->nom}}</option>
                        @endforeach
                    </select>
                    @error('etudiants_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>

                    <label>Matiere:</label> <br>
                    <select class="form-control @error('matieres_id') is-invalid @enderror" name="matieres_id">
                        @foreach($listeMatieres as $mat)
                            <option value="{{ $mat->id }}">{{ $mat->nom}}</option>
                        @endforeach
                    </select>
                    @error('matieres_id')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror<br>


                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@endsection
