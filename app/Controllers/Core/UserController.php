<?php

namespace App\Controllers\Core;

use App\Models\Role;
use App\Models\User;
use App\Controllers\LogAktivitasController;
use Sakuci\Controller;
use Sakuci\Http\Request;

/** Halaman admin untuk menambah user dan menentukan role-nya. */
class UserController extends Controller
{
    public function index()
    {
        return view('core.admin.users.index', [
            'users' => User::orderBy('username')->get(),
            'roles' => Role::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|min:3|max:50|alpha_dash|unique:users,username',
            'password' => 'required|min:6',
            'role'     => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'username' => $data['username'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'role'     => $data['role'],
        ]);

        $currentUser = User::current();

        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menambah user',
                'Menambahkan user "' . $user->username . '" dengan role "' . $user->role . '".'
            );
        }

        return back()->with(
            'success',
            'User "' . $data['username'] . '" berhasil ditambahkan.'
        );
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $username = $user->username;

        $currentUser = User::current();

        $user->delete();

        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menghapus user',
                'Menghapus user "' . $username . '".'
            );
        }

        return back()->with(
            'success',
            'User "' . $username . '" berhasil dihapus.'
        );
    }
}