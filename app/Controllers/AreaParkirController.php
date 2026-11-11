<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;
use App\Models\AreaParkir;
use App\Models\User;
use App\Controllers\LogAktivitasController;

class AreaParkirController extends Controller
{
    public function index(Request $request)
    {
        $query = AreaParkir::orderBy('id_area', 'desc');
        if ($request->search) {
            $query->where(
                'nama_area',
                'like',
                '%' . $request->search . '%'
            );
        }
        $data = $query->paginate(10);
        return view(
            'area-parkir.index',
            compact('data')
        );
    }

    public function create(Request $request)
    {
        return view('area-parkir.create');
    }
   
    public function store(Request $request)
    {
    $request->validate([
        'nama_area' => 'required',
        'kapasitas' => 'required|numeric',
    ]);
    $namaArea = trim($request->input('nama_area'));
    $duplikat = false;

    foreach (AreaParkir::all() as $area) {
    if (strtolower(trim($area->nama_area)) === strtolower($namaArea)) {
        $duplikat = true;
        break;
    }
   }

    if ($duplikat) {
    return redirect()
        ->route('area-parkir.create')
        ->with('error', 'Nama area parkir sudah terdaftar!');
        }

    $data = AreaParkir::create([
        'nama_area' => $namaArea,
        'kapasitas' => $request->input('kapasitas'),
        'terisi' => 0,
    ]);

    $currentUser = User::current();
    if ($currentUser) {
        LogAktivitasController::createLog(
            $currentUser->id,
            'Menambah area parkir',
            'Menambahkan area "' .
            $data->nama_area .
            '" dengan kapasitas ' .
            $data->kapasitas .
            ' kendaraan.'
        );
    }
    return redirect()
        ->route('area-parkir.index')
        ->with('success', 'daftar area parkir berhasil ditambahkan');
        }

    public function edit(Request $request, $id_area)
    {
        $data = AreaParkir::findOrFail($id_area);
        return view(
            'area-parkir.edit',
            compact('data')
        );
    }
    
    public function update(Request $request, $id_area)
    {
    $request->validate([
        'nama_area' => 'required',
        'kapasitas' => 'required|numeric',
    ]);

    $data = AreaParkir::findOrFail($id_area);
    $namaArea = trim($request->input('nama_area'));
    $duplikat = false;
    
    foreach (AreaParkir::all() as $area) {
    if (
        $area->id_area != $id_area &&
        strtolower(trim($area->nama_area)) === strtolower($namaArea)
    ) {
        $duplikat = true;
        break;
    }
    }
    
    if ($duplikat) {
    return redirect()
        ->route('area-parkir.edit', $id_area)
        ->with('error', 'Nama area parkir sudah terdaftar!');
        }
    $namaLama = $data->nama_area;
    $kapasitasLama = $data->kapasitas;

    $data->update([
        'nama_area' => $namaArea,
        'kapasitas' => $request->input('kapasitas'),
    ]);

    $currentUser = User::current();
    if ($currentUser) {
        LogAktivitasController::createLog(
            $currentUser->id,
            'Mengubah area parkir',
            'Mengubah area "' .
            $namaLama .
            '" menjadi "' .
            $data->nama_area .
            '". Kapasitas: ' .
            $kapasitasLama .
            ' → ' .
            $data->kapasitas .
            '.'
        );
    }
    return redirect()
        ->route('area-parkir.index')
        ->with('success', 'daftar area parkir berhasil diperbarui');
        }

    public function destroy(Request $request, $id_area)
    {
        $data = AreaParkir::findOrFail($id_area);
        $namaArea = $data->nama_area;
        $currentUser = User::current();
        $data->delete();

        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menghapus area parkir',
                'Menghapus area "' .
                $namaArea .
                '".'
            );
        }
        return redirect()
            ->route('area-parkir.index')
            ->with(
                'success',
                'daftar area parkir berhasil dihapus'
            );
    }
}