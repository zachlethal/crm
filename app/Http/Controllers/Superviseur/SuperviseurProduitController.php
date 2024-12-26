<?php

namespace App\Http\Controllers\Superviseur;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Illuminate\Http\Request;

class SuperviseurProduitController extends Controller
{
    public function index()
    {
        $produits = Produit::all();
        return view('superviseur.produits.index', compact('produits'));
    }

    public function create()
    {
        return view('superviseur.produits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'marque' => 'required|string|max:255',
            'type' => 'required|in:interieure,exterieur',
            'categorie' => 'required|string|max:255',
            'gamme' => 'nullable|string|max:255',
            'volume' => 'nullable|numeric',
            'famille' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $produit = new Produit();
        $produit->marque = $request->marque;
        $produit->type = $request->type;
        $produit->categorie = $request->categorie;
        $produit->gamme = $request->gamme;
        $produit->volume = $request->volume;
        $produit->famille = $request->famille;

        if ($request->hasFile('photo')) {
            $produit->photo = $request->file('photo')->store('produits', 'public');
        }

        $produit->save();

        return redirect()->route('superviseur.produits.index')->with('success', 'Produit créé avec succès.');
    }

    public function edit($id)
    {
        $produit = Produit::findOrFail($id);
        return view('superviseur.produits.edit', compact('produit'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'marque' => 'required|string|max:255',
            'type' => 'required|in:interieure,exterieur',
            'categorie' => 'required|string|max:255',
            'gamme' => 'nullable|string|max:255',
            'volume' => 'nullable|numeric',
            'famille' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $produit = Produit::findOrFail($id);
        $produit->marque = $request->marque;
        $produit->type = $request->type;
        $produit->categorie = $request->categorie;
        $produit->gamme = $request->gamme;
        $produit->volume = $request->volume;
        $produit->famille = $request->famille;

        if ($request->hasFile('photo')) {
            $produit->photo = $request->file('photo')->store('produits', 'public');
        }

        $produit->save();

        return redirect()->route('superviseur.produits.index')->with('success', 'Produit mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('superviseur.produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
