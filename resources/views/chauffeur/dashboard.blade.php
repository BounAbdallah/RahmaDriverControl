<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord Chauffeur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fffbea;
        }
        .navbar {
            background-color: #174C72;
        }
        .btn-primary {
            background-color: #C1272E;
            border-color: #C1272E;
        }
        .btn-primary:hover {
            background-color: #9e1f25;
            border-color: #9e1f25;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Tableau de bord Chauffeur</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chauffeur.versement') }}">Faire un versement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chauffeur.historique') }}">Historique des versements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('chauffeur.change-password') }}">Changer le mot de passe</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Déconnexion</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Informations de la moto</div>
                    <div class="card-body">
                        @if($moto)
                            <p><strong>Marque:</strong> {{ $moto->marque }}</p>
                            <p><strong>Modèle:</strong> {{ $moto->modele }}</p>
                            <p><strong>Plaque d'immatriculation:</strong> {{ $moto->plaque }}</p>
                        @else
                            <p>Aucune moto attribuée pour le moment.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">Derniers versements</div>
                    <div class="card-body">
                        @if($versements->count() > 0)
                            <ul class="list-group">
                                @foreach($versements as $versement)
                                    <li class="list-group-item">
                                        {{ $versement->montant }} - {{ $versement->date->format('d/m/Y') }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucun versement effectué.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dernières notifications</div>
                    <div class="card-body">
                        @if($notifications->count() > 0)
                            <ul class="list-group">
                                @foreach($notifications as $notification)
                                    <li class="list-group-item">
                                        {{ $notification->message }} - {{ $notification->created_at->format('d/m/Y H:i') }}
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>Aucune notification.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>