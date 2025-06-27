<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('doctor', 'patient')->get();

        return view('users.index', compact('users'));
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
