<?php

namespace App\Http\Controllers;

use App\Models\Moto;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('admin');
    }

    public function index()
    {
        $motos = Moto::all();
        return view('admin.motos.index', compact('motos'));
    }

    public function create()
    {
        return view('admin.motos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'numero_serie' => 'required|unique:motos',
            'annee' => 'required|integer',
            'statut' => 'required',
        ]);

        Moto::create($request->all());

        return redirect()->route('admin.motos.index')
            ->with('success', 'Moto ajoutée avec succès.');
    }

    public function show(Moto $moto)
    {
        return view('admin.motos.show', compact('moto'));
    }

    public function edit(Moto $moto)
    {
        return view('admin.motos.edit', compact('moto'));
    }

    public function update(Request $request, Moto $moto)
    {
        $request->validate([
            'marque' => 'required',
            'modele' => 'required',
            'numero_serie' => 'required|unique:motos,numero_serie,' . $moto->id,
            'annee' => 'required|integer',
            'statut' => 'required',
        ]);

        $moto->update($request->all());

        return redirect()->route('admin.motos.index')
            ->with('success', 'Moto mise à jour avec succès.');
    }

    public function destroy(Moto $moto)
    {
        $moto->delete();

        return redirect()->route('admin.motos.index')
            ->with('success', 'Moto supprimée avec succès.');
    }
}