<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;
use App\Models\Formateur;

class PromotionController extends Controller
{
    /**
     * Affiche la liste des promotions.
     * 
     * URL : GET /promotions
     * Route : promotions.index
     */
    public function index()
    {
        // Récupère toutes les promotions depuis la base de données
        $formations = Formation::all();

        // Envoie les données à la vue resources/views/promotions/index.blade.php
        return view('formations.index', compact('formations'));
    }

    /**
     * Affiche le formulaire de création d’une promotion.
     * 
     * URL : GET /promotions/create
     * Route : promotions.create
     */
    public function create()
    {
        // Affiche simplement le formulaire
        return view('formations.create');
    }

    /**
     * Enregistre une nouvelle promotion en base de données.
     * 
     * URL : POST /promotions
     * Route : promotions.store
     */
    public function store(Request $request)
    {
        // Validation des données envoyées par le formulaire
        $request->validate([
            'nom' => 'required|',
            'prenom' => 'required|',
            'email' => 'required|',
            'password' => 'required|',
        ]);

        // Création de la promotion (Mass Assignment sécurisé par $fillable)
        Promotion::create([
            'libelle' => $request->libelle,
        ]);

        // Redirection vers la liste avec un message de succès
        return redirect()->route('formateurs.index')
            ->with('success', 'Formateur ajoutée avec succès');
    }

    /**
     * Affiche une promotion spécifique.
     * 
     * URL : GET /promotions/{promotion}
     * Route : promotions.show
     */
    public function show(Promotion $promotion)
    {
        // Affiche les détails d’une promotion
        return view('promotions.show', compact('promotion'));
    }

    /**
     * Affiche le formulaire d’édition d’une promotion.
     * 
     * URL : GET /promotions/{promotion}/edit
     * Route : promotions.edit
     */
    public function edit(Promotion $promotion)
    {
        // Envoie la promotion à modifier à la vue
        return view('promotions.edit', compact('promotion'));
    }

    /**
     * Met à jour une promotion existante.
     * 
     * URL : PUT /promotions/{promotion}
     * Route : promotions.update
     */
    public function update(Request $request, Promotion $promotion)
    {
        // Validation des données
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        // Mise à jour de la promotion
        $promotion->update([
            'libelle' => $request->libelle,
        ]);

        // Redirection vers la liste
        return redirect()->route('promotions.index')
            ->with('success', 'Promotion modifiée avec succès');
    }

    /**
     * Supprime une promotion.
     * 
     * URL : DELETE /promotions/{promotion}
     * Route : promotions.destroy
     */
    public function destroy(Promotion $promotion)
    {
        // Suppression de la promotion
        $promotion->delete();

        // Redirection vers la liste
        return redirect()->route('promotions.index')
            ->with('success', 'Promotion supprimée avec succès');
    }
}
