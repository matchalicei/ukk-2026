@extends('layouts.app')

@section('title', 'Log Aktivitas')

@section('content')

<style>
    .log-page {
        width: 100%;
    }

    /* =========================
       CARD UTAMA
    ========================= */

    .log-header {
        position: relative;
        overflow: hidden;

        background: #fff;
        color: #252525;

        border: 2px solid #252525;
        border-radius: 16px;

        padding: 28px;
        margin-bottom: 22px;

        box-shadow: 5px 5px 0 #D62828;
    }

    .log-header h1 {
        margin: 0;
        font-weight: 800;
    }

    .log-header p {
        margin: 6px 0 0;
        color: #555;
    }

    .log-badge {
        display: inline-block;

        background: #FFC400;
        color: #252525;

        font-weight: 800;

        padding: 6px 12px;
        border-radius: 999px;

        font-size: 12px;
        margin-bottom: 10px;
    }


    /* =========================
       SEARCH
    ========================= */

    .log-search {
        display: flex;
        gap: 10px;

        width: 100%;
        margin-bottom: 20px;
    }

    .log-search input {
        flex: 1;

        height: 48px;

        border: 2px solid #252525;
        border-radius: 12px;

        padding: 0 15px;

        background: #fff;
        color: #252525;

        outline: none;
    }

    .log-search input:focus {
        border-color: #D62828;

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .15);
    }

    .log-search input::placeholder {
        color: #888;
    }

    .log-search button {
        height: 48px;

        padding: 0 25px;

        border: 2px solid #252525;
        border-radius: 12px;

        background: #D62828;
        color: white;

        font-weight: 700;

        cursor: pointer;
    }

    .log-search button:hover {
        background: #b71f1f;
    }


    /* =========================
       TABLE
    ========================= */

    .log-table-wrap {
        overflow-x: auto;

        background: #fff;

        border: 2px solid #252525;
        border-radius: 14px;

        box-shadow: 5px 5px 0 #D62828;
    }

    .log-table {
        width: 100%;
        margin: 0;

        border-collapse: collapse;
    }

    .log-table th {
        background: #D62828;
        color: white;

        padding: 13px 14px;

        border: 1px solid #252525;

        white-space: nowrap;
        text-align: left;

        font-size: 12px;
        font-weight: 900;
    }

    .log-table td {
        padding: 13px 14px;

        border: 1px solid #252525;

        vertical-align: middle;

        font-size: 13px;
    }

    .log-table tbody tr:hover td {
        background: #fff8dc;
    }

    .log-activity {
        font-weight: 700;
    }

    .log-time {
        white-space: nowrap;
        font-size: 14px;
    }

    .log-empty {
        text-align: center;

        padding: 35px !important;

        color: #777;
    }


    /* =========================
       PAGINATION
    ========================= */

    .log-pagination {
        margin-top: 22px;
    }

    .log-pagination .pagination {
        gap: 6px;
        margin: 0;
    }

    .log-pagination .page-link {
        min-width: 38px;

        color: #D62828;
        background: white;

        border: 2px solid #252525;
        border-radius: 7px;

        font-weight: 800;
        text-align: center;

        box-shadow: 2px 2px 0 #252525;
    }

    .log-pagination .page-link:hover {
        color: #252525;
        background: #FFC400;

        border-color: #252525;
    }

    .log-pagination .page-item.active .page-link {
        color: white;
        background: #D62828;

        border-color: #D62828;

        box-shadow: 2px 2px 0 #252525;
    }

    .log-pagination .page-item.disabled .page-link {
        color: #999;
        background: #eee;

        border-color: #aaa;

        box-shadow: none;
    }


    /* =========================
       DARK MODE
    ========================= */

    [data-bs-theme="dark"] .log-header {
        background:
            linear-gradient(
                115deg,
                #242424 0%,
                #242424 55%,
                #401818 100%
            );

        color: white;

        border-color: white;

        box-shadow: 5px 5px 0 #D62828;
    }

    [data-bs-theme="dark"] .log-header p {
        color: #ccc;
    }

    [data-bs-theme="dark"] .log-search input {
        background: #242424;
        color: white;

        border-color: white;
    }

    [data-bs-theme="dark"] .log-search input::placeholder {
        color: #aaa;
    }

    [data-bs-theme="dark"] .log-search button {
        border-color: white;
    }

    [data-bs-theme="dark"] .log-table-wrap {
        background: #242424;

        border-color: white;

        box-shadow: 5px 5px 0 #D62828;
    }

    [data-bs-theme="dark"] .log-table {
        background: #242424;
        color: white;
    }

    [data-bs-theme="dark"] .log-table th {
        background: #D62828;
        color: white;

        border-color: white;
    }

    [data-bs-theme="dark"] .log-table td {
        background: #242424;
        color: white;

        border-color: #4d4d4d;
    }

    [data-bs-theme="dark"] .log-table tbody tr:hover td {
        background: #302020;
    }

    [data-bs-theme="dark"] .log-empty {
        color: #ccc;
    }


    /* =========================
       PAGINATION DARK MODE
    ========================= */

    [data-bs-theme="dark"] .log-pagination .page-link {
        color: #FFC400;
        background: #252525;

        border-color: white;

        box-shadow: 2px 2px 0 #D62828;
    }

    [data-bs-theme="dark"] .log-pagination .page-link:hover {
        color: #252525;
        background: #FFC400;

        border-color: white;
    }

    [data-bs-theme="dark"] .log-pagination .page-item.active .page-link {
        color: white;
        background: #D62828;

        border-color: #D62828;

        box-shadow: 2px 2px 0 #D62828;
    }

    [data-bs-theme="dark"] .log-pagination .page-item.disabled .page-link {
        color: #aaa;
        background: #3a3a3a;

        border-color: #777;

        box-shadow: none;
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 576px) {

        .log-header {
            padding: 22px;
        }

        .log-search {
            flex-direction: column;
        }

        .log-search button {
            width: 100%;
        }
    }
</style>

<div class="log-page">

    {{-- HEADER --}}
    <div class="log-header">

        <span class="log-badge">
            AKTIVITAS SISTEM
        </span>

        <h1>
            Log Aktivitas
        </h1>

        <p>
            Catatan aktivitas pengguna yang dilakukan di dalam sistem parkir.
        </p>

    </div>


    {{-- SEARCH --}}
    <form
        method="GET"
        action="{{ route('log-aktivitas.index') }}"
        class="log-search"
    >

        <input
            type="text"
            name="search"
            value="{{ request()->search ?? '' }}"
            placeholder="Cari berdasarkan username..."
        >

        <button type="submit">
            Cari
        </button>

    </form>


    {{-- TABLE --}}
    <div class="log-table-wrap">

        <table class="log-table">

            <thead>

                <tr>
                    <th width="70">No</th>
                    <th>Username</th>
                    <th>Aktivitas</th>
                    <th>Keterangan</th>
                    <th>Waktu</th>
                </tr>

            </thead>


            <tbody>

                @php
                    $no = 1;
                @endphp

                @foreach ($data as $item)

                    <tr>

                        <td>
                            {{ $no++ }}
                        </td>

                        <td>
                            {{ $item->username }}
                        </td>

                        <td class="log-activity">
                            {{ $item->aktivitas }}
                        </td>

                        <td>
                            {{ $item->keterangan ?? '-' }}
                        </td>

                        <td class="log-time">
                            {{ $item->waktu }}
                        </td>

                    </tr>

                @endforeach


                @if (count($data) === 0)

                    <tr>

                        <td
                            colspan="5"
                            class="log-empty"
                        >
                            Belum ada aktivitas yang tercatat.
                        </td>

                    </tr>

                @endif

            </tbody>

        </table>

    </div>


   @if ($data->hasPages())

    <div class="log-pagination">
        {!! $data->links() !!}
    </div>

@endif
</div>

@endsection