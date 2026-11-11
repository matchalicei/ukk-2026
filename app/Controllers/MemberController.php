<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Member;
use App\Models\User;
use App\Controllers\LogAktivitasController;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $data = Member::query()
            ->join('users', 'member.id_user', '=', 'users.id')
            ->select('member.*');

        if ($request->search) {
            $data->where(function ($query) use ($request) {
                $query->where(
                    'users.username',
                    'like',
                    '%' . $request->search . '%')
                ->orWhere(
                    'member.plat_nomor',
                    'like',
                    '%' . $request->search . '%')
                ->orWhere(
                    'member.jenis_kendaraan',
                    'like',
                    '%' . $request->search . '%')
                ->orWhere(
                    'member.warna',
                    'like',
                    '%' . $request->search . '%');
            });
        }

        $data = $data
            ->orderBy('member.id_member', 'desc')
            ->paginate(10);
        $users = User::all();
        return view(
            'member.index',
            compact('data', 'users'));
    }

    public function create(Request $request)
    {
       $users = User::where('role', 'user')->get();
        return view(
            'member.create',
            compact('users'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
        'plat_nomor' => 'required',
        'jenis_kendaraan' => 'required',
        'warna' => 'required',
        'id_user' => 'required',
    ]);

    $platNomor = strtoupper(trim($request->input('plat_nomor')));
    $duplikat = Member::where('plat_nomor', $platNomor)->first();
    if ($duplikat) {
        return redirect()
            ->route('member.create')
            ->with('error', 'Plat nomor sudah terdaftar!');
    }
    $member = Member::create([
        'id_user' => $request->id_user,
        'plat_nomor' => $platNomor,
        'jenis_kendaraan' => $request->input('jenis_kendaraan'),
        'warna' => $request->input('warna'),
    ]);

    $currentUser = User::current();
    if ($currentUser) {
        $pemilik = User::find($member->id_user);

        LogAktivitasController::createLog(
            $currentUser->id,
            'Menambah member',
            'Menambahkan member dengan plat nomor "' .
            $member->plat_nomor .
            '", jenis kendaraan "' .
            $member->jenis_kendaraan .
            '", warna "' .
            $member->warna .
            '", pemilik "' .
            ($pemilik ? $pemilik->username : '-') .
            '".');
            }
    return redirect()
        ->route('member.index')
        ->with('success', 'daftar member berhasil ditambahkan');
        }

    public function destroy($id)
    {
        $member = Member::find($id);
        if ($member) {
            $platNomor = $member->plat_nomor;
            $jenisKendaraan = $member->jenis_kendaraan;

            $currentUser = User::current();
            $member->delete();
            if ($currentUser) {
                LogAktivitasController::createLog(
                    $currentUser->id,
                    'Menghapus member',
                    'Menghapus member dengan plat nomor "' .
                    $platNomor .
                    '" dan jenis kendaraan "' .
                    $jenisKendaraan .
                    '".');
            }
        }
        return redirect()
            ->route('member.index')
            ->with(
                'success',
                'daftar member berhasil dihapus');
    }
    
    public function edit($id_member)
    {
        $member = Member::findOrFail($id_member);
        $users = User::all();
        return view(
            'member.edit',
            compact('member', 'users'));
    }
    
    public function update(Request $request, $id_member)
    {
        $request->validate([
        'plat_nomor' => 'required',
        'jenis_kendaraan' => 'required',
        'warna' => 'required',
        'id_user' => 'required',
    ]);

    $member = Member::findOrFail($id_member);
    $platNomor = strtoupper(trim($request->input('plat_nomor')));

    $duplikat = Member::where('plat_nomor', $platNomor)
        ->where('id_member', '!=', $id_member)
        ->first();

    if ($duplikat) {
        return redirect()
            ->route('member.edit', $id_member)
            ->with('error', 'Plat nomor sudah terdaftar!');
    }

    $platLama = $member->plat_nomor;
    $jenisLama = $member->jenis_kendaraan;
    $warnaLama = $member->warna;

    $member->update([
        'id_user' => $request->id_user,
        'plat_nomor' => $platNomor,
        'jenis_kendaraan' => $request->jenis_kendaraan,
        'warna' => $request->warna,
    ]);

    $currentUser = User::current();
    if ($currentUser) {
        LogAktivitasController::createLog(
            $currentUser->id,
            'Mengubah member',
            'Mengubah member dari plat nomor "' .
            $platLama .
            '", jenis kendaraan "' .
            $jenisLama .
            '", warna "' .
            $warnaLama .
            '" menjadi plat nomor "' .
            $member->plat_nomor .
            '", jenis kendaraan "' .
            $member->jenis_kendaraan .
            '", warna "' .
            $member->warna .
            '".');
    }
    return redirect()
        ->route('member.index')
        ->with('success', 'daftar member berhasil diperbarui');
    }
}