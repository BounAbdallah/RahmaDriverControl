@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Liste des Motos</h1>
    <a href="{{ route('admin.motos.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle moto</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Marque</th>
                <th>Modèle</th>
                <th>Numéro de série</th>
                <th>Année</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($motos as $moto)
                <tr>
                    <td>{{ $moto->id }}</td>
                    <td>{{ $moto->marque }}</td>
                    <td>{{ $moto->modele }}</td>
                    <td>{{ $moto->numero_serie }}</td>
                    <td>{{ $moto->annee }}</td>
                    <td>{{ $moto->statut }}</td>
                    <td>
                        <a href="{{ route('admin.motos.show', $moto->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('admin.motos.edit', $moto->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('admin.motos.destroy', $moto->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette moto ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection