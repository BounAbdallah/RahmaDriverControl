
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modifier le Chauffeur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.chauffeurs.update', $chauffeur) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-input-label for="nom_complet" :value="__('Nom complet')" />
                            <x-text-input id="nom_complet" class="block mt-1 w-full" type="text" name="nom_complet" :value="old('nom_complet', $chauffeur->nom_complet)" required autofocus />
                            <x-input-error :messages="$errors->get('nom_complet')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $chauffeur->email)" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Ajoutez les autres champs ici (téléphone, adresse, numéro de permis, date de naissance) -->

                        <div class="mt-4">
                            <x-input-label for="statut" :value="__('Statut')" />
                            <select id="statut" name="statut" class="block mt-1 w-full">
                                <option value="actif" {{ $chauffeur->statut === 'actif' ? 'selected' : '' }}>Actif</option>
                                <option value="inactif" {{ $chauffeur->statut === 'inactif' ? 'selected' : '' }}>Inactif</option>
                            </select>
                            <x-input-error :messages="$errors->get('statut')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="role" :value="__('Rôle')" />
                            <select id="role" name="role" class="block mt-1 w-full">
                                <option value="chauffeur" {{ $chauffeur->role === 'chauffeur' ? 'selected' : '' }}>Chauffeur</option>
                                <option value="admin" {{ $chauffeur->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Mettre à jour') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>