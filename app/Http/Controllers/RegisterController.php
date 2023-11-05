<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|confirmed', Password::default(),
            'phone_number' => 'required|integer|gte:61000000|lte:66000000'
        ]);

        $full_name = $request->first_name . ' ' . $request->last_name;

        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'full_name' => ucwords($full_name),
            'password' => $request->password,
            'phone_number' => $request->phone_number,
            'slug' => rand(10, 10000),
        ]);

        $client->slug = str($full_name)->slug() . '-' . $client->id;
        $client->update();

        Auth::login($client);

        return redirect(RouteServiceProvider::HOME);
    }
}
