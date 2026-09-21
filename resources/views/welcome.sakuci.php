@extends('layouts.app')

@section('title', 'Parkiran Alvira')

@section('content')

<div class="welcome-page">

<section class="text-center py-5">

    <div class="container py-lg-5">

        <span class="badge rounded-pill badge-brand px-3 py-2 mb-4">
            Parkiran
        </span>

        <h1 class="display-4 fw-bold mb-3">
            Selamat Datang Di
            <span class="text-brand">Sistem Parkiran Alvira!</span>
        </h1>

        <p class="lead text-secondary mx-auto mb-4"
           style="max-width: 650px;">
            Kelola tarif, member, area parkir, dan transaksi
            dalam satu sistem yang praktis dan terorganisir.
        </p>

        <div class="d-flex justify-content-center gap-2">

            <a href="{{ route('login') }}"
               class="btn btn-brand btn-lg px-4">
                Masuk ke Sistem
            </a>

            <a href="{{ route('register') }}"
               class="btn btn-outline-brand btn-lg px-4">
                Daftar
            </a>

        </div>

    </div>

</section>


<section class="container pb-5">

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">💰</div>

                    <h2 class="h5 fw-semibold">
                        Tarif Transparan
                    </h2>

                    <p class="text-secondary small mb-0">
                        Kelola dan tampilkan tarif kendaraan
                        dengan mudah.
                    </p>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">🚗</div>

                    <h2 class="h5 fw-semibold">
                        Parkir Teratur
                    </h2>

                    <p class="text-secondary small mb-0">
                        Atur area parkir dan data kendaraan
                        dengan lebih terorganisir.
                    </p>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4 text-center">

                    <div class="fs-1 mb-3">📋</div>

                    <h2 class="h5 fw-semibold">
                        Transaksi Tercatat
                    </h2>

                    <p class="text-secondary small mb-0">
                        Catat aktivitas parkir dalam satu
                        sistem yang terintegrasi.
                    </p>

                </div>
            </div>
        </div>

    </div>
</div>
</section>

@endsection