<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    // عرض تفاصيل مستخدم معين
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
    // عرض نموذج إنشاء مستخدم جديد
    public function create()
    {
        return view('users.create');
    }

    // حفظ المستخدم الجديد في قاعدة البيانات
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
            'pin' => 'required|size:6',
            'account_type' => 'required|in:Super_Admin,Admin,User',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    // عرض نموذج تعديل مستخدم معين
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // تحديث بيانات المستخدم في قاعدة البيانات
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'sometimes|min:6',
            'pin' => 'required|size:6',
            'account_type' => 'required|in:Super_Admin,Admin,User',
        ]);

        if ($request->filled('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    // حذف مستخدم من قاعدة البيانات
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
