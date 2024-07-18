@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de la moto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $moto->marque }} {{ $moto->modele }}</h5>
            <p class="card-text"><strong>Numéro de série:</strong> {{ $moto->numero_serie }}</p>
            <p class="card-text"><strong>Année:</strong> {{ $moto->annee }}</p>
            <p class="card-text"><strong>Statut:</strong> {{ $moto->statut }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $moto->description ?: 'Aucune description disponible' }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.motos.edit', $moto->id) }}" class="btn btn-warning">Modifier</a>
        <form action="{{ route('admin.motos.destroy', $moto->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette moto ?')">Supprimer</button>
        </form>
        <a href="{{ route('admin.motos.index') }}" class="btn btn-secondary">Retour à la liste</a>
    </div>
</div>
@endsection