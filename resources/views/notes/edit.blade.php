@extends('layouts.app')

@section('contents')
    <h2 class="text-center">Éditer la note</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card col-md-8 mx-auto">
        <form action="{{ route('notes-update', $note->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <label>Valeur:</label><br>
                <input type="text" class="form-control @error('valeur') is-invalid @enderror" name="valeur"   >
                @error('valeur')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror<br>

                <label>Etudiant:</label> <br>
                <select class="form-control @error('etudiants_id') is-invalid @enderror" name="etudiants_id">
                    @foreach($listeEtudiant as $et)
                        <option value="{{ $et->id }}">{{ $et->nom}}</option>
                    @endforeach
                </select>
                @error('etudiants_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror<br>

                <label>Matiere:</label> <br>
                <select class="form-control @error('matieres_id') is-invalid @enderror" name="matieres_id">
                    @foreach($listeMatiere as $mat)
                        <option value="{{ $mat->id }}">{{ $mat->nom}}</option>
                    @endforeach
                </select>
                @error('matieres_id')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror<br>


                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
