<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $company_id = auth()->user()->company_id;

        $users = User::where('company_id', $company_id)
            ->latest()
            ->paginate();
        return view('admin.users', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Обновление данных пользователя
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:user,admin',
        ]);

        $user->update($request->all());
        return redirect()->route('users.index')->with('success', 'Данные обновлены!');
    }

    /**
     * Мягкое удаление пользователя
     */
    public function destroy(User $user)
    {
        $user->Delete();
        return redirect()->route('users.index')->with('success', 'Пользователь удален!');
    }
}
