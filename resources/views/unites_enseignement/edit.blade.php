@extends('layouts.app')

@section('contents')
    <h2 class="text-center">Éditer l'unite d'enseignement</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card col-md-8 mx-auto">
        <form action="{{ route('ue-update', $uniteEnseignement->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <label>Nom:</label><br>
                <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom">
                @error('nom')
                <span class="invalid-feedback">{{ $message }}</span>
                @enderror
                <br>

                <button type="submit" class="btn btn-primary">Mettre à jour</button>
            </div>
        </form>
    </div>
@endsection
