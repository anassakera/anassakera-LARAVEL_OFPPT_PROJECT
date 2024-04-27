<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redis;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'pin' => ['required', 'string', 'max:6', 'min:6', 'nullable'],
        ], [
            'name.required' => 'Name field is required.',
            'phone.required' => 'Phone field is required.',
            'email.required' => 'Email field is required.',
            'password.required' => 'Password field is required.',
            'pin.unique' => 'The PIN code is already taken. Please choose a different PIN.',
        ]);

        $pin = mt_rand(100000, 999999);
        $user = User::where('pin', $request->pin)->first();

        if (!$user) {
            return redirect('register')->with('error', 'The PIN code does not exist.');
        } else {
            $user->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->update(['pin' => $pin]);
            event(new Registered($user));
            Auth::login($user);
            return redirect('register')->with('success', 'User created successfully.');
        }

    }

}

