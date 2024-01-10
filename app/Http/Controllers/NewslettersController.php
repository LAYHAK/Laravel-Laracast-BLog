<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;

class NewslettersController extends Controller
{
    //invoke method is called when the class is called as a function
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate([
            'email' => ['required', 'email', 'max:255', 'regex:/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?(gmail|hotmail|yahoo|laracast)\.com$/'],
        ]);

        try {
            //$newsletter = new Newsletter();
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw \Illuminate\Validation\ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.',
            ]);
        }

        return redirect('/')->with('success', 'You are now signed up for our newsletter!');
    }
}
