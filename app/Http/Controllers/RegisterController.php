<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create($request->validate([
            'name' => [
                'required',
                'min:3',
                'max:255',
            ],
            'username' => [
                'required',
                'min:3',
                'max:255',
                'unique:users,username',
            ],
            'email' => [
                'required',
                'email', 'max:255',
                'unique:users,email',
                'regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|hotmail|yahoo|laracast)\.com$/',
            ],
            'password' => [
                'required',
                'min:7',
                'max:255',
            ],
        ]));

        //        session()->flash('success', 'Your account has been created.');
        //login the user
        auth()->login($user);

        return redirect('/')
            ->with('success', 'Your account has been created');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register.create');
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
    public function destroy(string $id)
    {
        //
    }
}
