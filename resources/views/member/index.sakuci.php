@extends('layouts.app')

@section('title', config('app.name') . ' -- Daftar Member')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
        --racing-white: #F8F8F6;
    }

    /* =========================
       PAGE
    ========================= */

    .member-page {
        position: relative;
        min-height: calc(100vh - 57px);
        overflow: hidden;
        padding: 40px 0 70px;

        background:
            radial-gradient(
                circle at 90% 10%,
                rgba(214, 40, 40, .08),
                transparent 30%
            ),
            linear-gradient(
                180deg,
                #fffafa 0%,
                #f8f8f6 100%
            );
    }

    [data-bs-theme="dark"] .member-page {
        background:
            radial-gradient(
                circle at 90% 10%,
                rgba(255, 196, 0, .08),
                transparent 30%
            ),
            #171717;
    }

    .member-container {
        position: relative;
        z-index: 5;
    }

    /* =========================
       CHECKER
    ========================= */

    .member-checker {
        position: absolute;
        top: 0;
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
    }

    /* =========================
       HEADER
    ========================= */

    .member-header {
        position: relative;

        min-height: 210px;

        overflow: hidden;

        padding: 32px 38px;

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

    [data-bs-theme="dark"] .member-header {
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

    .member-header-content {
        position: relative;

        z-index: 6;

        max-width: 560px;
    }

    .member-badge {
        display: inline-block;

        padding: 7px 15px;

        margin-bottom: 14px;

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

    .member-title {
        display: flex;

        align-items: center;

        gap: 9px;

        margin-bottom: 8px;

        color: var(--racing-black);

        font-size: 32px;

        font-weight: 1000;

        letter-spacing: -1px;
    }

    .member-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .member-title {
        color: white;
    }

    /* =========================
       CALIFORNIA MCQUEEN
    ========================= */

    .california-member {
        width: 48px;

        height: auto;

        object-fit: contain;

        flex-shrink: 0;

        filter:
            drop-shadow(
                0 3px 3px rgba(0, 0, 0, .18)
            );

        transform: translateY(2px);
    }

    .member-description {
        max-width: 500px;

        margin: 0;

        color: #666;

        line-height: 1.6;
    }

    [data-bs-theme="dark"] .member-description {
        color: #c7c7c7;
    }

    /* =========================
       MCQUEEN TENGIL
    ========================= */

    .mcqueen-member {
        position: absolute;

        right: 35px;

        bottom: -18px;

        width: 235px;

        z-index: 5;

        transform: translateY(8px);

        filter:
            drop-shadow(
                0 12px 7px rgba(0, 0, 0, .18)
            );
    }

    /* =========================
       ACTION BAR
    ========================= */

    .member-action {
        display: flex;

        align-items: center;

        justify-content: space-between;

        gap: 15px;

        margin-bottom: 18px;
    }

    .member-section-title {
        display: flex;

        align-items: center;

        gap: 9px;

        margin: 0;

        color: var(--racing-black);

        font-size: 21px;

        font-weight: 1000;
    }

    [data-bs-theme="dark"] .member-section-title {
        color: white;
    }

    /* =========================
       BUTTON TAMBAH
    ========================= */

    .btn-racing {
        padding: 9px 17px;

        background: var(--racing-red);

        color: white;

        border: 2px solid var(--racing-black);

        border-radius: 9px;

        font-size: 13px;

        font-weight: 800;

        box-shadow:
            3px 3px 0 var(--racing-black);

        transition: .2s ease;
    }

    .btn-racing:hover {
        background: var(--racing-yellow);

        color: var(--racing-black);

        transform:
            translate(-2px, -2px);

        box-shadow:
            5px 5px 0 var(--racing-black);
    }

    /* =========================
       TABLE
    ========================= */

    .member-table-wrapper {
        overflow: hidden;

        background: white;

        border: 2px solid var(--racing-black);

        border-radius: 15px;

        box-shadow:
            6px 6px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .member-table-wrapper {
        background: #242424;

        border-color: white;

        box-shadow:
            6px 6px 0 var(--racing-red);
    }

    .member-table {
        margin: 0 !important;

        vertical-align: middle;
    }

    .member-table thead th {
        padding: 14px 16px;

        background: var(--racing-red) !important;

        color: white !important;

        border-color: var(--racing-black) !important;

        font-size: 12px;

        font-weight: 900;

        letter-spacing: .8px;

        text-transform: uppercase;
    }

    .member-table tbody td {
        padding: 15px 16px;

        color: var(--racing-black);

        border-color: #dedede;

        font-size: 14px;

        vertical-align: middle;
    }

    [data-bs-theme="dark"] .member-table tbody td {
        color: white;

        border-color: #444;

        background: #242424;
    }

    .member-table tbody tr {
        transition: .15s ease;
    }

    .member-table tbody tr:hover td {
        background: #fff4f4 !important;
    }

    [data-bs-theme="dark"] .member-table tbody tr:hover td {
        background: #321d1d !important;
    }

    /* =========================
       NUMBER
    ========================= */

    .member-number {
        font-weight: 900;

        color: var(--racing-red);
    }

    /* =========================
       MEMBER NAME
    ========================= */

    .member-name {
        font-weight: 800;

        color: var(--racing-black);
    }

    [data-bs-theme="dark"] .member-name {
        color: white;
    }

    /* =========================
       VEHICLE BADGE
    ========================= */

    .vehicle-badge {
        display: inline-block;

        padding: 5px 10px;

        background: #fff0f0;

        color: var(--racing-red);

        border: 1px solid var(--racing-red);

        border-radius: 7px;

        font-size: 12px;

        font-weight: 800;
    }

    [data-bs-theme="dark"] .vehicle-badge {
        background: #401818;
    }

    /* =========================
       PLAT NOMOR
    ========================= */

    .plate-badge {
        display: inline-block;

        padding: 5px 10px;

        background: var(--racing-black);

        color: white;

        border-radius: 6px;

        font-size: 12px;

        font-weight: 800;

        letter-spacing: .5px;
    }

    [data-bs-theme="dark"] .plate-badge {
        background: #555;
    }

    /* =========================
       ACTION BUTTON
    ========================= */

    .btn-edit {
        background: var(--racing-yellow);

        color: var(--racing-black);

        border: 2px solid var(--racing-black);

        font-weight: 800;

        box-shadow:
            2px 2px 0 var(--racing-black);
    }

    .btn-edit:hover {
        background: #ffd633;

        color: var(--racing-black);

        transform:
            translateY(-2px);
    }

    .btn-delete {
        background: var(--racing-red);

        color: white;

        border: 2px solid var(--racing-black);

        font-weight: 800;

        box-shadow:
            2px 2px 0 var(--racing-black);
    }

    .btn-delete:hover {
        background: #a91f1f;

        color: white;

        transform:
            translateY(-2px);
    }

    /* =========================
       PAGINATION
    ========================= */

    .member-pagination {
        margin-top: 25px;
    }

    .member-pagination nav {
        display: flex;

        justify-content: center;
    }

    .member-pagination .pagination {
        gap: 5px;
    }

    .member-pagination .page-link {
        color: var(--racing-red);

        background: white;

        border: 2px solid var(--racing-black);

        font-weight: 800;

        border-radius: 7px;

        box-shadow:
            2px 2px 0 var(--racing-black);

        transition: .2s ease;
    }

    .member-pagination .page-link:hover {
        color: var(--racing-black);

        background: var(--racing-yellow);

        border-color: var(--racing-black);

        transform:
            translateY(-2px);
    }

    .member-pagination .page-item.active .page-link {
        color: white;

        background: var(--racing-red);

        border-color: var(--racing-black);

        box-shadow:
            2px 2px 0 var(--racing-black);
    }

    .member-pagination .page-item.disabled .page-link {
        color: #999;

        background: #eeeeee;

        border-color: #cccccc;

        box-shadow: none;
    }

    [data-bs-theme="dark"] .member-pagination .page-link {
        color: var(--racing-yellow);

        background: #242424;

        border-color: white;
    }

    [data-bs-theme="dark"] .member-pagination .page-item.active .page-link {
        color: white;

        background: var(--racing-red);

        border-color: white;
    }

    [data-bs-theme="dark"] .member-pagination .page-item.disabled .page-link {
        color: #666;

        background: #303030;

        border-color: #444;
    }

    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 768px) {

        .member-page {
            padding-top: 40px;
        }

        .member-header {
            min-height: 300px;

            padding: 28px 25px;
        }

        .member-title {
            font-size: 28px;
        }

        .member-header-content {
            max-width: 100%;
        }

        .mcqueen-member {
            width: 175px;

            right: 5px;

            bottom: -8px;

            transform: translateY(5px);
        }

        .california-member {
            width: 40px;
        }

        .member-action {
            align-items: flex-start;

            flex-direction: column;
        }

        .member-table-wrapper {
            overflow-x: auto;
        }

        .member-table {
            min-width: 850px;
        }
    }
</style>


<div class="member-page">

    <div class="member-checker"></div>

    <div class="container member-container">

        {{-- HEADER --}}

        <div class="member-header">

            {{-- MCQUEEN TENGIL --}}

            <img
                src="{{ asset('assets/images/racing/mcqueentengil.png') }}"
                class="mcqueen-member"
                alt="McQueen"
            >

            <div class="member-header-content">

                <div class="member-badge">
                    👀 MEMBER GARAGE
                </div>

                <h1 class="member-title">

                    Daftar <span>Member</span>

                    <img
                        src="{{ asset('assets/images/racing/california.jpeg') }}"
                        class="california-member"
                        alt=""
                    >

                </h1>

                <p class="member-description">
                    Kelola data member parkir berdasarkan
                    identitas dan kendaraan dengan mudah
                    dan terorganisir.
                </p>

            </div>

        </div>


        {{-- ACTION --}}

        <div class="member-action">

            <h2 class="member-section-title">
                Daftar Member Parkir
            </h2>

            <a
                href="{{ route('member.create') }}"
                class="btn btn-racing"
            >
                + Tambah Member
            </a>

        </div>


        {{-- TABLE --}}

        <div class="member-table-wrapper">

            <table class="table table-hover member-table">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Member</th>

                        <th>Plat Nomor</th>

                        <th>Jenis Kendaraan</th>

                        <th>Warna</th>

                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @php
                        $no = 1;
                    @endphp

                    @foreach($data as $m)

                    <tr>

                        <td class="member-number">
                            {{ $no++ }}
                        </td>

                        <td class="member-name">
                            {{ $m->user->nama ?? $m->user->username ?? 'User #' . $m->id_user }}
                        </td>

                        <td>
                            <span class="plate-badge">
                                {{ $m->plat_nomor }}
                            </span>
                        </td>

                        <td>
                            <span class="vehicle-badge">
                                {{ $m->jenis_kendaraan }}
                            </span>
                        </td>

                        <td>
                            {{ $m->warna }}
                        </td>

                        <td>

                            <a
                                href="{{ route('member.edit', ['id' => $m->id_member]) }}"
                                class="btn btn-sm btn-edit"
                            >
                                Edit
                            </a>

                            <form
                                action="{{ route('member.destroy', ['id' => $m->id_member]) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('apakah benar akan dihapus?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-sm btn-delete"
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

        <div class="member-pagination">

            {!! $data->links() !!}

        </div>

    </div>

</div>

@endsection