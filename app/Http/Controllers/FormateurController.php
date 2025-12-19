<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;
use App\Models\Formateur;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formateurs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurRequest $request)
    {
        try {
            // Création de l'utilisateur
            $user = \App\Models\User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => 'FORMATEUR',
                'is_active' => true
            ]);

            // Création du profil formateur associé
            $formateur = $user->formateur()->create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'telephone' => $request->telephone,
                'specialite' => $request->specialite,
                // Ajoutez d'autres champs spécifiques au formateur si nécessaire
            ]);

            // Redirection avec un message de succès
            return redirect()->route('formateurs.create')
                ->with('success', 'Le compte formateur a été créé avec succès !');

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Erreur lors de la création du compte formateur',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Formateur $formateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formateur $formateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormateurRequest $request, Formateur $formateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formateur $formateur)
    {
        //
    }
}
