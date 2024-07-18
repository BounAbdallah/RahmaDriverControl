<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Moto;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $finances = Finance::with('moto')->paginate(10);
        return view('admin.finances.index', compact('finances'));
    }

    public function create()
    {
        $motos = Moto::all();
        return view('admin.finances.create', compact('motos'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'moto_id' => 'required|exists:motos,id',
            'type' => 'required|in:revenu,depense',
            'montant' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'required'
        ]);

        Finance::create($validatedData);

        return redirect()->route('admin.finances.index')->with('success', 'Transaction financière ajoutée avec succès.');
    }

    public function show(Finance $finance)
    {
        return view('admin.finances.show', compact('finance'));
    }

    public function edit(Finance $finance)
    {
        $motos = Moto::all();
        return view('admin.finances.edit', compact('finance', 'motos'));
    }

    public function update(Request $request, Finance $finance)
    {
        $validatedData = $request->validate([
            'moto_id' => 'required|exists:motos,id',
            'type' => 'required|in:revenu,depense',
            'montant' => 'required|numeric',
            'date' => 'required|date',
            'description' => 'required'
        ]);

        $finance->update($validatedData);

        return redirect()->route('admin.finances.index')->with('success', 'Transaction financière mise à jour avec succès.');
    }

    public function destroy(Finance $finance)
    {
        $finance->delete();
        return redirect()->route('admin.finances.index')->with('success', 'Transaction financière supprimée avec succès.');
    }
}