<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FinanceController;
use App\Http\Controllers\AdminChauffeurController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\EntretienController;
use App\Http\Controllers\ChauffeurDashboardController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\MotoController as AdminMotoController;
use App\Http\Controllers\Admin\VersementController as AdminVersementController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('chauffeurs', AdminChauffeurController::class);
    Route::patch('/chauffeurs/{chauffeur}/status', [AdminChauffeurController::class, 'updateStatus'])->name('chauffeurs.updateStatus');
    Route::resource('motos', AdminMotoController::class);
    Route::resource('entretiens', EntretienController::class);
    Route::resource('finances', FinanceController::class);
    Route::resource('users', UserController::class);
    Route::get('versements', [AdminVersementController::class, 'index'])->name('versements.index');
});

Route::middleware(['auth', 'role:chauffeur'])->prefix('chauffeur')->name('chauffeur.')->group(function () {
    Route::get('/dashboard', [ChauffeurDashboardController::class, 'index'])->name('dashboard');
    Route::get('/versement', [ChauffeurController::class, 'versementForm'])->name('versement');
    Route::post('/versement', [ChauffeurController::class, 'faireVersement'])->name('faire-versement');
    Route::get('/historique', [ChauffeurController::class, 'historiqueVersements'])->name('historique');
    Route::get('/change-password', [ChauffeurController::class, 'changePasswordForm'])->name('change-password');
    Route::post('/change-password', [ChauffeurController::class, 'changePassword'])->name('update-password');
});

Route::get('/register/admin', [RegisteredUserController::class, 'createAdmin'])->name('register.admin');
Route::post('/register/admin', [RegisteredUserController::class, 'storeAdmin']);
Route::get('/register/chauffeur', [RegisteredUserController::class, 'createChauffeur'])->name('register.chauffeur');
Route::post('/register/chauffeur', [RegisteredUserController::class, 'storeChauffeur']);

require __DIR__.'/auth.php';