<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Moto;
use App\Models\Versement;
use App\Models\Notification;
use Illuminate\Support\Facades\Hash;

class ChauffeurController extends Controller
{
    public function dashboard()
    {
        $user = auth()->user();
        $moto = $user->moto;
        $versements = $user->versements()->latest()->take(5)->get();
        $notifications = $user->notifications()->latest()->take(5)->get();

        return view('chauffeur.dashboard', compact('user', 'moto', 'versements', 'notifications'));
    }

    public function versementForm()
    {
        return view('chauffeur.versement');
    }

    public function faireVersement(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $versement = auth()->user()->versements()->create($request->all());

        // Créer une notification de confirmation
        $notification = new Notification([
            'message' => 'Votre versement de ' . $request->montant . ' a été reçu.',
            'type' => 'confirmation',
        ]);
        auth()->user()->notifications()->save($notification);

        return redirect()->route('chauffeur.dashboard')->with('success', 'Versement effectué avec succès.');
    }

    public function historiqueVersements()
    {
        $versements = auth()->user()->versements()->paginate(10);
        return view('chauffeur.historique-versements', compact('versements'));
    }

    public function changePasswordForm()
    {
        return view('chauffeur.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('chauffeur.dashboard')->with('success', 'Mot de passe modifié avec succès.');
    }
}