<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1️⃣ Lister tous les utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // 2️⃣ Afficher le formulaire pour créer un utilisateur
    public function create()
    {
        return view('users.create');
    }

    // 3️⃣ Enregistrer un utilisateur
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('users.index');
    }

    // 4️⃣ Supprimer un utilisateur
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
