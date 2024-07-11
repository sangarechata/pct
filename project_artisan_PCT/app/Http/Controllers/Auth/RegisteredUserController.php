<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function status(): View
    {
        return view('auth.status');
    }
    public function createArtisan(): View
    {
        return view('auth.createArtisan');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeClient(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            // 'role' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'nom' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'client',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    
    public function storeArtisan(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => 'required|regex:/(.+)@(.+)\.(.+)$/i', 'string', 'lowercase', 'max:255', 'unique:' . User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'numberPhone' => 'required|regex:/^(225)(0[1,5,7])[0-9]{8}$/','integer',
            'nameEntrep' => ['required', 'string', 'max:255'],
            'nameArt' => ['required', 'string', 'max:255'],
            'nameExp' => ['required', 'string', 'max:255'],
            // 'role' => ['required', 'string', 'max:255'],
            
        ]);

        $user = User::create([
            'nom' => $request->name,
            'prenom' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'numero_de_telephone' => $request->numberPhone,
            'nom_entreprise' => $request->nameEntrep,
            'type_artisanat' => $request->nameArt,
            'annee_experience' => $request->nameExp,
            'role' => 'artisan',
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
