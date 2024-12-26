<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boutique;

class AdminBoutiqueController extends Controller
{
    // Voir toutes les boutiques
    public function index()
    {
        $boutiques = Boutique::all();
        return view('admin.boutiques.index', compact('boutiques'));
    }

    // Formulaire pour ajouter une nouvelle boutique
    public function create()
    {
        return view('admin.boutiques.create');
    }

    // Ajouter une nouvelle boutique
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'cart' => 'required',
            'typeachat' => 'required|in:GRO,DDS,MIX',
            'typeboutique' => 'required|in:GMS,Taba cosmitique,cosmitique,superete',
        ]);

        Boutique::create($request->all());

        return redirect()->route('admin.boutiques.index')->with('success', 'Boutique ajoutée avec succès.');
    }

    // Afficher une boutique spécifique
    public function show($id)
    {
        $boutique = Boutique::find($id);
        if (!$boutique) {
            return redirect()->route('admin.boutiques.index')->with('error', 'Boutique introuvable.');
        }

        return view('admin.boutiques.show', compact('boutique'));
    }

    // Formulaire pour modifier une boutique
    public function edit($id)
    {
        $boutique = Boutique::find($id);
        if (!$boutique) {
            return redirect()->route('admin.boutiques.index')->with('error', 'Boutique introuvable.');
        }

        return view('admin.boutiques.edit', compact('boutique'));
    }

    // Modifier une boutique
    public function update(Request $request, $id)
    {
        $boutique = Boutique::find($id);
        if (!$boutique) {
            return redirect()->route('admin.boutiques.index')->with('error', 'Boutique introuvable.');
        }

        $request->validate([
            'nom' => 'sometimes|string|max:255',
            'telephone' => 'sometimes|string|max:20',
            'adresse' => 'sometimes|string|max:255',
            'cart' => 'sometimes',
            'typeachat' => 'sometimes|in:GRO,DDS,MIX',
            'typeboutique' => 'sometimes|in:GMS,Taba cosmitique,cosmitique,superete',
        ]);

        $boutique->update($request->all());

        return redirect()->route('admin.boutiques.index')->with('success', 'Boutique mise à jour avec succès.');
    }

    // Supprimer une boutique
    public function destroy($id)
    {
        $boutique = Boutique::find($id);
        if (!$boutique) {
            return redirect()->route('admin.boutiques.index')->with('error', 'Boutique introuvable.');
        }

        $boutique->delete();

        return redirect()->route('admin.boutiques.index')->with('success', 'Boutique supprimée avec succès.');
    }
}
