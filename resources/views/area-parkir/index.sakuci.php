@extends('layouts.app')

@section('title', config('app.name') . ' -- Area Parkir')

@section('content')

<style>

/* =========================
   ROOT WARNA
========================= */

.area-page {
    position: relative;
    width: 100%;
    padding-top: 30px;
    padding-bottom: 65px;
}

:root {
    --racing-red: #D62828;
    --racing-yellow: #FFC400;
    --racing-black: #252525;
}


/* =========================
   CHECKER
========================= */

.area-checker {
    position: absolute;

    top: -5px;
    left: 0;

    width: 100%;
    height: 30px;

    background-color: white;

    background-image:
        linear-gradient(
            45deg,
            var(--racing-black) 25%,
            transparent 25%,
            transparent 75%,
            var(--racing-black) 75%
        ),
        linear-gradient(
            45deg,
            var(--racing-black) 25%,
            transparent 25%,
            transparent 75%,
            var(--racing-black) 75%
        );

    background-position:
        0 0,
        15px 15px;

    background-size: 30px 30px;

    opacity: .9;

    z-index: 1;
}


/* =========================
   HEADER
========================= */

.area-header {
    position: relative;

    min-height: 215px;

    overflow: hidden;

    padding: 32px 28px;

    margin-bottom: 30px;

    background:
        linear-gradient(
            115deg,
            #ffffff 0%,
            #ffffff 55%,
            #fde1e1 100%
        );

    border: 2px solid var(--racing-black);

    border-radius: 18px;

    box-shadow:
        7px 7px 0 var(--racing-black);
}


/* =========================
   DARK HEADER
========================= */

[data-bs-theme="dark"] .area-header {
    background:
        linear-gradient(
            115deg,
            #242424 0%,
            #242424 55%,
            #401818 100%
        );

    border-color: white;

    box-shadow:
        7px 7px 0 var(--racing-red);
}


/* =========================
   HEADER CONTENT
========================= */

.area-header-content {
    position: relative;

    z-index: 6;

    max-width: 560px;
}


/* =========================
   BADGE
========================= */

.area-badge {
    display: inline-block;

    padding: 7px 14px;

    margin-bottom: 12px;

    background: var(--racing-red);

    color: white;

    border: 2px solid var(--racing-black);

    border-radius: 999px;

    font-size: 10px;

    font-weight: 900;

    letter-spacing: 2px;

    box-shadow:
        3px 3px 0 var(--racing-black);
}


/* =========================
   TITLE
========================= */

.area-title {
    display: flex;

    align-items: center;

    gap: 8px;

    margin-bottom: 7px;

    color: var(--racing-black);

    font-size: 29px;

    font-weight: 1000;

    letter-spacing: -1px;
}

.area-title span {
    color: var(--racing-red);
}

[data-bs-theme="dark"] .area-title {
    color: white;
}


/* =========================
   DESCRIPTION
========================= */

.area-description {
    margin: 0;

    max-width: 540px;

    color: #666;

    font-size: 14.5px;

    line-height: 1.6;
}

[data-bs-theme="dark"] .area-description {
    color: #bbbbbb;
}


/* =========================
   MCQUEEN
========================= */

.area-hero {
    position: absolute;

    z-index: 4;

    right: 28px;

    bottom: -45px;

    width: 285px;

    object-fit: contain;

    transform: rotate(-3deg);

    filter:
        drop-shadow(
            7px 8px 0 rgba(37, 37, 37, .18)
        );
}


/* =========================
   SEARCH
========================= */

.area-search {
    display: flex;

    width: 100%;

    gap: 10px;

    margin-bottom: 27px;
}

.area-search input {
    flex: 1;

    height: 46px;

    padding: 0 18px;

    background: #ffffff;

    color: var(--racing-black);

    border: 2px solid var(--racing-black);

    border-radius: 12px;

    font-size: 15px;

    outline: none;

    transition: .2s ease;
}

.area-search input:focus {
    border-color: var(--racing-red);

    box-shadow:
        0 0 0 3px rgba(
            214,
            40,
            40,
            .12
        );
}

.area-search input::placeholder {
    color: #888;
}

.area-search .btn-racing {
    height: 46px;

    min-width: 90px;
}


/* =========================
   DARK SEARCH
========================= */

[data-bs-theme="dark"] .area-search input {
    background: #252525;

    color: white;

    border-color: white;
}

[data-bs-theme="dark"] .area-search input::placeholder {
    color: #aaa;
}


/* =========================
   ACTION
========================= */

.area-action {
    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 15px;

    margin-bottom: 17px;
}

.area-section-title {
    margin: 0;

    color: var(--racing-black);

    font-size: 20px;

    font-weight: 900;
}

[data-bs-theme="dark"] .area-section-title {
    color: white;
}


/* =========================
   RACING BUTTON
========================= */

.btn-racing {
    background: var(--racing-red);

    color: white;

    border: 2px solid var(--racing-black);

    border-radius: 10px;

    padding: 8px 15px;

    font-weight: 800;

    box-shadow:
        3px 3px 0 var(--racing-black);

    transition: .15s ease;
}

.btn-racing:hover {
    background: #b71f1f;

    color: white;

    transform:
        translate(
            1px,
            1px
        );

    box-shadow:
        2px 2px 0 var(--racing-black);
}


/* =========================
   TABLE
========================= */

.area-table-wrapper {
    width: 100%;

    overflow-x: auto;

    border: 2px solid var(--racing-black);

    border-radius: 14px;
    box-shadow:
            6px 6px 0 var(--racing-black);
}

.area-table {
    width: 100%;

    margin: 0;

    vertical-align: middle;
}

.area-table thead th {
    padding: 13px 15px;

    background: var(--racing-red) !important;

    color: white !important;

    border-color: var(--racing-red) !important;

    font-size: 13px;

    font-weight: 900;

    text-transform: uppercase;

    letter-spacing: .5px;

    white-space: nowrap;
}

.area-table tbody td {
    padding: 13px 15px;

    color: var(--racing-black);

    border-color: #dddddd;
}

.area-number {
    color: var(--racing-red);

    font-weight: 900;
}

.area-name {
    font-weight: 800;
}


/* =========================
   KAPASITAS / TERISI
========================= */

.area-capacity,
.area-filled {
    display: inline-block;

    min-width: 75px;

    padding: 6px 10px;

    border: 1px solid var(--racing-black);

    border-radius: 8px;

    text-align: center;

    font-weight: 800;
}

.area-capacity {
    background: #fff3c4;

    color: var(--racing-black);
}

.area-filled {
    background: #ffe0e0;

    color: var(--racing-red);
}


/* =========================
   BUTTON AKSI TABLE
========================= */

.area-edit-btn {
    background: var(--racing-yellow);

    color: var(--racing-black);

    border: 2px solid var(--racing-black);

    border-radius: 8px;

    font-weight: 800;
}

.area-edit-btn:hover {
    background: #eab300;

    color: var(--racing-black);
}

.area-delete-btn {
    background: var(--racing-red);

    color: white;

    border: 2px solid var(--racing-black);

    border-radius: 8px;

    font-weight: 800;
}

.area-delete-btn:hover {
    background: #b71f1f;

    color: white;
}


/* =========================
   DARK TABLE
========================= */

[data-bs-theme="dark"] .area-table-wrapper {
    border-color: white;
    box-shadow:
            6px 6px 0 var(--racing-red);
}

[data-bs-theme="dark"] .area-table tbody td {
    background: #252525;

    color: white;

    border-color: white;
}

[data-bs-theme="dark"] .area-capacity {
    background: #4a3b00;

    color: white;

    border-color: var(--racing-yellow);
}

[data-bs-theme="dark"] .area-filled {
    background: #4a2020;

    color: #ff8b8b;

    border-color: var(--racing-red);
}


/* =========================
   PAGINATION
========================= */

.area-pagination {
    margin-top: 20px;
}

.area-pagination .pagination {
    margin-bottom: 0;
}

.area-pagination .page-link {
    color: var(--racing-red) !important;

    background: white !important;

    border: 2px solid var(--racing-black) !important;

    margin: 0 3px;

    border-radius: 8px !important;

    font-weight: 800;

    box-shadow:
        2px 2px 0 var(--racing-black);

    transition: .15s ease;
}

.area-pagination .page-link:hover {
    color: var(--racing-black) !important;

    background: var(--racing-yellow) !important;

    transform:
        translateY(-1px);
}

.area-pagination .page-item.active .page-link {
    color: white !important;

    background: var(--racing-red) !important;

    border-color: var(--racing-black) !important;
}

.area-pagination .page-item.disabled .page-link {
    color: #888 !important;

    background: #eeeeee !important;

    border-color: #aaa !important;

    box-shadow: none;
}


/* =========================
   DARK PAGINATION
========================= */

[data-bs-theme="dark"] .area-pagination .page-link {
    color: var(--racing-yellow) !important;

    background: #252525 !important;

    border-color: #555 !important;
}

[data-bs-theme="dark"] .area-pagination .page-link:hover {
    color: var(--racing-black) !important;

    background: var(--racing-yellow) !important;
}

[data-bs-theme="dark"] .area-pagination .page-item.active .page-link {
    color: white !important;

    background: var(--racing-red) !important;

    border-color: #555 !important;
}

[data-bs-theme="dark"] .area-pagination .page-item.disabled .page-link {
    color: #777 !important;

    background: #303030 !important;

    border-color: #444 !important;
}


/* =========================
   RESPONSIVE
========================= */

@media (max-width: 768px) {

    .area-page {
        padding-top: 30px;

        padding-bottom: 50px;
    }

    .area-header {
        min-height: 290px;

        padding: 28px 20px;

        box-shadow:
            5px 5px 0 var(--racing-black);
    }

    .area-header-content {
        max-width: 100%;
    }

    .area-title {
        font-size: 27px;
    }

    .area-description {
        max-width: 100%;
    }

    .area-hero {
        width: 225px;

        right: 50%;

        bottom: -28px;

        transform:
            translateX(50%)
            rotate(-3deg);
    }

    .area-search {
        flex-direction: column;
    }

    .area-search .btn-racing {
        width: 100%;
    }

    .area-action {
        align-items: flex-start;

        flex-direction: column;
    }

    .area-action .btn-racing {
        width: 100%;
    }

}

</style>


<div class="area-page">

    {{-- CHECKER --}}
    <div class="area-checker"></div>


    {{-- HEADER --}}
    <div class="area-header">

        <div class="area-header-content">

            <div class="area-badge">
                🏁 PARKING GARAGE
            </div>

            <div class="area-title">
                Area <span>Parkir</span>
            </div>

            <p class="area-description">
                Kelola area parkir, kapasitas kendaraan, dan jumlah kendaraan
                yang sedang terisi dengan mudah dan teratur.
            </p>

        </div>


        {{-- MCQUEEN --}}
        <img
            src="{{ asset('assets/images/racing/mcqueenpacar.png') }}"
            alt="McQueen"
            class="area-hero"
        >

    </div>


    {{-- SEARCH --}}
    <form
        method="GET"
        action="{{ route('area-parkir.index') }}"
        class="area-search"
    >

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama area..."
        >

        <button
            type="submit"
            class="btn btn-racing"
        >
            Cari
        </button>

    </form>


    {{-- ACTION --}}
    <div class="area-action">

        <h2 class="area-section-title">
            Daftar Area Parkir
        </h2>

        <a
            href="{{ route('area-parkir.create') }}"
            class="btn btn-racing"
        >
            + Tambah Area
        </a>

    </div>


    {{-- TABLE --}}
    <div class="area-table-wrapper">

        <table class="table table-hover area-table">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Nama Area</th>

                    <th>Kapasitas</th>

                    <th>Terisi</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>

                @php
                    $no = 1;
                @endphp

                @foreach($data as $a)

                <tr>

                    <td class="area-number">
                        {{ $no++ }}
                    </td>

                    <td class="area-name">
                        {{ $a->nama_area }}
                    </td>

                    <td>

                        <span class="area-capacity">
                            {{ $a->kapasitas }} kendaraan
                        </span>

                    </td>

                    <td>

                        <span class="area-filled">
                            {{ $a->terisi }} kendaraan
                        </span>

                    </td>

                    <td>

                        <a
                            href="{{ route('area-parkir.edit', ['id' => $a->id_area]) }}"
                            class="btn btn-sm area-edit-btn"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('area-parkir.destroy', ['id' => $a->id_area]) }}"
                            method="POST"
                            class="d-inline"
                            onsubmit="return confirm('Apakah benar akan dihapus?');"
                        >

                            @csrf

                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-sm area-delete-btn"
                            >
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>


    {{-- PAGINATION --}}
    <div class="area-pagination">

        {!! $data->links() !!}

    </div>

</div>

@endsection