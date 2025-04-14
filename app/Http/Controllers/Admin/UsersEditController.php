<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illumminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UsersEditController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', ['user' =>$user]);
    }

    public function update(Request $request, User $user)
    {
        dd($request->all());

        $request->validate([
            'login' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'role' => 'required|in:user,admin',
        ]);

        $user->update($request->all());
        
        return redirect()->route('users.index')
            ->with('success', 'Данные пользователя обновлены!');
    }

    
}
