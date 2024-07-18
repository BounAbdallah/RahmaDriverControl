
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Chauffeurs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Statut</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($chauffeurs as $chauffeur)
                                <tr>
                                    <td>{{ $chauffeur->nom_complet }}</td>
                                    <td>{{ $chauffeur->email }}</td>
                                    <td>{{ $chauffeur->telephone }}</td>
                                    <td>{{ $chauffeur->statut }}</td>
                                    <td>
                                        <a href="{{ route('admin.chauffeurs.show', $chauffeur) }}">Voir</a>
                                        <a href="{{ route('admin.chauffeurs.edit', $chauffeur) }}">Modifier</a>
                                        <form action="{{ route('admin.chauffeurs.updateStatus', $chauffeur) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit">Changer Statut</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $chauffeurs->links() }}
                </div>
            </div>
        </div>
    </div>
