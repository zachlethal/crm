<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class AdminProduitController extends Controller
{
    // Afficher tous les produits
    public function index()
    {
        $produits = Produit::all();
        return view('admin.produits.index', compact('produits'));
    }

    // Afficher le formulaire de création d'un produit
    public function create()
    {
        return view('admin.produits.create');
    }

    // Enregistrer un nouveau produit
    public function store(Request $request)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'type' => 'required|in:interieure,exterieur',
            'categorie' => 'required|string|max:255',
            'gamme' => 'nullable|string|max:255',
            'volume' => 'nullable|numeric',
            'famille' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        $produit = Produit::create($validated);

        // Si une photo est envoyée, la sauvegarder directement dans le dossier public
        if ($request->hasFile('photo')) {
            $produit->photo = $request->file('photo')->storeAs('public', $request->file('photo')->getClientOriginalName());
            $produit->save();
        }

        return redirect()->route('admin.produits.index')->with('success', 'Produit créé avec succès.');
    }

    // Afficher le formulaire d'édition d'un produit
    public function edit(Produit $produit)
    {
        return view('admin.produits.edit', compact('produit'));
    }

    // Mettre à jour un produit
    public function update(Request $request, Produit $produit)
    {
        $validated = $request->validate([
            'marque' => 'required|string|max:255',
            'type' => 'required|in:interieure,exterieur',
            'categorie' => 'required|string|max:255',
            'gamme' => 'nullable|string|max:255',
            'volume' => 'nullable|numeric',
            'famille' => 'required|string|max:255',
            'photo' => 'nullable|image',
        ]);

        $produit->update($validated);

        // Si une nouvelle photo est envoyée, la sauvegarder directement dans le dossier public
        if ($request->hasFile('photo')) {
            $produit->photo = $request->file('photo')->storeAs('public', $request->file('photo')->getClientOriginalName());
            $produit->save();
        }

        return redirect()->route('admin.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    // Afficher les détails d'un produit
    public function show(Produit $produit)
    {
        return view('admin.produits.show', compact('produit'));
    }

    // Supprimer un produit
    public function destroy(Produit $produit)
    {
        $produit->delete();
        return redirect()->route('admin.produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
