<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
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
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $attributes = request()->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Your provided invalid email or password.',
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
        //        return back()
        //            ->withInput()
        //            ->withErrors(['email' => 'Your provided credentials could not be verified.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye See you next time');
    }
}
