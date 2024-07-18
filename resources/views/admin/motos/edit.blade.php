@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la moto</h1>

    <form action="{{ route('admin.motos.update', $moto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="marque">Marque</label>
            <input type="text" class="form-control @error('marque') is-invalid @enderror" id="marque" name="marque" value="{{ old('marque', $moto->marque) }}" required>
            @error('marque')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="modele">Modèle</label>
            <input type="text" class="form-control @error('modele') is-invalid @enderror" id="modele" name="modele" value="{{ old('modele', $moto->modele) }}" required>
            @error('modele')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="numero_serie">Numéro de série</label>
            <input type="text" class="form-control @error('numero_serie') is-invalid @enderror" id="numero_serie" name="numero_serie" value="{{ old('numero_serie', $moto->numero_serie) }}" required>
            @error('numero_serie')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="annee">Année</label>
            <input type="number" class="form-control @error('annee') is-invalid @enderror" id="annee" name="annee" value="{{ old('annee', $moto->annee) }}" required>
            @error('annee')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="statut">Statut</label>
            <select class="form-control @error('statut') is-invalid @enderror" id="statut" name="statut" required>
                <option value="disponible" {{ old('statut', $moto->statut) == 'disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="en_service" {{ old('statut', $moto->statut) == 'en_service' ? 'selected' : '' }}>En service</option>
                <option value="en_maintenance" {{ old('statut', $moto->statut) == 'en_maintenance' ? 'selected' : '' }}>En maintenance</option>
            </select>
            @error('statut')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description', $moto->description) }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection