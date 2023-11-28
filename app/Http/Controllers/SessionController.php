<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required', 'min:3', 'max:255', Rule::exists('users', 'username')],
            'password' => ['required', 'min:3', 'max:255']
        ]);

        if (auth()->attempt($attributes)) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Logged In');
        }

        throw ValidationException::withMessages(['password' => 'The password could not be verified.']);
    }


    public function destroy(Request $request)
    {
        auth()->logout();

        return redirect('/')->with('success', 'Logged out!');
    }

}
