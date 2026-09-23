<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Member;
use App\Models\User;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $data= Member::orderBy('id_member', 'desc')
            ->paginate(5);
             $users = User::all(); 

        return view('member.index', compact('data', 'users'));
    }

    public function create(Request $request)
    {
         $users = User::all();
        return view('member.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor'=> 'required',
            'jenis_kendaraan'=> 'required',
            'warna'=> 'required',
            'id_user'=>'required',
        ]);

        member::create([
            'id_user' => $request->id_user,
            'plat_nomor'=> $request->input('plat_nomor'),
            'jenis_kendaraan'=> $request->input('jenis_kendaraan'),
            'warna'=> $request->input('warna'),
        ]);

        return redirect()->route('member.index')->with('success', 'daftar member berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $member = member::find($id);

        if ($member) {
            $member->delete();
        }
        return redirect()->route('member.index')
        ->with('success', 'daftar member berhasil dihapus');
    }

    public function edit($id_member)
    {
        $member = member::findorfail($id_member);
          $users = User::all(); 
         return view('member.edit', compact('member', 'users'));
    }

    public function update(Request $request, $id_member)
    {
        $request->validate([
            'plat_nomor'=> 'required',
            'jenis_kendaraan'=> 'required',
            'warna'=> 'required',
            'id_user'=>'required',
        ]);
        $member = member::findorfail($id_member);
        $member->update([
            'id_user' => $request->id_user,
            'plat_nomor'=> $request->plat_nomor,
            'jenis_kendaraan'=> $request->jenis_kendaraan,
            'warna'=> $request->warna,
        ]);
        return redirect()->route('member.index')->with('success', 'daftar member berhasil diperbarui');
    }
}
