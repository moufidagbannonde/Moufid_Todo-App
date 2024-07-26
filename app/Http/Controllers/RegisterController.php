<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Models\User;


use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view("auth.register");
    }
    public function store(RegisterRequest $request)
    {
       $validated = $request->validated();
       User::create($validated);
       $user = User::where("email", $validated["email"])->firstOrFail();
       Auth::login($user);
       session()->flash('success', 'Bienvenu(e) dans votre compte');
       return redirect()->route('todo.home');
    }
}

