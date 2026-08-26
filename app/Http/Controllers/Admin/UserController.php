<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name')->get();

        return view('admin.users.index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'is_admin' => 'nullable|boolean',
        ]);

        $validated['is_admin'] = $request->boolean('is_admin');

        User::create($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangemaakt.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'nullable|string|max:255|unique:users,username,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'is_admin' => 'nullable|boolean',
        ]);

        $validated['is_admin'] = $request->boolean('is_admin');

        $user->update($validated);

        return redirect()
            ->route('admin.users.index')
            ->with('success', 'Gebruiker succesvol aangepast.');
    }
}
