<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\Tarif;
use App\Models\User;
use App\Controllers\LogAktivitasController;

class TarifController extends Controller
{
    public function index(Request $request)
    {
        $query = Tarif::orderBy('id_tarif', 'desc');
        if ($request->search) {
            $query->where(
                'jenis_kendaraan',
                'like',
                '%' . $request->search . '%');
        }
        $data = $query->paginate(10);
        return view('tarif.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('tarif.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric',
        ]);

        $cek = Tarif::where(
            'jenis_kendaraan',
            $request->input('jenis_kendaraan'))->first();

        if ($cek) {
            return redirect()
                ->route('tarif.create')
                ->with('error', 'jenis kendaraan sudah terdaftar');
        }
        $tarif = Tarif::create([
            'jenis_kendaraan' => $request->input('jenis_kendaraan'),
            'tarif_per_jam' => $request->input('tarif_per_jam'),
        ]);

        $currentUser = User::current();
        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menambah tarif',
                'Menambahkan tarif kendaraan "' .
                $tarif->jenis_kendaraan .
                '" sebesar Rp ' .
                number_format($tarif->tarif_per_jam, 0, ',', '.') .
                ' per jam.');
        }

        return redirect()
            ->route('tarif.index')
            ->with('success', 'daftar tarif berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $tarif = Tarif::find($id);
        if ($tarif) {

            $jenisKendaraan = $tarif->jenis_kendaraan;
            $tarifPerJam = $tarif->tarif_per_jam;

            $currentUser = User::current();
            $tarif->delete();
            if ($currentUser) {
                LogAktivitasController::createLog(
                    $currentUser->id,
                    'Menghapus tarif',
                    'Menghapus tarif kendaraan "' .
                    $jenisKendaraan .
                    '" sebesar Rp ' .
                    number_format($tarifPerJam, 0, ',', '.') .
                    ' per jam.');
            }
        }
        return redirect()
            ->route('tarif.index')
            ->with('success', 'daftar tarif berhasil dihapus');
    }

    public function edit($id_tarif)
    {
        $tarif = Tarif::findOrFail($id_tarif);
        return view('tarif.edit', compact('tarif'));
    }

    public function update(Request $request, $id_tarif)
    {
        $request->validate([
            'jenis_kendaraan' => 'required',
            'tarif_per_jam' => 'required|numeric'
        ]);

        $tarif = Tarif::findOrFail($id_tarif);

        $jenisLama = $tarif->jenis_kendaraan;
        $tarifLama = $tarif->tarif_per_jam;

        $tarif->update([
            'jenis_kendaraan' => $request->jenis_kendaraan,
            'tarif_per_jam' => $request->tarif_per_jam,
        ]);

        $currentUser = User::current();
        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Mengubah tarif',
                'Mengubah tarif kendaraan dari "' .
                $jenisLama .
                '" Rp ' .
                number_format($tarifLama, 0, ',', '.') .
                ' menjadi "' .
                $tarif->jenis_kendaraan .
                '" Rp ' .
                number_format($tarif->tarif_per_jam, 0, ',', '.') .
                ' per jam.');
        }
        return redirect()
            ->route('tarif.index')
            ->with(
                'success',
                'daftar tarif berhasil diperbarui');
    }
}