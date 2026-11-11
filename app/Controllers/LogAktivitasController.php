<?php

namespace App\Controllers;

use App\Models\LogAktivitas;
use Sakuci\Http\Request;

class LogAktivitasController
{
    public function index(Request $request)
    {
        $query = LogAktivitas::query()
            ->join(
                'users',
                'log_aktivitas.id_user',
                '=',
                'users.id')
            ->select(
                'log_aktivitas.*',
                'users.username');
         if ($request->search) {
         $query->where(function ($q) use ($request) {
            $q->where(
            'users.username',
            'like',
            '%' . $request->search . '%')
             ->orWhere(
            'log_aktivitas.aktivitas',
            'like',
            '%' . $request->search . '%'
        );
    });
}

        $data = $query
            ->orderBy('log_aktivitas.id_log', 'desc')
            ->paginate(15);
         return view(
            'log-aktivitas.index',
            compact('data')
        );
    }

     public static function createLog(
        $id_user,
        $aktivitas,
        $keterangan = null
    ) {
        LogAktivitas::create([
            'id_user' => $id_user,
            'aktivitas' => $aktivitas,
            'keterangan' => $keterangan,
            'waktu' => date('Y-m-d H:i:s'),
        ]);
    }
}