@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    /* =========================
       PAGE
    ========================= */

    .transaksi-create-page {
        width: 100%;
        padding: 0 0 65px;
    }


    /* =========================
       CHECKER / FLAG
    ========================= */

    .transaksi-create-checker {
        width: 100%;
        height: 42px;

        margin: 0 0 28px;

        background-color: #ffffff;

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
            21px 21px;

        background-size: 42px 42px;

        border: none;
        border-radius: 0;

        box-shadow: none;
    }


    /* =========================
       CARD
    ========================= */

    .transaksi-create-card {
        width: 100%;
        max-width: 800px;

        margin: 0 auto;

        background: #ffffff;

        border: 2px solid var(--racing-black);
        border-radius: 18px;

        box-shadow: 7px 7px 0 var(--racing-black);

        overflow: hidden;
    }

    [data-bs-theme="dark"] .transaksi-create-card {
        background: #242424;

        border-color: #ffffff;

        box-shadow: 7px 7px 0 var(--racing-red);
    }


    /* =========================
       CONTENT
    ========================= */

    .transaksi-create-content {
        display: block;

        width: 100%;
        box-sizing: border-box;

        padding: 38px 42px 42px;
    }


    /* =========================
       BADGE
    ========================= */

    .transaksi-create-badge {
        display: inline-block;

        padding: 7px 15px;
        margin-bottom: 13px;

        background: var(--racing-red);
        color: #ffffff;

        border: 2px solid var(--racing-black);
        border-radius: 999px;

        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;

        box-shadow: 3px 3px 0 var(--racing-black);
    }


    /* =========================
       TITLE
    ========================= */

    .transaksi-create-title {
        display: block;

        width: 100%;

        margin: 0 0 8px;

        color: var(--racing-black);

        font-size: 30px;
        font-weight: 1000;

        letter-spacing: -1px;
        line-height: 1.2;
    }

    .transaksi-create-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .transaksi-create-title {
        color: #ffffff;
    }


    /* =========================
       DESCRIPTION
    ========================= */

    .transaksi-create-description {
        display: block;

        width: 100%;

        margin: 0 0 28px;

        color: #666666;

        font-size: 14px;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .transaksi-create-description {
        color: #bbbbbb;
    }


    /* =========================
       INFO
    ========================= */

    .transaksi-info {
        display: block;

        width: 100%;
        box-sizing: border-box;

        padding: 13px 15px;
        margin-bottom: 26px;

        background: #fff8d6;
        color: #252525;

        border: 1px solid #f0d76a;
        border-left: 4px solid var(--racing-yellow);

        border-radius: 9px;

        font-size: 13px;
        line-height: 1.5;
    }

    [data-bs-theme="dark"] .transaksi-info {
        background: #332f1c;
        color: #eeeeee;

        border-color: #665d30;
        border-left-color: var(--racing-yellow);
    }


    /* =========================
       FORM
    ========================= */

    .transaksi-form {
        display: block;

        width: 100%;
        max-width: none;

        margin: 0;
        padding: 0;
    }

    .transaksi-form .mb-3 {
        display: block;

        width: 100%;
        max-width: none;

        margin-bottom: 21px !important;
    }


    /* =========================
       LABEL
    ========================= */

    .transaksi-label {
        display: block;

        width: 100%;

        margin-bottom: 7px;

        color: var(--racing-black);

        font-size: 14px;
        font-weight: 800;
    }

    [data-bs-theme="dark"] .transaksi-label {
        color: #ffffff;
    }


    /* =========================
       SELECT
    ========================= */

    .transaksi-select,
    #id_member,
    #id_tarif,
    #id_area,
    #id_user {
        display: block;

        width: 100% !important;
        max-width: none !important;

        height: 47px;

        padding: 0 14px;

        box-sizing: border-box;

        background: #ffffff;
        color: var(--racing-black);

        border: 2px solid var(--racing-black);
        border-radius: 10px;

        font-size: 15px;

        outline: none;

        transition:
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .transaksi-select:focus,
    #id_member:focus,
    #id_tarif:focus,
    #id_area:focus,
    #id_user:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .transaksi-select,
    [data-bs-theme="dark"] #id_member,
    [data-bs-theme="dark"] #id_tarif,
    [data-bs-theme="dark"] #id_area,
    [data-bs-theme="dark"] #id_user {
        background: #252525;

        color: #ffffff;

        border-color: #666666;
    }

    [data-bs-theme="dark"] .transaksi-select:focus,
    [data-bs-theme="dark"] #id_member:focus,
    [data-bs-theme="dark"] #id_tarif:focus,
    [data-bs-theme="dark"] #id_area:focus,
    [data-bs-theme="dark"] #id_user:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .2);
    }


    /* =========================
       ERROR
    ========================= */

    .invalid-feedback {
        margin-top: 5px;

        font-size: 12px;
    }


    /* =========================
       BUTTON AREA
    ========================= */

    .transaksi-actions {
        display: flex;

        align-items: center;
        justify-content: flex-end;

        gap: 10px;

        width: 100%;

        margin-top: 29px;
    }


    /* =========================
       BATAL
    ========================= */

    .btn-transaksi-cancel {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 100px;
        height: 44px;

        padding: 0 16px;

        background: #ffffff;
        color: var(--racing-black);

        border: 2px solid var(--racing-black);
        border-radius: 10px;

        font-size: 14px;
        font-weight: 800;

        text-decoration: none;

        transition: .2s ease;
    }

    .btn-transaksi-cancel:hover {
        background: #eeeeee;
        color: var(--racing-black);
    }

    [data-bs-theme="dark"] .btn-transaksi-cancel {
        background: #252525;
        color: #ffffff;

        border-color: #777777;
    }

    [data-bs-theme="dark"] .btn-transaksi-cancel:hover {
        background: #333333;
        color: #ffffff;
    }


    /* =========================
       SIMPAN
    ========================= */

    .btn-transaksi-save {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        min-width: 150px;
        height: 44px;

        padding: 0 18px;

        background: var(--racing-red);
        color: #ffffff;

        border: 2px solid var(--racing-black);
        border-radius: 10px;

        box-shadow: 3px 3px 0 var(--racing-black);

        font-size: 14px;
        font-weight: 900;

        cursor: pointer;

        transition: .2s ease;
    }

    .btn-transaksi-save:hover {
        background: #b91c1c;
        color: #ffffff;

        transform: translateY(-1px);
    }


    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 768px) {

        .transaksi-create-page {
            padding-bottom: 50px;
        }

        .transaksi-create-checker {
            height: 30px;

            margin-bottom: 20px;

            background-size: 30px 30px;

            background-position:
                0 0,
                15px 15px;
        }

        .transaksi-create-card {
            width: calc(100% - 24px);

            max-width: none;

            margin-left: 12px;
            margin-right: 12px;

            box-shadow: 5px 5px 0 var(--racing-black);
        }

        [data-bs-theme="dark"] .transaksi-create-card {
            box-shadow: 5px 5px 0 var(--racing-red);
        }

        .transaksi-create-content {
            padding: 28px 20px 30px;
        }

        .transaksi-create-title {
            font-size: 27px;
        }

        .transaksi-actions {
            flex-direction: column-reverse;

            align-items: stretch;
        }

        .btn-transaksi-cancel,
        .btn-transaksi-save {
            width: 100%;
        }
    }
</style>


<div class="transaksi-create-page">

    {{-- =====================================================
         FLAG / CHECKER
         FULL DARI UJUNG KIRI KE UJUNG KANAN HALAMAN
    ====================================================== --}}

    <div class="transaksi-create-checker"></div>


    {{-- =====================================================
         CARD FORM
         TETAP DI TENGAH
    ====================================================== --}}

    <div class="transaksi-create-card">

        <div class="transaksi-create-content">


            {{-- BADGE --}}

            <div class="transaksi-create-badge">
                TRANSAKSI BARU
            </div>


            {{-- TITLE --}}

            <h1 class="transaksi-create-title">
                Tambah Transaksi
                <span>Parkiran Alvira</span>
            </h1>


            {{-- DESCRIPTION --}}

            <p class="transaksi-create-description">
                Masukkan data kendaraan yang masuk ke area parkir.
                Nomor karcis dan waktu masuk akan dibuat otomatis oleh sistem.
            </p>


            {{-- INFO --}}

            <div class="transaksi-info">
                🏁 <strong>Info:</strong>
                Saat transaksi dibuat, status otomatis menjadi
                <strong>masuk</strong>, sedangkan durasi dan biaya awal
                bernilai 0.
            </div>


            {{-- =================================================
                 FORM
            ================================================== --}}

            <form
                method="POST"
                action="{{ route('transaksi.store') }}"
                class="transaksi-form"
            >

                @csrf


                {{-- MEMBER --}}

                <div class="mb-3">

                    <label
                        for="id_member"
                        class="transaksi-label"
                    >
                        Member
                    </label>

                    <select
                        name="id_member"
                        id="id_member"
                        class="transaksi-select"
                        required
                    >

                        <option value="">
                            -- Pilih Member --
                        </option>

                        @foreach ($members as $member)

                            <option
                                value="{{ $member->id_member }}"
                                {{ old('id_member') == $member->id_member ? 'selected' : '' }}
                            >
                               {{ $member->user ? $member->user->username : '-' }}
                                -
                                {{ $member->plat_nomor }}
                                -
                                {{ $member->jenis_kendaraan }}

                            </option>

                        @endforeach

                    </select>

                    @error('id_member')

                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- TARIF PARKIR --}}

                <div class="mb-3">

                    <label
                        for="id_tarif"
                        class="transaksi-label"
                    >
                        Tarif Parkir
                    </label>

                    <select
                        name="id_tarif"
                        id="id_tarif"
                        class="transaksi-select"
                        required
                    >

                        <option value="">
                            -- Pilih Tarif --
                        </option>

                        @foreach ($tarif as $t)

                            <option
                                value="{{ $t->id_tarif }}"
                                {{ old('id_tarif') == $t->id_tarif ? 'selected' : '' }}
                            >
                                {{ $t->jenis_kendaraan }}
                                -
                                Rp {{ number_format($t->tarif_per_jam, 0, ',', '.') }}/jam
                            </option>

                        @endforeach

                    </select>

                    @error('id_tarif')

                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- AREA PARKIR --}}

                <div class="mb-3">

                    <label
                        for="id_area"
                        class="transaksi-label"
                    >
                        Area Parkir
                    </label>

                    <select
                        name="id_area"
                        id="id_area"
                        class="transaksi-select"
                        required
                    >

                        <option value="">
                            -- Pilih Area Parkir --
                        </option>

                        @foreach ($areas as $area)

                            @if ($area->terisi >= $area->kapasitas)

                                <option
                                    value="{{ $area->id_area }}"
                                    disabled
                                >
                                    {{ $area->nama_area }}
                                    — {{ $area->terisi }}/{{ $area->kapasitas }} kendaraan (PENUH)
                                </option>

                            @else

                                <option
                                    value="{{ $area->id_area }}"
                                    {{ old('id_area') == $area->id_area ? 'selected' : '' }}
                                >
                                    {{ $area->nama_area }}
                                    — {{ $area->terisi }}/{{ $area->kapasitas }} kendaraan
                                </option>

                            @endif

                        @endforeach

                    </select>

                    @error('id_area')

                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- PETUGAS --}}

                <div class="mb-3">

                    <label
                        for="id_user"
                        class="transaksi-label"
                    >
                        Petugas
                    </label>

                    <select
                        name="id_user"
                        id="id_user"
                        class="transaksi-select"
                        required
                    >

                        <option value="">
                            -- Pilih Petugas --
                        </option>

                        @foreach ($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('id_user') == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->username }}
                            </option>

                        @endforeach

                    </select>

                    @error('id_user')

                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- BUTTON --}}

                <div class="transaksi-actions">

                    <a
                        href="{{ route('transaksi.index') }}"
                        class="btn-transaksi-cancel"
                    >
                        Batal
                    </a>

                    <button
                        type="submit"
                        class="btn-transaksi-save"
                    >
                        🏁 Simpan Transaksi
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection