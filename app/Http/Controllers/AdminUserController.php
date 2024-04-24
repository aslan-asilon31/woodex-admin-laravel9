<?php

namespace App\Http\Controllers;

use App\Models\UserData;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('roles', 'user')->orderBy('name', 'asc')->when(request()->search, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->search . '%');
        })->paginate(10);

        return view('admin.user.index', compact('users'));
    }
}
