@extends('layouts.app')

@section('title', config('app.name') . ' -- Edit Tarif')

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

    .edit-tarif-page {
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
        transition: background .35s ease;
    }

    /* =========================
       DARK MODE
    ========================= */

    [data-bs-theme="dark"] .edit-tarif-page {
        background:
            radial-gradient(
                circle at 85% 8%,
                rgba(255, 196, 0, .10),
                transparent 30%
            ),
            linear-gradient(
                180deg,
                #171717 0%,
                #241717 55%,
                #301818 100%
            );
    }

    /* =========================
       CHECKER
    ========================= */

    .edit-checker {
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
       MAIN CARD
    ========================= */

    .edit-tarif-card {
        position: relative;
        overflow: hidden;
        max-width: 850px;
        margin: 15px auto 0;
        padding: 38px;
        background: white;
        border: 2px solid var(--racing-black);
        border-radius: 18px;
        box-shadow: 7px 7px 0 var(--racing-black);
        transition:
            background .35s ease,
            border-color .35s ease,
            box-shadow .35s ease;
    }

    [data-bs-theme="dark"] .edit-tarif-card {
        background:
            linear-gradient(
                135deg,
                #242424 0%,
                #242424 62%,
                #3b1818 100%
            );
        border-color: #ffffff;
        box-shadow: 7px 7px 0 var(--racing-red);
    }

    /* =========================
       HEADER
    ========================= */

    .edit-header {
        position: relative;
        min-height: 155px;
        margin-bottom: 35px;
        padding-right: 260px;
    }

    .edit-badge {
        display: inline-block;
        padding: 7px 15px;
        margin-bottom: 14px;
        background: var(--racing-yellow);
        color: var(--racing-black);
        border: 2px solid var(--racing-black);
        border-radius: 999px;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;
        box-shadow: 3px 3px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .edit-badge {
        border-color: white;
        box-shadow: 3px 3px 0 var(--racing-red);
    }

    .edit-title {
        margin-bottom: 8px;
        color: var(--racing-black);
        font-size: 32px;
        font-weight: 1000;
        letter-spacing: -1px;
        transition: color .35s ease;
    }

    .edit-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .edit-title {
        color: white;
    }

    .edit-description {
        margin: 0;
        color: #666;
        line-height: 1.6;
        transition: color .35s ease;
    }

    [data-bs-theme="dark"] .edit-description {
        color: #d0d0d0;
    }

    /* =========================
       MCQUEEN
    ========================= */

    .edit-mcqueen {
        position: absolute;
        right: 15px;
        bottom: -18px;
        width: 220px;
        transform: rotate(-3deg);
        filter: drop-shadow(
            0 12px 7px rgba(0, 0, 0, .18)
        );
        z-index: 3;
    }

    /* =========================
       FORM TITLE
    ========================= */

    .form-section-title {
        margin-bottom: 20px;
        color: var(--racing-black);
        font-size: 20px;
        font-weight: 1000;
        transition: color .35s ease;
    }

    [data-bs-theme="dark"] .form-section-title {
        color: white;
    }

    /* =========================
       FORM
    ========================= */

    .racing-form-group {
        margin-bottom: 22px;
    }

    .racing-label {
        display: block;
        margin-bottom: 8px;
        color: var(--racing-black);
        font-size: 14px;
        font-weight: 800;
        transition: color .35s ease;
    }

    [data-bs-theme="dark"] .racing-label {
        color: #ffffff;
    }

    .racing-input {
        width: 100%;
        padding: 12px 14px;
        background: white;
        color: var(--racing-black);
        border: 2px solid #cfcfcf;
        border-radius: 9px;
        outline: none;
        transition:
            background .25s ease,
            color .25s ease,
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .racing-input:focus {
        border-color: var(--racing-red);
        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .12);
    }

    /* DARK INPUT */

    [data-bs-theme="dark"] .racing-input {
        background: #303030;
        color: white;
        border-color: #555555;
    }

    [data-bs-theme="dark"] .racing-input:focus {
        background: #303030;
        color: white;
        border-color: var(--racing-yellow);
        box-shadow:
            0 0 0 3px rgba(255, 196, 0, .12);
    }

    [data-bs-theme="dark"] .racing-input::placeholder {
        color: #999999;
    }

    .input-help {
        margin-top: 6px;
        color: #888;
        font-size: 12px;
    }

    [data-bs-theme="dark"] .input-help {
        color: #aaaaaa;
    }

    /* =========================
       BUTTONS
    ========================= */

    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 30px;
    }

    .btn-update {
        padding: 10px 22px;
        background: var(--racing-red);
        color: white;
        border: 2px solid var(--racing-black);
        border-radius: 9px;
        font-weight: 800;
        box-shadow: 3px 3px 0 var(--racing-black);
        transition: .2s ease;
    }

    .btn-update:hover {
        background: var(--racing-yellow);
        color: var(--racing-black);
        transform: translate(-2px, -2px);
        box-shadow: 5px 5px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .btn-update {
        border-color: white;
        box-shadow: 3px 3px 0 var(--racing-yellow);
    }

    [data-bs-theme="dark"] .btn-update:hover {
        background: var(--racing-yellow);
        color: var(--racing-black);
        box-shadow: 5px 5px 0 white;
    }

    .btn-back {
        padding: 10px 22px;
        background: transparent;
        color: var(--racing-black);
        border: 2px solid var(--racing-black);
        border-radius: 9px;
        font-weight: 800;
        text-decoration: none;
        transition: .2s ease;
    }

    .btn-back:hover {
        background: var(--racing-black);
        color: white;
    }

    [data-bs-theme="dark"] .btn-back {
        color: white;
        border-color: white;
    }

    [data-bs-theme="dark"] .btn-back:hover {
        background: white;
        color: #171717;
    }

    /* =========================
       MOBILE
    ========================= */

    @media (max-width: 768px) {

        .edit-tarif-page {
            padding-top: 40px;
        }

        .edit-tarif-card {
            margin: 15px 15px 0;
            padding: 28px 24px;
        }

        .edit-header {
            min-height: 270px;
            padding-right: 0;
        }

        .edit-title {
            font-size: 28px;
        }

        .edit-mcqueen {
            width: 175px;
            right: 0;
            bottom: -8px;
        }

        .form-actions {
            flex-direction: column;
            align-items: stretch;
        }

        .btn-update,
        .btn-back {
            width: 100%;
            text-align: center;
        }
    }
</style>


<div class="edit-tarif-page">

    <div class="edit-checker"></div>

    <div class="edit-tarif-card">

        {{-- HEADER --}}
        <div class="edit-header">

            {{-- MCQUEEN 95 --}}
            <img
                src="{{ asset('assets/images/racing/95mcqueen.png') }}"
                class="edit-mcqueen"
                alt="McQueen"
            >

            <div class="edit-badge">
                🏁 PARKING RATE
            </div>

            <h1 class="edit-title">
                Edit <span>Tarif</span>
            </h1>

            <p class="edit-description">
                Perbarui informasi tarif parkir berdasarkan
                jenis kendaraan dan tarif per jam.
            </p>

        </div>


        {{-- FORM --}}

        <h2 class="form-section-title">
            Informasi Tarif Parkir
        </h2>

        <form
            action="{{ route('tarif.update', ['id_tarif' => $tarif->id_tarif]) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            {{-- JENIS KENDARAAN --}}
            <div class="racing-form-group">

                <label
                    for="jenis_kendaraan"
                    class="racing-label"
                >
                    Jenis Kendaraan
                </label>

                <input
                    type="text"
                    name="jenis_kendaraan"
                    id="jenis_kendaraan"
                    class="racing-input"
                    value="{{ $tarif->jenis_kendaraan }}"
                    placeholder="Contoh: Motor, Mobil, Bus"
                    required
                >

                <div class="input-help">
                    Perbarui jenis kendaraan yang akan dikenakan tarif.
                </div>

            </div>


            {{-- TARIF PER JAM --}}
            <div class="racing-form-group">

                <label
                    for="tarif_per_jam"
                    class="racing-label"
                >
                    Tarif Per Jam
                </label>

                <input
                    type="number"
                    name="tarif_per_jam"
                    id="tarif_per_jam"
                    class="racing-input"
                    value="{{ $tarif->tarif_per_jam }}"
                    placeholder="Masukkan tarif per jam"
                    min="0"
                    required
                >

                <div class="input-help">
                    Perbarui nominal tarif dalam Rupiah.
                </div>

            </div>


            {{-- BUTTON --}}
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-update"
                >
                    Update Tarif
                </button>

                <a
                    href="{{ route('tarif.index') }}"
                    class="btn-back"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection