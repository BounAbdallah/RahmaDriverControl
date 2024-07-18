
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails du Chauffeur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3>{{ $chauffeur->nom_complet }}</h3>
                    <p>Email: {{ $chauffeur->email }}</p>
                    <p>Téléphone: {{ $chauffeur->telephone }}</p>
                    <p>Adresse: {{ $chauffeur->adresse }}</p>
                    <p>Numéro de permis: {{ $chauffeur->numero_permis }}</p>
                    <p>Date de naissance: {{ $chauffeur->date_naissance }}</p>
                    <p>Statut: {{ $chauffeur->statut }}</p>
                    <p>Rôle: {{ $chauffeur->role }}</p>
                    <a href="{{ route('admin.chauffeurs.edit', $chauffeur) }}">Modifier</a>
                </div>
            </div>
        </div>
    </div>
