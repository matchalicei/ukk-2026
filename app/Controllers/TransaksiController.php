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
                'member.id_member')
            ->join(
                'users',
                'member.id_user',
                '=',
                'users.id')
            ->join(
                'tarif',
                'transaksi.id_tarif',
                '=',
                'tarif.id_tarif')
            ->join(
                'area_parkir',
                'transaksi.id_area',
                '=',
                'area_parkir.id_area')
            ->select(
                'transaksi.*',
                'users.username',
                'member.plat_nomor',
                'member.jenis_kendaraan',
                'tarif.tarif_per_jam',
                'area_parkir.nama_area');

        if ($request->search) {
            $query->where(
                'transaksi.nomor_karcis',
                'like',
                '%' . $request->search . '%');
        }

        $data = $query
            ->orderBy('transaksi.id_parkir', 'desc')
            ->paginate(5);
        return view('transaksi.index', compact('data'));
    }

    public function create(Request $request)
    {
        $members = Member::query()
            ->join(
                'users',
                'member.id_user',
                '=',
                'users.id')->select('member.*')->get();

            if ($request->search_plat) {
                $members->where(
                'plat_nomor',
                'like',
                '%' . $request->search_plat . '%');
            }

        $tarif = Tarif::all();
        $areas = AreaParkir::all();
        $users = User::where('role', 'petugas')->get();

        return view(
            'transaksi.create',
            compact('members', 'tarif', 'areas', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_member' => 'required',
            'id_tarif' => 'required',
            'id_user' => 'required',
            'id_area' => 'required',
        ]);

        $idMember = $request->input('id_member');
        $idTarif = $request->input('id_tarif');
        $idUser = $request->input('id_user');
        $idArea = $request->input('id_area');

        $transaksiAktif = Transaksi::query()
            ->where('id_member', $idMember)
            ->where('status', 'masuk')
            ->first();

        if ($transaksiAktif) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Kendaraan ini masih memiliki transaksi parkir aktif. ' .
                    'Nomor karcis: ' .
                    $transaksiAktif->nomor_karcis);
        }

        $area = AreaParkir::findOrFail($idArea);
        if ($area->terisi >= $area->kapasitas) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Area parkir "' .
                    $area->nama_area .
                    '" sudah penuh.');
        }

        $file = $request->file('foto_plat');
        if (
            !$file ||
            ($file['error'] ?? UPLOAD_ERR_NO_FILE) !== UPLOAD_ERR_OK
        ) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Foto plat nomor wajib diunggah.');
        }

        if (
            empty($file['tmp_name']) ||
            !is_uploaded_file($file['tmp_name'])
        ) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'File foto tidak valid.');
        }

        if (($file['size'] ?? 0) > 10 * 1024 * 1024) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Ukuran foto tidak boleh melebihi 10 MB.');
        }

        $imageInfo = @getimagesize($file['tmp_name']);
        if ($imageInfo === false) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'File yang diunggah harus berupa gambar.');
        }

        $allowedTypes = [
            IMAGETYPE_JPEG,
            IMAGETYPE_PNG,
            IMAGETYPE_GIF,
            IMAGETYPE_WEBP,
        ];

        if (!in_array($imageInfo[2], $allowedTypes, true)) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Format foto harus JPG, PNG, GIF, atau WEBP.');
        }

        $extension = image_type_to_extension(
            $imageInfo[2],
            false
        );

        $namaFoto = bin2hex(random_bytes(16)) . '.' . $extension;
        $folder = dirname(__DIR__, 2) . '/public/uploads/plat';

        if (
            !is_dir($folder) &&
            !mkdir($folder, 0755, true) &&
            !is_dir($folder)
        ) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Folder penyimpanan foto gagal dibuat.');
        }

        $pathFoto = $folder . '/' . $namaFoto;
        if (!move_uploaded_file($file['tmp_name'], $pathFoto)) {
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Foto gagal disimpan.');
        }
        $fotoPlat = 'uploads/plat/' . $namaFoto;

        $prefix = 'PKR-' . date('Y-m-d') . '-';
        $terakhir = Transaksi::query()
            ->where(
                'nomor_karcis',
                'like',
                $prefix . '%')->orderBy('id_parkir', 'desc')->first();

        if ($terakhir) {
            $nomorTerakhir = (int) substr(
                $terakhir->nomor_karcis, -3);
            $urutan = $nomorTerakhir + 1;
        } else {
            $urutan = 1;
        }

        $nomorKarcis = $prefix . str_pad(
            $urutan, 3, '0', STR_PAD_LEFT);


        try {
            $transaksi = Transaksi::create([
                'nomor_karcis' => $nomorKarcis,
                'id_member' => $idMember,
                'waktu_masuk' => date('Y-m-d H:i:s'),
                'waktu_keluar' => null,
                'id_tarif' => $idTarif,
                'durasi_jam' => 0,
                'biaya_total' => 0,
                'status' => 'masuk',
                'id_user' => $idUser,
                'id_area' => $idArea,
                'foto_plat' => $fotoPlat,
            ]);
        } catch (\Throwable $e) {
            if (is_file($pathFoto)) {
                @unlink($pathFoto);
            }
            return redirect()
                ->route('transaksi.create')
                ->with(
                    'error',
                    'Transaksi gagal disimpan. Silakan coba kembali.');
        }

        $area->update([
            'terisi' => $area->terisi + 1,
        ]);

        $currentUser = User::current();
        if ($currentUser) {
            $member = Member::find($idMember);
            LogAktivitasController::createLog(
                $currentUser->id,
                'Kendaraan masuk',
                'Kendaraan dengan nomor karcis "' .
                $nomorKarcis .
                '" dan plat nomor "' .
                ($member ? $member->plat_nomor : '-') .
                '" masuk ke area "' .
                $area->nama_area .
                '".' );
        }
        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi berhasil ditambahkan.');
    }

    public function edit(Request $request, $id_parkir)
    {
        $data = Transaksi::findOrFail($id_parkir);
        $members = Member::all();
        $tarif = Tarif::all();
        $areas = AreaParkir::all();
        $users = User::all();

        return view(
            'transaksi.edit',
            compact('data', 'members', 'tarif', 'areas', 'users'));
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

        $data = Transaksi::findOrFail($id_parkir);
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
                'Transaksi berhasil diperbarui.');
    }

    public function keluar(Request $request, $id_parkir)
    {
        $data = Transaksi::findOrFail($id_parkir);
        if ($data->status === 'keluar') {
            return redirect()
                ->route('transaksi.index')
                ->with(
                    'success',
                    'Kendaraan sudah keluar.');
        }

        $waktuKeluar = date('Y-m-d H:i:s');
        $waktuMasuk = new \DateTime($data->waktu_masuk);
        $waktuKeluarObj = new \DateTime($waktuKeluar);
        $selisih = $waktuMasuk->diff($waktuKeluarObj);
        $totalMenit =
            ($selisih->days * 24 * 60)
            + ($selisih->h * 60)
            + $selisih->i;

        $durasiJam = max(1, (int) ceil($totalMenit / 60));

        $tarif = Tarif::findOrFail($data->id_tarif);

        $biayaTotal = $durasiJam * $tarif->tarif_per_jam;

        $data->update([
            'waktu_keluar' => $waktuKeluar,
            'durasi_jam' => $durasiJam,
            'biaya_total' => $biayaTotal,
            'status' => 'keluar',
        ]);

        $area = AreaParkir::find($data->id_area);
        if ($area && $area->terisi > 0) {
            $area->update([
                'terisi' => $area->terisi - 1,
            ]);
        }

        $currentUser = User::current();
        if ($currentUser) {
            $member = Member::find($data->id_member);
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
                number_format($biayaTotal, 0, ',', '.') .
                '.');
        }

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Kendaraan berhasil keluar.');
    }

    public function destroy(Request $request, $id_parkir)
    {
        $data = Transaksi::findOrFail($id_parkir);
        $nomorKarcis = $data->nomor_karcis;
        $area = null;

        if ($data->status === 'masuk') {
            $area = AreaParkir::find($data->id_area);
        }
        $currentUser = User::current();

        $data->delete();

        if ($area && $area->terisi > 0) {
            $area->update([
                'terisi' => $area->terisi - 1,
            ]);
        }
        if ($currentUser) {
            LogAktivitasController::createLog(
                $currentUser->id,
                'Menghapus transaksi',
                'Menghapus transaksi dengan nomor karcis "' .
                $nomorKarcis .
                '".');
        }

        return redirect()
            ->route('transaksi.index')
            ->with(
                'success',
                'Transaksi berhasil dihapus.'
            );
    }

    public function struk(Request $request, $id_parkir)
    {
        $data = Transaksi::query()
            ->join(
                'member',
                'transaksi.id_member',
                '=',
                'member.id_member')
            ->join(
                'users',
                'member.id_user',
                '=',
                'users.id')
            ->join(
                'tarif',
                'transaksi.id_tarif',
                '=',
                'tarif.id_tarif')
            ->join(
                'area_parkir',
                'transaksi.id_area',
                '=',
                'area_parkir.id_area')
            ->select(
                'transaksi.*',
                'users.username',
                'member.plat_nomor',
                'member.jenis_kendaraan',
                'tarif.tarif_per_jam',
                'area_parkir.nama_area')->where('transaksi.id_parkir', $id_parkir)->first();

        if (!$data) {
            return redirect()
                ->route('transaksi.index')
                ->with(
                    'error',
                    'Data transaksi tidak ditemukan.');
        }
        return view('transaksi.struk', compact('data'));
    }
}