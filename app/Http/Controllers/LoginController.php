<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
// use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        // return la vue du fichier login.blade.php qui se trouve dans le dossier auth
        return view("auth.login");
    }
    public function login(LoginRequest $request)
    {
        // validation des informations de connexion entrées par l'utilisateur
        $validated = $request->validated();
        // connexion de l'utilisateur une fois les informations entrées
        Auth::login($validated);
        // affichage d'un message de succès
        session()->flash('success', 'Vous êtes connecté !');
        // redirection sur la page affichant les articles une fois l'utilisateur connecté
        return redirect()->route('layouts.articles');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        // déconnexion
        Auth::logout();
        // rendre la session invalide après la déconnexion
        $request->session()->invalidate();
        // regénération du token
        $request->session()->regenerateToken();
        /// affichage d'un message de succès 
        // sous preuve de réussite de la requête
        session()->flash('success', 'Déconnexion effectuée !');
        // redirection sur la page de connexion , une fois déconnecté(e)
        return redirect('/login');
    }
}
