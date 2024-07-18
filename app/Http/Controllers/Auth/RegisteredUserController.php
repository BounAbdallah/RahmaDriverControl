<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function createAdmin(): View
    {
        return view('auth.register-admin');
    }

    public function createChauffeur(): View
    {
        return view('auth.register-chauffeur');
    }

    public function storeAdmin(Request $request): RedirectResponse
    {
        $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'adresse' => ['nullable', 'string', 'max:255'],
        ]);

        $user = User::create([
            'nom_complet' => $request->nom_complet,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'adresse' => $request->adresse,
            'statut' => 'actif',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('adminDashboard');
    }

    public function storeChauffeur(Request $request): RedirectResponse
    {
        $request->validate([
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string', 'max:20'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'adresse' => ['nullable', 'string', 'max:255'],
            'numero_permis' => ['required', 'string', 'max:255', 'unique:'.User::class],
            'date_naissance' => ['required', 'date'],
        ]);

        $user = User::create([
            'nom_complet' => $request->nom_complet,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'role' => 'chauffeur',
            'adresse' => $request->adresse,
            'statut' => 'inactif',
            'numero_permis' => $request->numero_permis,
            'date_naissance' => $request->date_naissance,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('chauffeurDashboard');
    }
}