<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function create(Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'pin' => ['required', 'string', 'min:6', 'max:6'],
            'account_type' => ['required', 'string', 'in:Super_Admin,Admin,User'],
        ]);

        // Create a new user record
        $user = User::create([
            'name' => $validatedData['name'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'pin' => $validatedData['pin'],
            'account_type' => $validatedData['account_type'],
        ]);

        // Redirect the user to a success page or perform any other actions
        return redirect()->route('success');
    }

    public function updateUser(Request $request) {

        $validated = $request->validate([
          'pin' => 'required|digits:6'
        ]);
      
        $user = User::where('pin', $request->pin)->firstOrFail();
  
        $user->update([
          'name' => 'test20',
          'phone' => 'test20', 
          'email' => '123456789',
          'password' => Hash::make('test20')
        ]);
      
        return redirect()->back()->with('success', 'User updated!');
      
      }
}
