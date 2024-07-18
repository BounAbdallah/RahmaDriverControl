<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des versements</title>
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
            <a class="navbar-brand" href="{{ route('chauffeur.dashboard') }}">Tableau de bord Chauffeur</a>
        </div>
    </nav>

    <div class="container mt-4">
        <h2>Historique des versements</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                @foreach($versements as $versement)
                    <tr>
                        <td>{{ $versement->date->format('d/m/Y') }}</td>
                        <td>{{ $versement->montant }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $versements->links() }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>