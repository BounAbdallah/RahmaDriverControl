<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entretien;
use App\Models\Moto;
use Illuminate\Http\Request;

class EntretienController extends Controller
{
    public function index()
    {
        $entretiens = Entretien::with('moto')->paginate(10);
        return view('admin.entretiens.index', compact('entretiens'));
    }

    public function create()
    {
        $motos = Moto::all();
        return view('admin.entretiens.create', compact('motos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'moto_id' => 'required|exists:motos,id',
            'date' => 'required|date',
            'type' => 'required|in:regulier,urgent',
            'description' => 'required',
            'cout' => 'required|numeric'
        ]);

        Entretien::create($validatedData);

        return redirect()->route('admin.entretiens.index')->with('success', 'Entretien enregistré avec succès.');
    }

    public function show(Entretien $entretien)
    {
        return view('admin.entretiens.show', compact('entretien'));
    }

    public function edit(Entretien $entretien)
    {
        $motos = Moto::all();
        return view('admin.entretiens.edit', compact('entretien', 'motos'));
    }

    public function update(Request $request, Entretien $entretien)
    {
        $validatedData = $request->validate([
            'moto_id' => 'required|exists:motos,id',
            'date' => 'required|date',
            'type' => 'required|in:regulier,urgent',
            'description' => 'required',
            'cout' => 'required|numeric'
        ]);

        $entretien->update($validatedData);

        return redirect()->route('admin.entretiens.index')->with('success', 'Entretien mis à jour avec succès.');
    }

    public function destroy(Entretien $entretien)
    {
        $entretien->delete();
        return redirect()->route('admin.entretiens.index')->with('success', 'Entretien supprimé avec succès.');
    }
}