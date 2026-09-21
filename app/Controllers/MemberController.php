<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $data= Member::orderBy('id_member', 'desc')
            ->paginate(5);
        return view('member.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('member.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_member'=> 'required',
            'plat_nomor'=> 'required',
            'jenis_kendaraan'=> 'required',
            'warna'=> 'required',
        ]);

        member::create([
            'nama_member'=> $request->input('nama_member'),
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
         return view('member.edit', compact('member'));
    }

    public function update(Request $request, $id_member)
    {
        $request->validate([
            'nama_member'=> 'required',
            'plat_nomor'=> 'required',
            'jenis_kendaraan'=> 'required',
            'warna'=> 'required',
        ]);
        $member = member::findorfail($id_member);
        $member->update([
            'nama_member'=> $request->nama_member,
            'plat_nomor'=> $request->plat_nomor,
            'jenis_kendaraan'=> $request->jenis_kendaraan,
            'warna'=> $request->warna,
        ]);
        return redirect()->route('member.index')->with('success', 'daftar member berhasil diperbarui');
    }
}
