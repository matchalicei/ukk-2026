@extends('layouts.app')

@section('title', 'Dashboard Owner')

@section('content')

<style>
    .owner-page {
        padding: 24px;
    }

    /* =========================
       CARD HALO OWNER
    ========================= */

    .owner-header-card {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #7b1e26, #b8323c);
        color: white;
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
    }

    .owner-header-card p {
        margin: 0;
        color: rgba(255, 255, 255, 0.88);
        font-size: 15px;
    }

    .owner-logout {
        background: white;
        color: #8b2029;
        border: none;
        border-radius: 9px;
        padding: 10px 18px;
        font-weight: 700;
        cursor: pointer;
        transition: 0.2s;
    }

    .owner-logout:hover {
        transform: translateY(-1px);
        opacity: 0.92;
    }


    /* =========================
       STATISTIC CARD
    ========================= */

    .stats-row {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 24px;
    }

    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #eadfe0;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
    }

    .stat-label {
        color: #777;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .stat-value {
        color: #7b1e26;
        font-size: 27px;
        font-weight: 700;
    }


    /* =========================
       REKAP
    ========================= */

    .rekap-card {
        background: white;
        border-radius: 16px;
        padding: 24px;
        border: 1px solid #eadfe0;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
    }

    .rekap-header {
        margin-bottom: 20px;
    }

    .rekap-header h4 {
        margin: 0;
        color: #3b3031;
        font-weight: 700;
    }


    /* =========================
       FILTER
    ========================= */

    .filter-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        align-items: end;
        margin-bottom: 20px;
    }

    .filter-group {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .filter-group label {
        font-size: 13px;
        color: #777;
        font-weight: 600;
    }

    .filter-group input {
        border: 1px solid #ddd1d2;
        border-radius: 8px;
        padding: 9px 11px;
        font-size: 14px;
        background: white;
    }

    .btn-tampilkan {
        background: #8b2029;
        color: white;
        border: none;
        border-radius: 8px;
        padding: 9px 16px;
        font-weight: 600;
        cursor: pointer;
    }

    .btn-tampilkan:hover {
        background: #731a22;
    }

    .btn-reset {
        background: #f1eeee;
        color: #5c5051;
        border-radius: 8px;
        padding: 9px 16px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-reset:hover {
        background: #e8e1e1;
    }


    /* =========================
       TABLE
    ========================= */

    .table-wrapper {
        overflow-x: auto;
    }

    .rekap-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1000px;
    }

    .rekap-table th {
        background: #f7eeee;
        color: #5b3c3f;
        font-size: 13px;
        font-weight: 700;
        padding: 13px 12px;
        text-align: left;
        white-space: nowrap;
    }

    .rekap-table td {
        padding: 13px 12px;
        border-bottom: 1px solid #eee5e5;
        color: #555;
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
        color: #999 !important;
    }


    /* =========================
       DARK MODE
    ========================= */

    body.dark-mode .owner-header-card {
        background: linear-gradient(135deg, #59151c, #84252e);
    }

    body.dark-mode .stat-card,
    body.dark-mode .rekap-card {
        background: #1f1f21;
        border-color: #3b3031;
    }

    body.dark-mode .stat-label,
    body.dark-mode .filter-group label {
        color: #aaa;
    }

    body.dark-mode .stat-value {
        color: #e36a72;
    }

    body.dark-mode .rekap-header h4 {
        color: #f1e7e8;
    }

    body.dark-mode .rekap-table th {
        background: #302427;
        color: #ead7d9;
    }

    body.dark-mode .rekap-table td {
        color: #d4cbcc;
        border-color: #3b3031;
    }

    body.dark-mode .rekap-table tbody tr:hover {
        background: #292225;
    }

    body.dark-mode .total-row td {
        background: #302427;
        color: #e36a72;
    }

    body.dark-mode .filter-group input {
        background: #1f1f21;
        border-color: #514346;
        color: white;
    }

    body.dark-mode .btn-reset {
        background: #393033;
        color: #e5dadd;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .owner-page {
            padding: 15px;
        }

        .owner-header-content {
            flex-direction: column;
            align-items: flex-start;
        }

        .stats-row {
            grid-template-columns: 1fr;
        }

        .filter-form {
            align-items: stretch;
        }
    }
</style>


<div class="owner-page">

    {{-- =========================
         CARD HALO OWNER
    ========================= --}}

    <div class="owner-header-card">

        <div class="owner-header-content">

            <div>
                <h2>
                    Halo, {{ $user->username }}!
                </h2>

                <p>
                    Selamat datang di dashboard owner Sistem Parkiran Alvira.
                </p>
            </div>

            <form
                action="{{ route('logout') }}"
                method="POST"
                onsubmit="return confirm('Yakin ingin logout?');"
            >
                @csrf

                <button
                    type="submit"
                    class="owner-logout"
                >
                    Logout
                </button>
            </form>

        </div>

    </div>


    {{-- =========================
         STATISTIK
    ========================= --}}

    <div class="stats-row">

        <div class="stat-card">

            <div class="stat-label">
                Total Transaksi
            </div>

            <div class="stat-value">
                {{ $totalTransaksi }}
            </div>

        </div>


        <div class="stat-card">

            <div class="stat-label">
                Total Pendapatan
            </div>

            <div class="stat-value">
                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
            </div>

        </div>

    </div>


    {{-- =========================
         REKAP TRANSAKSI
    ========================= --}}

    <div class="rekap-card">

        <div class="rekap-header">

            <h4>
                Rekap Transaksi
            </h4>

        </div>


        {{-- FILTER --}}

        <form
            action="{{ route('owner.dashboard') }}"
            method="GET"
            class="filter-form"
        >

            <div class="filter-group">

                <label for="dari">
                    Dari Tanggal
                </label>

                <input
                    type="date"
                    id="dari"
                    name="dari"
                    value="{{ $dari }}"
                >

            </div>


            <div class="filter-group">

                <label for="sampai">
                    Sampai Tanggal
                </label>

                <input
                    type="date"
                    id="sampai"
                    name="sampai"
                    value="{{ $sampai }}"
                >

            </div>


            <button
                type="submit"
                class="btn-tampilkan"
            >
                Tampilkan
            </button>


            <a
                href="{{ route('owner.dashboard') }}"
                class="btn-reset"
            >
                Reset
            </a>

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

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td>
                                {{ $t->nomor_karcis }}
                            </td>

                            <td>
                                {{ $t->username }}
                            </td>

                            <td>
                                {{ $t->plat_nomor }}
                            </td>

                            <td>
                                {{ $t->jenis_kendaraan }}
                            </td>

                            <td>
                                {{ $t->nama_area }}
                            </td>

                            <td>
                                {{ $t->waktu_masuk }}
                            </td>

                            <td>
                                {{ $t->waktu_keluar }}
                            </td>

                            <td>
                                {{ $t->durasi_jam }} jam
                            </td>

                            <td>
                                Rp {{ number_format($t->biaya_total, 0, ',', '.') }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="10"
                                class="empty-data"
                            >
                                Belum ada transaksi yang selesai.
                            </td>

                        </tr>

                    @endforelse

                </tbody>


                @if (count($transaksi) > 0)

                    <tfoot>

                        <tr class="total-row">

                            <td colspan="9">
                                Total Pendapatan
                            </td>

                            <td>
                                Rp {{ number_format($totalPendapatan, 0, ',', '.') }}
                            </td>

                        </tr>

                    </tfoot>

                @endif

            </table>

        </div>

    </div>

</div>

@endsection