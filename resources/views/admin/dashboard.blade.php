@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Tableau de Bord</h1>
    
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestion des Motos
                </div>
                <div class="card-body">
                    <h5 class="card-title">Total des motos : 10</h5>
                    <p class="card-text">Gérez vos motos, leurs attributions et suivez leurs performances.</p>
                    <a href="#" class="btn btn-primary">Voir les motos</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Planification des Entretiens
                </div>
                <div class="card-body">
                    <h5 class="card-title">Prochains entretiens : 3</h5>
                    <p class="card-text">Planifiez et suivez les entretiens réguliers et urgents.</p>
                    <a href="#" class="btn btn-primary">Voir les entretiens</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Suivi des Revenus et Dépenses
                </div>
                <div class="card-body">
                    <h5 class="card-title">Revenus du mois : 5000 €</h5>
                    <p class="card-text">Suivez les revenus générés et les dépenses d'entretien.</p>
                    <a href="#" class="btn btn-primary">Voir le rapport</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header">
                    Gestion des Versements
                </div>
                <div class="card-body">
                    <h5 class="card-title">Derniers versements : 5</h5>
                    <p class="card-text">Gérez les versements des chauffeurs via Wave.</p>
                    <a href="#" class="btn btn-primary">Voir les versements</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection