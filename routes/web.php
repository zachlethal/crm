<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperviseurController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminProduitController;
use App\Http\Controllers\Superviseur\SuperviseurProduitController;
use App\Http\Controllers\Admin\AdminBoutiqueController;
use App\Http\Controllers\superviseur\superviseurBoutiqueController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group. Make something great!
|
*/

// Route d'accueil
Route::get('/', function () {
    return view('auth.login');
});

// Routes Admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
// Gestion des user (user)
    Route::prefix('admin/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index'); // Liste des utilisateurs
        Route::get('/create', [UserController::class, 'create'])->name('admin.users.create'); // Créer un utilisateur
        Route::post('/', [UserController::class, 'store'])->name('admin.users.store'); // Enregistrer un utilisateur
        Route::get('/{user}', [UserController::class, 'show'])->name('admin.users.show'); // Détails utilisateur
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); // Modifier un utilisateur
        Route::put('/{user}', [UserController::class, 'update'])->name('admin.users.update'); // Mettre à jour un utilisateur
        Route::delete('/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy'); // Supprimer un utilisateur
    });


    // Gestion des produits (admin)
    Route::prefix('admin/produits')->group(function () {
        Route::get('/', [AdminProduitController::class, 'index'])->name('admin.produits.index'); // Liste des produits
        Route::get('/create', [AdminProduitController::class, 'create'])->name('admin.produits.create'); // Créer un produit
        Route::post('/', [AdminProduitController::class, 'store'])->name('admin.produits.store'); // Enregistrer un produit
        Route::get('/{produit}', [AdminProduitController::class, 'show'])->name('admin.produits.show'); // Détails produit
        Route::get('/{produit}/edit', [AdminProduitController::class, 'edit'])->name('admin.produits.edit'); // Modifier un produit
        Route::put('/{produit}', [AdminProduitController::class, 'update'])->name('admin.produits.update'); // Mettre à jour un produit
        Route::delete('/{produit}', [AdminProduitController::class, 'destroy'])->name('admin.produits.destroy'); // Supprimer un produit
    });
});

// Routes Admin - Gestion des Boutiques
Route::prefix('admin/boutiques')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminBoutiqueController::class, 'index'])->name('admin.boutiques.index'); // Liste des boutiques
    Route::get('/create', [AdminBoutiqueController::class, 'create'])->name('admin.boutiques.create'); // Créer une boutique
    Route::post('/', [AdminBoutiqueController::class, 'store'])->name('admin.boutiques.store'); // Enregistrer une boutique
    Route::get('/{boutique}', [AdminBoutiqueController::class, 'show'])->name('admin.boutiques.show'); // Détails boutique
    Route::get('/{boutique}/edit', [AdminBoutiqueController::class, 'edit'])->name('admin.boutiques.edit'); // Modifier une boutique
    Route::put('/{boutique}', [AdminBoutiqueController::class, 'update'])->name('admin.boutiques.update'); // Mettre à jour une boutique
    Route::delete('/{boutique}', [AdminBoutiqueController::class, 'destroy'])->name('admin.boutiques.destroy'); // Supprimer une boutique
});

// Routes Superviseur
Route::middleware(['auth', 'role:superviseur'])->group(function () {
    // Dashboard superviseur
    Route::get('/superviseur/dashboard', [SuperviseurController::class, 'dashboard'])->name('superviseur.dashboard');

    // Gestion des produits (superviseur)
    Route::prefix('superviseur/produits')->group(function () {
        Route::get('/', [SuperviseurProduitController::class, 'index'])->name('superviseur.produits.index'); // Liste des produits
        Route::get('/create', [SuperviseurProduitController::class, 'create'])->name('superviseur.produits.create'); // Créer un produit
        Route::post('/', [SuperviseurProduitController::class, 'store'])->name('superviseur.produits.store'); // Enregistrer un produit
        Route::get('/{produit}', [SuperviseurProduitController::class, 'show'])->name('superviseur.produits.show'); // Détails produit
        Route::get('/{produit}/edit', [SuperviseurProduitController::class, 'edit'])->name('superviseur.produits.edit'); // Modifier un produit
        Route::put('/{produit}', [SuperviseurProduitController::class, 'update'])->name('superviseur.produits.update'); // Mettre à jour un produit
        Route::delete('/{produit}', [SuperviseurProduitController::class, 'destroy'])->name('superviseur.produits.destroy'); // Supprimer un produit
    });
    Route::prefix('superviseur/boutiques')->group(function () {
        Route::get('/', [superviseurBoutiqueController::class, 'index'])->name('superviseur.boutiques.index'); // Liste des boutiques
        Route::get('/create', [superviseurBoutiqueController::class, 'create'])->name('superviseur.boutiques.create'); // Créer un boutiques
        Route::post('/', [superviseurBoutiqueController::class, 'store'])->name('superviseur.boutiques.store'); // Enregistrer un boutiques
        Route::get('/{produit}', [superviseurBoutiqueController::class, 'show'])->name('superviseur.boutiques.show'); // Détails boutiques
        Route::get('/{produit}/edit', [superviseurBoutiqueController::class, 'edit'])->name('superviseur.boutiques.edit'); // Modifier un boutiques
        Route::put('/{produit}', [superviseurBoutiqueController::class, 'update'])->name('superviseur.boutiques.update'); // Mettre à jour un boutiques
        Route::delete('/{produit}', [superviseurBoutiqueController::class, 'destroy'])->name('superviseur.boutiques.destroy'); // Supprimer un boutiques
    });
});

// Routes d'authentification
require __DIR__ . '/auth.php';
