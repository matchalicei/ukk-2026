```blade
@extends('layouts.app')

@section('title', 'Transaksi')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
        --racing-soft-red: #fff3f3;
        --racing-border: #d8d8d8;
    }

    .transaksi-page {
        position: relative;
        width: 100%;
        padding: 30px 0 65px;
    }

    /* =========================
       CHECKERED FLAG
    ========================= */

    .transaksi-checker {
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

    .transaksi-header {
        position: relative;
        min-height: 220px;
        overflow: hidden;

        padding: 35px 40px;
        margin-bottom: 27px;

        background:
            linear-gradient(
                115deg,
                #ffffff 0%,
                #ffffff 55%,
                #fde1e1 100%
            );

        border: 2px solid var(--racing-black);
        border-radius: 18px;

        box-shadow: 7px 7px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .transaksi-header {
        background:
            linear-gradient(
                115deg,
                #242424 0%,
                #242424 55%,
                #401818 100%
            );

        border-color: white;
        box-shadow: 7px 7px 0 var(--racing-red);
    }

    .transaksi-header-content {
        position: relative;
        z-index: 5;
        max-width: 600px;
    }

    .transaksi-badge {
        display: inline-block;

        padding: 7px 15px;
        margin-bottom: 13px;

        background: var(--racing-red);
        color: white;

        border: 2px solid var(--racing-black);
        border-radius: 999px;

        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;

        box-shadow: 3px 3px 0 var(--racing-black);
    }

    .transaksi-title {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;

        margin: 0 0 8px;

        color: var(--racing-black);

        font-size: 31px;
        font-weight: 1000;
        letter-spacing: -1px;
        line-height: 1.15;
    }

    .transaksi-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .transaksi-title {
        color: white;
    }

    .transaksi-description {
        max-width: 570px;

        margin: 0;

        color: #666;

        font-size: 14.5px;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .transaksi-description {
        color: #bbb;
    }

    .transaksi-hero {
        position: absolute;
        z-index: 3;

        right: 30px;
        bottom: -35px;

        width: 250px;
        height: auto;

        object-fit: contain;

        transform: rotate(-5deg);

        filter:
            drop-shadow(
                5px 6px 0 rgba(0, 0, 0, .18)
            );
    }


    /* =========================
       SEARCH
    ========================= */

    .transaksi-search {
        display: flex;
        width: 100%;
        gap: 10px;

        margin-bottom: 27px;
    }

    .transaksi-search input {
        width: 100%;
        height: 46px;

        padding: 0 18px;

        background: white;
        color: var(--racing-black);

        border: 2px solid var(--racing-black);
        border-radius: 12px;

        font-size: 15px;
        outline: none;
    }

    .transaksi-search input:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .15);
    }

    .transaksi-search input::placeholder {
        color: #888;
    }

    [data-bs-theme="dark"] .transaksi-search input {
        background: #252525;
        color: white;
        border-color: white;
    }

    [data-bs-theme="dark"] .transaksi-search input::placeholder {
        color: #aaa;
    }


    /* =========================
       BUTTON
    ========================= */

    .btn-racing {
        background: var(--racing-red);
        color: white;

        border: 2px solid var(--racing-black);
        border-radius: 10px;

        padding: 8px 15px;

        font-size: 14px;
        font-weight: 900;

        box-shadow: 3px 3px 0 var(--racing-black);

        text-decoration: none;
    }

    .btn-racing:hover {
        background: #b91c1c;
        color: white;

        transform: translateY(-1px);
    }

    .transaksi-search .btn-racing {
        min-width: 90px;
        height: 46px;
    }


    /* =========================
       TITLE + ADD
    ========================= */

    .transaksi-action {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;

        margin-bottom: 17px;
    }

    .transaksi-section-title {
        margin: 0;

        color: var(--racing-black);

        font-size: 20px;
        font-weight: 900;
    }

    [data-bs-theme="dark"] .transaksi-section-title {
        color: white;
    }


    /* =========================
   TABLE WRAPPER
========================= */

.transaksi-table-wrapper {
    width: 100%;
    overflow-x: auto;

    background: white;

    border: 2px solid var(--racing-black);
    border-radius: 14px;

    box-shadow: 5px 5px 0 var(--racing-black);
}

[data-bs-theme="dark"] .transaksi-table-wrapper {
    background: var(--racing-red);

    border-color: white;

    box-shadow: 5px 5px 0 var(--racing-red);
}


/* =========================
   TABLE
========================= */

.transaksi-table {
    width: 100%;
    min-width: 1150px;

    margin: 0;

    border-collapse: collapse;

    background: white;
}

[data-bs-theme="dark"] .transaksi-table {
    background: #252525;
}


/* HEADER */

.transaksi-table th {
    padding: 13px 14px;

    background: var(--racing-red);
    color: white;

    border: 1px solid rgba(0, 0, 0, .15);

    font-size: 12px;
    font-weight: 900;

    text-transform: uppercase;
    white-space: nowrap;
}


/* ISI */

.transaksi-table td {
    padding: 12px 13px;

    background: white;
    color: var(--racing-black);

    border: 1px solid #dedede;

    font-size: 13px;
    font-weight: 600;

    vertical-align: middle;
    white-space: nowrap;
}

[data-bs-theme="dark"] .transaksi-table td {
    background: #252525;
    color: white;

    border-color: #4d4d4d;
}


/* HOVER */

.transaksi-table tbody tr:hover td {
    background: #fff8f8;
}

[data-bs-theme="dark"] .transaksi-table tbody tr:hover td {
    background: #302020;
}


/* NOMOR */

.transaksi-table td:first-child {
    color: var(--racing-red);
    font-weight: 900;
    text-align: center;
}


    /* =========================
       NOMOR KARCIS
    ========================= */

    .nomor-karcis {
        display: inline-block;

        padding: 5px 8px;

        background: var(--racing-soft-red);
        color: var(--racing-red);

        border: 1px solid #f0bebe;
        border-radius: 6px;

        font-weight: 900;
    }

    [data-bs-theme="dark"] .nomor-karcis {
        background: #401818;
        color: #ff7777;

        border-color: var(--racing-red);
    }


    /* =========================
       DATA DI DALAM CELL
       BUKAN KOTAK TERPISAH
    ========================= */

    .data-main {
        display: block;

        color: var(--racing-black);
        font-weight: 800;
    }

    [data-bs-theme="dark"] .data-main {
        color: white;
    }

    .data-sub {
        display: block;

        margin-top: 3px;

        color: #888;

        font-size: 11px;
        font-weight: 600;
    }

    [data-bs-theme="dark"] .data-sub {
        color: #aaa;
    }


    /* =========================
       STATUS
    ========================= */

    .status-badge {
        display: inline-block;

        min-width: 65px;

        padding: 6px 10px;

        border-radius: 7px;

        font-size: 11px;
        font-weight: 900;

        text-align: center;
    }

    .status-masuk {
        background: #fff0f0;
        color: var(--racing-red);

        border: 1px solid #e9aaaa;
    }

    .status-keluar {
        background: #fff8d6;
        color: #7a5b00;

        border: 1px solid #e5cf69;
    }

    [data-bs-theme="dark"] .status-masuk {
        background: #401818;
        color: #ff7777;

        border-color: var(--racing-red);
    }

    [data-bs-theme="dark"] .status-keluar {
        background: #3d361b;
        color: var(--racing-yellow);

        border-color: var(--racing-yellow);
    }


    /* =========================
       AKSI
    ========================= */

    .aksi-wrapper {
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .btn-edit,
    .btn-keluar,
    .btn-delete {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 55px;
        height: 33px;

        padding: 0 9px;

        border-radius: 7px;

        font-size: 11px;
        font-weight: 900;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-edit {
        background: var(--racing-yellow);
        color: var(--racing-black);

        border: 1px solid var(--racing-black);
    }

    .btn-edit:hover {
        background: #e5ad00;
        color: var(--racing-black);
    }

    .btn-keluar {
        background: var(--racing-red);
        color: white;

        border: 1px solid var(--racing-black);
    }

    .btn-keluar:hover {
        background: #b91c1c;
        color: white;
    }

    .btn-delete {
        background: white;
        color: var(--racing-red);

        border: 1px solid var(--racing-red);
    }

    .btn-delete:hover {
        background: #fff0f0;
        color: #b91c1c;
    }

    [data-bs-theme="dark"] .btn-delete {
        background: #252525;
        color: #ff7777;

        border-color: var(--racing-red);
    }


    /* =========================
       PAGINATION
    ========================= */

    .transaksi-pagination {
        margin-top: 22px;
    }

    .transaksi-pagination .pagination {
        gap: 6px;
    }

    .transaksi-pagination .page-link {
        min-width: 38px;

        color: var(--racing-red);
        background: white;

        border: 2px solid var(--racing-black);
        border-radius: 7px;

        font-weight: 800;
        text-align: center;

        box-shadow: 2px 2px 0 var(--racing-black);
    }

    .transaksi-pagination .page-link:hover {
        color: var(--racing-black);
        background: var(--racing-yellow);
    }

    .transaksi-pagination .page-item.active .page-link {
        color: white;
        background: var(--racing-red);

        border-color: var(--racing-red);
    }

    .transaksi-pagination .page-item.disabled .page-link {
        color: #999;
        background: #eee;

        border-color: #aaa;

        box-shadow: none;
    }

    [data-bs-theme="dark"] .transaksi-pagination .page-link {
        color: var(--racing-yellow);
        background: #252525;

        border-color: white;

        box-shadow: 2px 2px 0 var(--racing-red);
    }

    [data-bs-theme="dark"] .transaksi-pagination .page-link:hover {
        color: var(--racing-black);
        background: var(--racing-yellow);
    }

    [data-bs-theme="dark"] .transaksi-pagination .page-item.active .page-link {
        color: white;
        background: var(--racing-red);

        border-color: var(--racing-red);
    }


    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .transaksi-page {
            padding: 25px 0 50px;
        }

        .transaksi-checker {
            height: 30px;

            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        [data-bs-theme="dark"] .transaksi-checker {
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        .transaksi-header {
            min-height: 275px;

            padding: 30px 20px;

            box-shadow: 5px 5px 0 var(--racing-black);
        }

        .transaksi-header-content {
            max-width: 100%;
        }

        .transaksi-title {
            font-size: 27px;
        }

        .transaksi-description {
            max-width: 100%;
        }

        .transaksi-hero {
            width: 190px;

            right: 50%;
            bottom: -35px;

            transform:
                translateX(50%)
                rotate(-5deg);
        }

        .transaksi-search {
            flex-direction: column;
        }

        .transaksi-search .btn-racing {
            width: 100%;
        }

        .transaksi-action {
            flex-direction: column;
            align-items: stretch;
        }

        .transaksi-action .btn-racing {
            width: 100%;
            text-align: center;
        }

        .transaksi-table-wrapper {
            box-shadow: 4px 4px 0 var(--racing-black);
        }
        
    }
</style>


<div class="transaksi-page">


    {{-- =========================
         BENDERA PANJANG
    ========================== --}}

    <div class="transaksi-checker"></div>


    {{-- =========================
         HEADER
    ========================== --}}

    <div class="transaksi-header">

        <img
            src="{{ asset('assets/images/racing/apipetir.png') }}"
            alt="Petir"
            class="transaksi-hero"
        >

        <div class="transaksi-header-content">

            <div class="transaksi-badge">
                PARKIR
            </div>

            <h1 class="transaksi-title">
                Transaksi
                <span>Parkiran Alvira</span>
            </h1>

            <p class="transaksi-description">
                Kelola kendaraan masuk dan keluar,
                nomor karcis, tarif, area parkir,
                serta pembayaran kendaraan.
            </p>

        </div>

    </div>


    {{-- =========================
         SEARCH
    ========================== --}}

    <form
        method="GET"
        action="{{ route('transaksi.index') }}"
        class="transaksi-search"
    >

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nomor karcis..."
        >

        <button
            type="submit"
            class="btn btn-racing"
        >
            Cari
        </button>

    </form>


    {{-- =========================
         TITLE + BUTTON
    ========================== --}}

    <div class="transaksi-action">

        <h2 class="transaksi-section-title">
            Daftar Transaksi
        </h2>

        <a
            href="{{ route('transaksi.create') }}"
            class="btn btn-racing"
        >
            + Transaksi Masuk
        </a>

    </div>


    {{-- =========================
         TABLE
    ========================== --}}

    <div class="transaksi-table-wrapper">

        <table class="transaksi-table">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nomor Karcis</th>
                    <th>Member</th>
                    <th>Tarif</th>
                    <th>Area</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Durasi</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>

            </thead>


            <tbody>

                @php
                    $nomor = $data->firstItem();
                @endphp


                @if ($data->count() > 0)

                    @foreach ($data as $t)

                        <tr>


                            {{-- NO --}}

                            <td>
                                {{ $nomor++ }}
                            </td>


                            {{-- NOMOR KARCIS --}}

                            <td>

                                <span class="nomor-karcis">
                                    {{ $t->nomor_karcis }}
                                </span>

                            </td>


                            {{-- MEMBER --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->username }}
                                </span>

                                <span class="data-sub">
                                    {{ $t->plat_nomor }}
                                </span>

                            </td>


                            {{-- TARIF --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->jenis_kendaraan }}
                                </span>

                                <span class="data-sub">
                                    Rp {{ number_format($t->tarif_per_jam, 0, ',', '.') }}/jam
                                </span>

                            </td>


                            {{-- AREA --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->nama_area }}
                                </span>

                            </td>


                            {{-- WAKTU MASUK --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->waktu_masuk }}
                                </span>

                            </td>


                            {{-- WAKTU KELUAR --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->waktu_keluar ?? '-' }}
                                </span>

                            </td>


                            {{-- DURASI --}}

                            <td>

                                <span class="data-main">
                                    {{ $t->status === 'keluar' ? $t->durasi_jam . ' jam' : '-' }}
                                </span>

                            </td>


                            {{-- TOTAL --}}

                            <td>

                                <span class="data-main">
                                    Rp {{ number_format($t->biaya_total, 0, ',', '.') }}
                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($t->status === 'masuk')

                                    <span class="status-badge status-masuk">
                                        Masuk
                                    </span>

                                @else

                                    <span class="status-badge status-keluar">
                                        Keluar
                                    </span>

                                @endif

                            </td>


                           {{-- AKSI --}}

<td>
    <div class="aksi-wrapper">
            @if ($t->foto_plat)
            <button
    type="button"
    class="btn-edit"
    onclick="bukaFotoPlat(this)"
    data-foto="{{ asset($t->foto_plat) }}"
>
    Lihat Foto
</button>
        @endif


        @if ($t->status === 'masuk')

            <form
                action="{{ route('transaksi.keluar', ['id_parkir' => $t->id_parkir]) }}"
                method="POST"
                onsubmit="return confirm('Yakin kendaraan ini akan keluar?');"
            >
                @csrf

                <button
                    type="submit"
                    class="btn-keluar"
                >
                    Keluar
                </button>
            </form>

        @else

            <a
                href="{{ route('transaksi.struk', ['id_parkir' => $t->id_parkir]) }}"
                class="btn-keluar"
            >
                Cetak Struk
            </a>

        @endif

    </div>
</td>
                        </tr>

                    @endforeach


                @else


                    <tr>

                        <td
                            colspan="11"
                            class="text-center py-4"
                        >
                            Belum ada transaksi.
                        </td>

                    </tr>


                @endif

            </tbody>

        </table>

    </div>


    {{-- =========================
         PAGINATION
    ========================== --}}

    @if ($data->hasPages())

        <div class="transaksi-pagination">

            {!! $data->links() !!}

        </div>

    @endif


</div>
<!-- Modal Foto Plat -->
<div class="modal fade" id="modalFotoPlat" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Foto Plat Nomor Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="gambarFotoPlat" src="" alt="Foto plat"
                     style="max-width:100%; max-height:70vh; object-fit:contain;">
            </div>
        </div>
    </div>
</div>
<script>
function bukaFotoPlat(tombol) {
    const modal = document.getElementById('modalFotoPlat');
    document.getElementById('gambarFotoPlat').src = tombol.dataset.foto;

    bootstrap.Modal.getOrCreateInstance(modal).show();
}
</script>

```
@endsection
```
