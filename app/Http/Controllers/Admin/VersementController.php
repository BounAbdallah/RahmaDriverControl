<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Versement;
use Illuminate\Http\Request;

class VersementController extends Controller
{
    public function index()
    {
        $versements = Versement::with('chauffeur', 'moto')->paginate(10);
        return view('admin.versements.index', compact('versements'));
    }

    public function show(Versement $versement)
    {
        return view('admin.versements.show', compact('versement'));
    }

    
}