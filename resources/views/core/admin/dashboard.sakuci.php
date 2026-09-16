@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

    {{-- HEADER --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">

            <span class="badge rounded-pill badge-brand px-3 py-2 mb-3">
                DASHBOARD ADMIN
            </span>

            <h1 class="h4 mb-2">
                Halo, {{ $user->username }} !
            </h1>

            <p class="text-secondary mb-1">
                Selamat datang di Sistem Parkiran Alvira.
                Kelola sistem parkir dengan mudah dan terorganisir.
            </p>

            <p class="text-secondary small mb-0">
                Halaman ini hanya bisa diakses oleh role
                <code class="inline">admin</code>
                (middleware <code class="inline">admin</code>).
            </p>

        </div>
    </div>


    {{-- MENU UTAMA --}}
    <div class="mb-4">

        <h2 class="h5 fw-semibold mb-3">
            Menu Utama
        </h2>

        <div class="row g-4">

            {{-- DAFTAR TARIF --}}
            <div class="col-md-6">
                <a href="{{ route('tarif.index') }}"
                   class="card border-0 shadow-sm text-decoration-none h-100 dashboard-card">

                    <div class="card-body p-4">

                        <div class="dashboard-icon mb-3">
                            Rp
                        </div>

                        <h3 class="h6 fw-semibold mb-1">
                            Daftar Tarif
                        </h3>

                        <p class="text-secondary small mb-0">
                            Kelola tarif parkir berdasarkan jenis kendaraan.
                        </p>

                    </div>
                </a>
            </div>


            {{-- MEMBER --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 dashboard-card disabled">

                    <div class="card-body p-4">

                        <div class="dashboard-icon mb-3">
                            👤
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h3 class="h6 fw-semibold mb-0">
                                Member
                            </h3>

                            <span class="badge text-bg-secondary">
                                Soon
                            </span>
                        </div>

                        <p class="text-secondary small mb-0">
                            Kelola data member parkir.
                        </p>

                    </div>
                </div>
            </div>


            {{-- AREA PARKIR --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 dashboard-card disabled">

                    <div class="card-body p-4">

                        <div class="dashboard-icon mb-3">
                            🅿
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h3 class="h6 fw-semibold mb-0">
                                Area Parkir
                            </h3>

                            <span class="badge text-bg-secondary">
                                Soon
                            </span>
                        </div>

                        <p class="text-secondary small mb-0">
                            Kelola area dan tempat parkir.
                        </p>

                    </div>
                </div>
            </div>


            {{-- TRANSAKSI --}}
            <div class="col-md-6">
                <div class="card border-0 shadow-sm h-100 dashboard-card disabled">

                    <div class="card-body p-4">

                        <div class="dashboard-icon mb-3">
                            ▤
                        </div>

                        <div class="d-flex align-items-center gap-2 mb-1">
                            <h3 class="h6 fw-semibold mb-0">
                                Transaksi
                            </h3>

                            <span class="badge text-bg-secondary">
                                Soon
                            </span>
                        </div>

                        <p class="text-secondary small mb-0">
                            Kelola transaksi parkir kendaraan.
                        </p>

                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- SISTEM ADMIN --}}
    <div>

        <h2 class="h5 fw-semibold mb-3">
            Sistem Admin
        </h2>

        <div class="row g-4">

            {{-- MANAGE ROLE --}}
            <div class="col-md-6">
                <a href="{{ route('admin.roles.index') }}"
                   class="card border-0 shadow-sm text-decoration-none h-100 dashboard-card">

                    <div class="card-body p-4">

                        <h3 class="h6 fw-semibold mb-1">
                            Manage Role
                        </h3>

                        <p class="text-secondary small mb-0">
                            Tambah dan kelola role yang digunakan oleh user.
                        </p>

                    </div>
                </a>
            </div>


            {{-- MANAGE USER --}}
            <div class="col-md-6">
                <a href="{{ route('admin.users.index') }}"
                   class="card border-0 shadow-sm text-decoration-none h-100 dashboard-card">

                    <div class="card-body p-4">

                        <h3 class="h6 fw-semibold mb-1">
                            Manage User
                        </h3>

                        <p class="text-secondary small mb-0">
                            Tambah user baru dan tentukan role-nya.
                        </p>

                    </div>
                </a>
            </div>


            {{-- DOWNLOAD DATABASE --}}
            <div class="col-md-6">
                <a href="{{ route('admin.database.export') }}"
                   class="card border-0 shadow-sm text-decoration-none h-100 dashboard-card">

                    <div class="card-body p-4">

                        <h3 class="h6 fw-semibold mb-1">
                            Download Database
                        </h3>

                        <p class="text-secondary small mb-0">
                            Unduh seluruh isi database dalam bentuk file SQL.
                        </p>

                    </div>
                </a>
            </div>

        </div>

    </div>

@endsection