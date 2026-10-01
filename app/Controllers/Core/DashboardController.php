<?php

namespace App\Controllers\Core;

use App\Models\User;
use Sakuci\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::current();

        if ($user->role === 'petugas') {
            return view('petugas.dashboard', ['user' => $user]);
        }

        return view('core.dashboard', ['user' => $user]);
    }

    public function admin()
    {
        return view('core.admin.dashboard', ['user' => User::current()]);
    }
}