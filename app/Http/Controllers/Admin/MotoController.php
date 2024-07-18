<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Moto;
use App\Models\User;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function index()
    {
        $motos = Moto::with('chauffeur')->paginate(10);
        return view('admin.motos.index', compact('motos'));
    }

    public function create()
    {
        $chauffeurs = User::where('role', 'chauffeur')->get();
        return view('admin.motos.create', compact('chauffeurs'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'numero_chassis' => 'required|unique:motos',
            'modele' => 'required',
            'annee' => 'required|integer',
            'chauffeur_id' => 'nullable|exists:users,id'
        ]);

        Moto::create($validatedData);

        return redirect()->route('admin.motos.index')->with('success', 'Moto ajoutée avec succès.');
    }

    public function show(Moto $moto)
    {
        return view('admin.motos.show', compact('moto'));
    }

    public function edit(Moto $moto)
    {
        $chauffeurs = User::where('role', 'chauffeur')->get();
        return view('admin.motos.edit', compact('moto', 'chauffeurs'));
    }

    public function update(Request $request, Moto $moto)
    {
        $validatedData = $request->validate([
            'numero_chassis' => 'required|unique:motos,numero_chassis,' . $moto->id,
            'modele' => 'required',
            'annee' => 'required|integer',
            'chauffeur_id' => 'nullable|exists:users,id'
        ]);

        $moto->update($validatedData);

        return redirect()->route('admin.motos.index')->with('success', 'Moto mise à jour avec succès.');
    }

    public function destroy(Moto $moto)
    {
        $moto->delete();
        return redirect()->route('admin.motos.index')->with('success', 'Moto supprimée avec succès.');
    }
}