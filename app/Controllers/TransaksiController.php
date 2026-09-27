<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;

use App\Models\Transaksi;
use App\Models\Member;
use App\Models\Tarif;
use App\Models\AreaParkir;
use App\Models\User;

use App\Controllers\LogAktivitasController;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        $query = Transaksi::query()
            ->join(
                'member',
                'transaksi.id_member',
                '=',
                'member.id_member'
            )
            ->join(
                'users',
                'member.id_user',
                '=',
                'users.id'
            )
            ->join(
                'tarif',
                'transaksi.id_tarif',
                '=',
                'tarif.id_tarif'
            )
            ->join(
                'area_parkir',
                'transaksi.id_area',
                '=',
                'area_parkir.id_area'
            )
            ->select(
                'transaksi.*',
                'users.username',
                'member.plat_nomor',
                'member.jenis_kendaraan',
                'tarif.tarif_per_jam',
                'area_parkir.nama_area'
            );

        if ($request->search) {
            $query->where(
                'transaksi.nomor_karcis',
                'like',
                '%' . $request->search . '%'
            );
        }

        $data = $query
            ->orderBy('transaksi.id_parkir', 'desc')
            ->paginate(5);

        return view(
            'transaksi.index',
            compact('data')
        );
    }

    public function create(Request $request)
    {
        $members = Member::all();
        $tarif = Tarif::all();
        $areas = AreaParkir::all();
        $users = User::all();

        return view(
            'transaksi.create',
            compact(
                'members',
                'tarif',
                'areas',
                'users'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_member' => 'required',
            'id_tarif' => 'required',
            'id_user' => 'required',
            'id_area' => 'required',
        ]);

        /*
        | =========================
        | CEK AREA PARKIR
        | =========================
        */

        $area = AreaParkir::findOrFail(
            $request->input('id_area')
        );

        /*
        | Kalau area sudah penuh,
        | kendaraan tidak boleh masuk.
        */

        if ($area->terisi >= $area->kapasitas) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Area parkir "' .
                    $area->nama_area .
                    '" sudah penuh.'
                );
        }

        /*
        | =========================
        | NOMOR KARCIS
        | =========================
        */

        $prefix = 'PKR-' . date('Y-m-d') . '-';

        $terakhir = Transaksi::where(
            'nomor_karcis',
            'like',
            $prefix . '%'
        )
            ->orderBy('id_parkir', 'desc')
            ->first();

        if ($terakhir) {
            $nomorTerakhir = (int) substr(
                $terakhir->nomor_karcis,
                -3
            );

            $urutan = $nomorTerakhir + 1;
        } else {
            $urutan = 1;
        }

        $nomorKarcis = $prefix . str_pad(
            $urutan,
            3,
            '0',
            STR_PAD_LEFT
        );

        /*
        | =========================
        | BUAT TRANSAKSI
        | =========================
        */

        $transaksi = Transaksi::create([
            'nomor_karcis' => $nomorKarcis,
            'id_member' => $request->input('id_member'),
            'waktu_masuk' => date('Y-m-d H:i:s'),
            'waktu_keluar' => null,
            'id_tarif' => $request->input('id_tarif'),
            'durasi_jam' => 0,
            'biaya_total' => 0,
            'status' => 'masuk',
            'id_user' => $request->input('id_user'),
            'id_area' => $request->input('id_area'),
        ]);

        /*
        | =========================
        | TAMBAH JUMLAH TERISI
        | =========================
        */

        $area->update([
            'terisi' => $area->terisi + 1,
        ]);

        /*
        | =========================
        | LOG AKTIVITAS
        | =========================
        */

        $currentUser = User::current();

        if ($currentUser) {
            $member = Member::find(
                $transaksi->id_member
            );

            LogAktivitasController::createLog(
                $currentUser->id,
                'Kendaraan masuk',
                'Kendaraan dengan nomor karcis "' .
                $transaksi->nomor_karcis .
                '" dan plat nomor "' .
                ($member ? $member->plat_nomor : '-') .
                '" masuk ke area "' .
                $area->nama_area .
                '".'
            );
        }

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'transaksi berhasil ditambahkan'
            );
    }

    public function edit(Request $request, $id_parkir)
    {
        $data = Transaksi::findOrFail(
            $id_parkir
        );

        $members = Member::all();
        $tarif = Tarif::all();
        $areas = AreaParkir::all();
        $users = User::all();

        return view(
            'transaksi.edit',
            compact(
                'data',
                'members',
                'tarif',
                'areas',
                'users'
            )
        );
    }

    public function update(Request $request, $id_parkir)
    {
        $request->validate([
            'id_member' => 'required',
            'id_tarif' => 'required',
            'id_user' => 'required',
            'id_area' => 'required',
            'status' => 'required',
        ]);

        $data = Transaksi::findOrFail(
            $id_parkir
        );

        $data->update([
            'id_member' => $request->input('id_member'),
            'id_tarif' => $request->input('id_tarif'),
            'id_user' => $request->input('id_user'),
            'id_area' => $request->input('id_area'),
            'status' => $request->input('status'),
            'waktu_keluar' => $request->input('waktu_keluar'),
            'durasi_jam' => $request->input('durasi_jam'),
            'biaya_total' => $request->input('biaya_total'),
        ]);

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'transaksi berhasil diperbarui'
            );
    }

    public function keluar(Request $request, $id_parkir)
    {
        $data = Transaksi::findOrFail(
            $id_parkir
        );

        /*
        | =========================
        | CEK STATUS
        | =========================
        */

        if ($data->status === 'keluar') {
            return redirect()
                ->route('transaksi.index')
                ->with(
                    'success',
                    'Kendaraan sudah keluar.'
                );
        }

        /*
        | =========================
        | HITUNG DURASI
        | =========================
        */

        $waktuKeluar = date('Y-m-d H:i:s');

        $waktuMasuk = new \DateTime(
            $data->waktu_masuk
        );

        $waktuKeluarObj = new \DateTime(
            $waktuKeluar
        );

        $selisih = $waktuMasuk->diff(
            $waktuKeluarObj
        );

        $totalMenit =
            ($selisih->days * 24 * 60)
            + ($selisih->h * 60)
            + $selisih->i;

        $durasiJam = max(
            1,
            (int) ceil($totalMenit / 60)
        );

        /*
        | =========================
        | HITUNG BIAYA
        | =========================
        */

        $tarif = Tarif::findOrFail(
            $data->id_tarif
        );

        $biayaTotal =
            $durasiJam *
            $tarif->tarif_per_jam;

        /*
        | =========================
        | UPDATE TRANSAKSI
        | =========================
        */

        $data->update([
            'waktu_keluar' => $waktuKeluar,
            'durasi_jam' => $durasiJam,
            'biaya_total' => $biayaTotal,
            'status' => 'keluar',
        ]);

        /*
        | =========================
        | KURANGI AREA TERISI
        | =========================
        */

        $area = AreaParkir::find(
            $data->id_area
        );

        if ($area && $area->terisi > 0) {
            $area->update([
                'terisi' => $area->terisi - 1,
            ]);
        }

        /*
        | =========================
        | LOG AKTIVITAS
        | =========================
        */

        $currentUser = User::current();

        if ($currentUser) {
            $member = Member::find(
                $data->id_member
            );

            LogAktivitasController::createLog(
                $currentUser->id,
                'Kendaraan keluar',
                'Kendaraan dengan nomor karcis "' .
                $data->nomor_karcis .
                '" dan plat nomor "' .
                ($member ? $member->plat_nomor : '-') .
                '" keluar. Durasi ' .
                $durasiJam .
                ' jam dengan biaya Rp ' .
                number_format(
                    $biayaTotal,
                    0,
                    ',',
                    '.'
                ) .
                '.'
            );
        }

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil keluar.'
            );
    }

    public function destroy(
        Request $request,
        $id_parkir
    ) {
        $data = Transaksi::findOrFail(
            $id_parkir
        );

        $nomorKarcis =
            $data->nomor_karcis;

        /*
        | =========================
        | SIMPAN AREA
        | =========================
        */

        $area = null;

        if ($data->status === 'masuk') {
            $area = AreaParkir::find(
                $data->id_area
            );
        }

        $currentUser = User::current();

        /*
        | =========================
        | HAPUS TRANSAKSI
        | =========================
        */

        $data->delete();

        /*
        | =========================
        | KURANGI TERISI
        | =========================
        */

        if ($area && $area->terisi > 0) {
            $area->update([
                'terisi' => $area->terisi - 1,
            ]);
        }

        /*
        | =========================
        | LOG AKTIVITAS
        | =========================
        */

        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menghapus transaksi',
                'Menghapus transaksi dengan nomor karcis "' .
                $nomorKarcis .
                '".'
            );
        }

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'transaksi berhasil dihapus'
            );
    }
}