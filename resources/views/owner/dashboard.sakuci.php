@extends('layouts.app')

@section('title', 'Dashboard Owner')

@section('content')

<style>
    .owner-page {
        padding: 24px;
        max-width: 100%;
        box-sizing: border-box;
    }

    /* =========================
       CARD HALO OWNER
    ========================= */
    .owner-header-card {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #7b1e26, #b8323c);
        color: #ffffff;
        border-radius: 18px;
        padding: 28px 30px;
        margin-bottom: 24px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    .owner-header-card::after {
        content: "";
        position: absolute;
        right: -45px;
        bottom: -55px;
        width: 170px;
        height: 170px;
        border: 25px solid rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        pointer-events: none;
    }

    .owner-header-content {
        position: relative;
        z-index: 2;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .owner-header-card h2 {
        margin: 0 0 8px;
        font-size: 28px;
        font-weight: 700;
        color: #ffffff;
    }

    .owner-header-card p {
        margin: 0;
        color: rgba(255, 255, 255, 0.9);
        font-size: 15px;
    }

    .owner-logout {
        background: #ffffff;
        color: #8b2029;
        border: none;
        border-radius: 9px;
        padding: 10px 18px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .owner-logout:hover {
        transform: translateY(-1px);
        background: #f8f9fa;
        color: #7b1e26;
    }

    /* =========================
       STATISTIC CARD
    ========================= */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #eadfe0;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    .stat-label {
        color: #666666;
        font-size: 14px;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .stat-value {
        color: #7b1e26;
        font-size: 27px;
        font-weight: 700;
    }

    /* =========================
       REKAP CARD
    ========================= */
    .rekap-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #eadfe0;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    .rekap-header {
        margin-bottom: 20px;
    }

    .rekap-header h4 {
        margin: 0;
        color: #3b3031;
        font-weight: 700;
        font-size: 18px;
    }

    /* =========================
       FILTER
    ========================= */
    .filter-form {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        align-items: flex-end;
        margin-bottom: 20px;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 6px;
        flex: 1;
        min-width: 160px;
    }

    .filter-group label {
        font-size: 13px;
        color: #666666;
        font-weight: 600;
    }

    .filter-group input {
        border: 1px solid #ddd1d2;
        border-radius: 8px;
        padding: 9px 12px;
        font-size: 14px;
        background: #ffffff;
        color: #333333;
        outline: none;
        width: 100%;
        box-sizing: border-box;
    }

    .filter-actions {
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .btn-tampilkan {
        background: #8b2029;
        color: #ffffff;
        border: none;
        border-radius: 8px;
        padding: 10px 18px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s ease;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .btn-tampilkan:hover {
        background: #731a22;
    }

    .btn-reset {
        background: #f1eeee;
        color: #5c5051;
        border-radius: 8px;
        padding: 10px 18px;
        text-decoration: none;
        font-weight: 600;
        transition: background 0.2s ease;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        box-sizing: border-box;
    }

    .btn-reset:hover {
        background: #e8e1e1;
    }

    /* =========================
       TABLE
    ========================= */
    .table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 8px;
    }

    .rekap-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .rekap-table th {
        background: #f7eeee;
        color: #5b3c3f;
        font-size: 13px;
        font-weight: 700;
        padding: 14px 12px;
        text-align: left;
        white-space: nowrap;
    }

    .rekap-table td {
        padding: 13px 12px;
        border-bottom: 1px solid #eee5e5;
        color: #555555;
        font-size: 14px;
        white-space: nowrap;
    }

    .rekap-table tbody tr:hover {
        background: #fcf8f8;
    }

    .total-row td {
        font-weight: 700;
        background: #f9f3f3;
        color: #7b1e26;
    }

    .empty-data {
        text-align: center;
        padding: 35px !important;
        color: #888888 !important;
    }

    /* =========================
       DARK MODE (Fix Kontras & Keterbacaan Teks)
    ========================= */
    body.dark-mode .owner-header-card {
        background: linear-gradient(135deg, #4d1319, #751f27);
    }

    body.dark-mode .stat-card,
    body.dark-mode .rekap-card {
        background: #1e1e24;
        border-color: #332a2c;
    }

    body.dark-mode .stat-label,
    body.dark-mode .filter-group label {
        color: #b0a8a9;
    }

    body.dark-mode .stat-value {
        color: #f28b93;
    }

    body.dark-mode .rekap-header h4 {
        color: #f5ecec;
    }

    body.dark-mode .rekap-table th {
        background: #2a1f22;
        color: #f0d8da;
    }

    body.dark-mode .rekap-table td {
        color: #e0d8d9;
        border-color: #332a2c;
    }

    body.dark-mode .rekap-table tbody tr:hover {
        background: #261c1f;
    }

    body.dark-mode .total-row td {
        background: #2a1f22;
        color: #f28b93;
    }

    body.dark-mode .filter-group input {
        background: #27272e;
        border-color: #44373a;
        color: #ffffff;
        color-scheme: dark; /* Memastikan ikon kalender input date terlihat terang di dark mode */
    }

    body.dark-mode .btn-reset {
        background: #332c2e;
        color: #e5dadc;
    }

    body.dark-mode .btn-reset:hover {
        background: #42383b;
        color: #ffffff;
    }

    body.dark-mode .empty-data {
        color: #aaaaaa !important;
    }

    /* =========================
       RESPONSIVE MOBILE
    ========================= */
    @media (max-width: 768px) {
        .owner-page {
            padding: 16px;
        }

        .owner-header-card {
            padding: 20px;
        }

        .owner-header-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .owner-header-card h2 {
            font-size: 22px;
        }

        .owner-logout {
            width: 100%;
            text-align: center;
        }

        .stats-row {
            grid-template-columns: 1fr;
            gap: 12px;
        }

        .rekap-card {
            padding: 16px;
        }

        .filter-form {
            flex-direction: column;
            align-items: stretch;
            gap: 12px;
        }

        .filter-group {
            width: 100%;
        }

        .filter-actions {
            display: flex;
            width: 100%;
            gap: 10px;
        }

        .btn-tampilkan,
        .btn-reset {
            flex: 1;
            text-align: center;
        }
    }
</style>

<div class="owner-page">

    {{-- CARD HALO OWNER --}}
    <div class="owner-header-card">
        <div class="owner-header-content">
            <div>
                <h2>Halo, {{ $user->username }}!</h2>
                <p>Selamat datang di dashboard owner Sistem Parkiran Alvira.</p>
            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin logout?');"
                style="width: 100%; max-width: max-content;"
            >
                @csrf
                <button type="submit" class="owner-logout">
                    Logout
                </button>
            </form>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-label">Total Transaksi</div>
            <div class="stat-value">{{ $totalTransaksi }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-label">Total Pendapatan</div>
            <div class="stat-value">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</div>
        </div>
    </div>

    {{-- REKAP TRANSAKSI --}}
    <div class="rekap-card">
        <div class="rekap-header">
            <h4>Rekap Transaksi</h4>
        </div>

        {{-- FILTER --}}
        <form action="{{ route('owner.dashboard') }}" method="GET" class="filter-form">
            <div class="filter-group">
                <label for="dari">Dari Tanggal</label>
                <input type="date" id="dari" name="dari" value="{{ $dari }}">
            </div>

            <div class="filter-group">
                <label for="sampai">Sampai Tanggal</label>
                <input type="date" id="sampai" name="sampai" value="{{ $sampai }}">
            </div>

            <div class="filter-actions">
                <button type="submit" class="btn-tampilkan">Tampilkan</button>
                <a href="{{ route('owner.dashboard') }}" class="btn-reset">Reset</a>
            </div>
        </form>

        {{-- TABLE --}}
        <div class="table-wrapper">
            <table class="rekap-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Karcis</th>
                        <th>Pemilik</th>
                        <th>Plat Nomor</th>
                        <th>Kendaraan</th>
                        <th>Area</th>
                        <th>Waktu Masuk</th>
                        <th>Waktu Keluar</th>
                        <th>Durasi</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($transaksi as $index => $t)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $t->nomor_karcis }}</td>
                            <td>{{ $t->username }}</td>
                            <td>{{ $t->plat_nomor }}</td>
                            <td>{{ $t->jenis_kendaraan }}</td>
                            <td>{{ $t->nama_area }}</td>
                            <td>{{ $t->waktu_masuk }}</td>
                            <td>{{ $t->waktu_keluar }}</td>
                            <td>{{ $t->durasi_jam }} jam</td>
                            <td>Rp {{ number_format($t->biaya_total, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="empty-data">
                                Belum ada transaksi yang selesai.
                            </td>
                        </tr>
                    @endforelse
                </tbody>

                @if (count($transaksi) > 0)
                    <tfoot>
                        <tr class="total-row">
                            <td colspan="9">Total Pendapatan</td>
                            <td>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>
    </div>

</div>

@endsection