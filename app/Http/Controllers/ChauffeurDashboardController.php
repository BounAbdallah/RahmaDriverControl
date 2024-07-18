<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ChauffeurDashboardController extends Controller
{
    /**
     * Display the chauffeur dashboard.
     */
    public function index(): View
    {
        // Vous pouvez ajouter ici la logique pour récupérer les données nécessaires pour le tableau de bord du chauffeur
        return view('chauffeur.dashboard');
    }
}