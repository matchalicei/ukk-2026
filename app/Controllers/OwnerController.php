<?php

namespace App\Controllers;

use Sakuci\Controller;
use Sakuci\Http\Request;

use App\Models\User;
use App\Models\Transaksi;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        $user = User::current();
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
                'area_parkir.nama_area')
            ->where(
                'transaksi.status',
                'keluar');

        if ($request->dari) {
            $query->where(
                'transaksi.waktu_keluar',
                '>=',
                $request->dari . ' 00:00:00');
        }
        if ($request->sampai) {
            $query->where(
                'transaksi.waktu_keluar',
                '<=',
                $request->sampai . ' 23:59:59');
        }
        $transaksi = $query
            ->orderBy(
                'transaksi.id_parkir',
                'desc')->get();

        $totalTransaksi = count($transaksi);
        $totalPendapatan = 0;

        foreach ($transaksi as $item) {
            $totalPendapatan += (float) $item->biaya_total;
        }
        return view(
            'owner.dashboard',
            ['user' => $user,
            'transaksi' => $transaksi,
            'totalTransaksi' => $totalTransaksi,
            'totalPendapatan' => $totalPendapatan,
            'dari' => $request->dari,
            'sampai' => $request->sampai,]);
    }
}