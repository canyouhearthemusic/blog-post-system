<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $properties = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
            'email' => ['required', 'email', 'min:3', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'min:3', 'max:255'],
        ]);

        $user = User::create($properties);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been successfully created!');

    }


}
