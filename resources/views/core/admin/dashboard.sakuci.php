@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
        --racing-white: #F8F8F6;
    }

    .dashboard-page {
        position: relative;
        min-height: calc(100vh - 57px);
        overflow: hidden;
        padding: 45px 0 70px;
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

    [data-bs-theme="dark"] .dashboard-page {
        background:
            radial-gradient(
                circle at 90% 10%,
                rgba(255, 196, 0, .08),
                transparent 30%
            ),
            transparent;
    }

    .dashboard-container {
        position: relative;
        z-index: 5;
    }

    /* CHECKER DECORATION */

    .dashboard-checker {
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
        z-index: 2;
    }

    /* HEADER */

    .dashboard-header {
        position: relative;
        min-height: 255px;
        overflow: hidden;
        padding: 42px 45px;
        margin-bottom: 48px;
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

    [data-bs-theme="dark"] .dashboard-header {
        background:
            linear-gradient(
                115deg,
                #242424 0%,
                #242424 55%,
                #401818 100%
            );
        border-color: #fff;
        box-shadow: 7px 7px 0 var(--racing-red);
    }

    .dashboard-header-content {
        position: relative;
        z-index: 5;
        max-width: 610px;
    }

    .dashboard-badge {
        display: inline-block;
        padding: 7px 16px;
        margin-bottom: 22px;
        background: var(--racing-red);
        color: white;
        border: 2px solid var(--racing-black);
        border-radius: 999px;
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 2px;
        box-shadow: 3px 3px 0 var(--racing-black);
    }

    .dashboard-title {
        margin-bottom: 12px;
        color: var(--racing-black);
        font-size: 34px;
        font-weight: 1000;
        letter-spacing: -1px;
    }

    .dashboard-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .dashboard-title {
        color: white;
    }

    .dashboard-description {
        max-width: 570px;
        margin-bottom: 10px;
        color: var(--racing-red);
        line-height: 1.7;
        font-weight: 600;
    }

    [data-bs-theme="dark"] .dashboard-description {
        color: #ff6b6b;
    }

    .dashboard-code {
        font-size: 12px;
    }

    /* MCQUEEN SENYUM */

    .mcqueen-smile {
        position: absolute;
        right: 25px;
        bottom: -8px;
        width: 245px;
        z-index: 4;
        filter: drop-shadow(0 12px 7px rgba(0, 0, 0, .18));
    }

    /* PLAT MCQUEEN */

    .mcqueen-plate {
        position: absolute;
        top: 48px;
        right: 225px;
        width: 125px;
        transform: rotate(5deg);
        z-index: 3;
        filter: drop-shadow(0 5px 3px rgba(0, 0, 0, .12));
    }

    /* SECTION */

    .dashboard-section {
        position: relative;
        margin-bottom: 42px;
    }

    .section-title {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 18px;
        color: var(--racing-black);
        font-size: 22px;
        font-weight: 1000;
    }

    .section-title::before {
        content: "";
        width: 7px;
        height: 27px;
        background: var(--racing-red);
        border-radius: 3px;
    }

    [data-bs-theme="dark"] .section-title {
        color: white;
    }

    /* DASHBOARD CARD */

    .dashboard-card {
        position: relative;
        min-height: 150px;
        overflow: hidden;
        background: white;
        border: 2px solid #dedede !important;
        border-radius: 14px;
        color: inherit;
        transition:
            transform .2s ease,
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .dashboard-card::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: var(--racing-red);
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        border-color: var(--racing-red) !important;
        box-shadow: 6px 6px 0 var(--racing-black) !important;
    }

    [data-bs-theme="dark"] .dashboard-card {
        background: #242424;
        border-color: #444 !important;
        color: white;
    }

    [data-bs-theme="dark"] .dashboard-card:hover {
        border-color: var(--racing-yellow) !important;
        box-shadow: 6px 6px 0 var(--racing-red) !important;
    }

    .dashboard-card-body {
        position: relative;
        z-index: 3;
        padding: 27px;
    }

    .dashboard-card-number {
        margin-bottom: 8px;
        color: var(--racing-red);
        font-size: 11px;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .dashboard-card h3 {
        color: var(--racing-black);
        font-size: 18px;
        font-weight: 900;
    }

    [data-bs-theme="dark"] .dashboard-card h3 {
        color: white;
    }

    .dashboard-card p {
        max-width: 470px;
        margin: 0;
        color: #666;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .dashboard-card p {
        color: #bdbdbd;
    }

    /* SOON */

    .soon-badge {
        display: inline-block;
        padding: 4px 9px;
        background: var(--racing-yellow);
        color: var(--racing-black);
        border-radius: 999px;
        font-size: 9px;
        font-weight: 900;
        letter-spacing: .7px;
    }

    /* ADMIN CARDS */

    .admin-card::before {
        background: var(--racing-yellow);
    }

    .admin-card:hover {
        border-color: var(--racing-yellow) !important;
    }

    /* MOBILE */

    @media (max-width: 768px) {

        .dashboard-page {
            padding-top: 40px;
        }

        .dashboard-header {
            min-height: 360px;
            padding: 32px 25px;
            margin-bottom: 40px;
        }

        .dashboard-title {
            font-size: 29px;
        }

        .dashboard-description {
            max-width: 100%;
        }

        .mcqueen-smile {
            right: 10px;
            bottom: -5px;
            width: 190px;
            opacity: .95;
        }

        .mcqueen-plate {
            right: 150px;
            top: 30px;
            width: 90px;
        }

        .dashboard-card {
            min-height: 140px;
        }
    }

    @media (max-width: 480px) {

        .dashboard-header {
            min-height: 380px;
            padding: 30px 20px;
        }

        .dashboard-title {
            font-size: 26px;
        }

        .mcqueen-smile {
            width: 165px;
        }

        .mcqueen-plate {
            width: 75px;
            right: 120px;
        }
    }
</style>

<div class="dashboard-page">

    <div class="dashboard-checker"></div>

    <div class="container dashboard-container">

        {{-- HEADER --}}

        <div class="dashboard-header">

            <img
                src="{{ asset('assets/images/racing/platmcqueen.png') }}"
                class="mcqueen-plate"
                alt=""
            >

            <img
                src="{{ asset('assets/images/racing/mcqueensenyum.png') }}"
                class="mcqueen-smile"
                alt="McQueen"
            >

            <div class="dashboard-header-content">

                <div class="dashboard-badge">
                    🏁 DASHBOARD ADMIN
                </div>

                <h1 class="dashboard-title">
                    Halo, <span>{{ $user->username }}</span>!
                </h1>

                <p class="dashboard-description">
                    Selamat datang di Sistem Parkiran Alvira.
                    Kelola sistem parkir dengan mudah dan terorganisir.
                </p>

                <p class="text-secondary small mb-0">
                    Halaman ini hanya bisa diakses oleh role
                    <code class="inline dashboard-code">admin</code>
                    (middleware <code class="inline dashboard-code">admin</code>).
                </p>

            </div>

        </div>


        {{-- MENU UTAMA --}}

        <div class="dashboard-section">

            <h2 class="section-title">
                Menu Utama
            </h2>

            <div class="row g-4">

                {{-- DAFTAR TARIF --}}

                <div class="col-md-6">

                    <a href="{{ route('tarif.index') }}"
                       class="card text-decoration-none h-100 dashboard-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                01 / TARIF
                            </div>

                            <h3 class="mb-1">
                                Daftar Tarif
                            </h3>

                            <p class="small">
                                Kelola tarif parkir berdasarkan jenis kendaraan.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- MEMBER --}}

                <div class="col-md-6">

                    <a href="{{ route('member.index') }}"
                       class="card text-decoration-none h-100 dashboard-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                02 / MEMBER
                            </div>

                            <h3 class="mb-1">
                                Member
                            </h3>

                            <p class="small">
                                Kelola data member parkir.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- AREA PARKIR --}}

                <div class="col-md-6">

                    <a href="{{ route('area-parkir.index') }}"
                       class="card text-decoration-none h-100 dashboard-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                03 / AREA
                            </div>

                            <h3 class="mb-1">
                                Area Parkir
                            </h3>

                            <p class="small">
                                Kelola area dan tempat parkir.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- TRANSAKSI --}}

                <div class="col-md-6">

                    <div class="card h-100 dashboard-card disabled">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                04 / TRANSAKSI
                            </div>

                            <div class="d-flex align-items-center gap-2 mb-1">

                                <h3 class="mb-0">
                                    Transaksi
                                </h3>

                                <span class="soon-badge">
                                    SOON
                                </span>

                            </div>

                            <p class="small">
                                Kelola transaksi parkir kendaraan.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- SISTEM ADMIN --}}

        <div class="dashboard-section">

            <h2 class="section-title">
                Sistem Admin
            </h2>

            <div class="row g-4">

                {{-- MANAGE ROLE --}}

                <div class="col-md-6">

                    <a href="{{ route('admin.roles.index') }}"
                       class="card text-decoration-none h-100 dashboard-card admin-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                01 / ROLE
                            </div>

                            <h3 class="mb-1">
                                Manage Role
                            </h3>

                            <p class="small">
                                Tambah dan kelola role yang digunakan oleh user.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- MANAGE USER --}}

                <div class="col-md-6">

                    <a href="{{ route('admin.users.index') }}"
                       class="card text-decoration-none h-100 dashboard-card admin-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                02 / USER
                            </div>

                            <h3 class="mb-1">
                                Manage User
                            </h3>

                            <p class="small">
                                Tambah user baru dan tentukan role-nya.
                            </p>

                        </div>

                    </a>

                </div>


                {{-- DOWNLOAD DATABASE --}}

                <div class="col-md-6">

                    <a href="{{ route('admin.database.export') }}"
                       class="card text-decoration-none h-100 dashboard-card admin-card">

                        <div class="dashboard-card-body">

                            <div class="dashboard-card-number">
                                03 / DATABASE
                            </div>

                            <h3 class="mb-1">
                                Download Database
                            </h3>

                            <p class="small">
                                Unduh seluruh isi database dalam bentuk file SQL.
                            </p>

                        </div>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection