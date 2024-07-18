<form method="POST" action="{{ route('register') }}">
    @csrf
    
    <!-- Nom Complet -->
    <div>
        <label for="nom_complet">Nom Complet</label>
        <input id="nom_complet" type="text" name="nom_complet" value="{{ old('nom_complet') }}" required autofocus>
    </div>

    <!-- Email -->
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <!-- Téléphone -->
    <div>
        <label for="telephone">Téléphone</label>
        <input id="telephone" type="text" name="telephone" value="{{ old('telephone') }}" required>
    </div>

    <!-- Rôle -->
    <div>
        <label for="role">Rôle</label>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="chauffeur">Chauffeur</option>
        </select>
    </div>

    <!-- Adresse (optionnel pour les chauffeurs) -->
    <div>
        <label for="adresse">Adresse</label>
        <input id="adresse" type="text" name="adresse" value="{{ old('adresse') }}">
    </div>

    <!-- Password -->
    <div>
        <label for="password">Mot de passe</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Confirm Password -->
    <div>
        <label for="password_confirmation">Confirmer le mot de passe</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <div>
        <button type="submit">S'inscrire</button>
    </div>
</form>