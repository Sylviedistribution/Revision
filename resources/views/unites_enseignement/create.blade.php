@extends('layouts.app')

@section('contents')

    <div class="container">
        <h2 class="text-center">Ajouter une unité d'enseignement</h2><br>

        <div class="card col-md-8 mx-auto">
            <form action="{{ route('ue-form') }}" method="post">
                @csrf
                <div class="card-body">
                    <label>Nom:</label><br>
                    <input class="form-control @error('nom') is-invalid @enderror" type="text" name="nom">
                    @error('nom')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                    <br>

                    <button type="submit" class="btn btn-success">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@endsection
