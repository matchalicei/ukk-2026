```blade
@extends('layouts.app')

@section('title', config('app.name') . ' -- Tambah Area Parkir')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    .area-create-page {
        position: relative;
        width: 100%;
        padding-top: 30px;
        padding-bottom: 65px;
    }

    /* =========================
       CHECKER
    ========================= */

    .area-create-checker {
        position: absolute;
        top: -20px;
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

    .area-create-card {
        position: relative;

        width: 100%;
        max-width: 800px;

        margin: 0 auto;

        overflow: hidden;

        padding: 34px 40px 60px;

        background:
            linear-gradient(
                115deg,
                #ffffff 0%,
                #ffffff 58%,
                #fde1e1 100%
            );

        border: 2px solid var(--racing-black);

        border-radius: 18px;

        box-shadow:
            8px 8px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .area-create-card {
        background:
            linear-gradient(
                115deg,
                #242424 0%,
                #242424 58%,
                #401818 100%
            );

        border-color: white;

        box-shadow:
            8px 8px 0 var(--racing-red);
    }

    /* =========================
       CONTENT
    ========================= */

    .area-create-content {
        position: relative;

        z-index: 5;

        width: 100%;
    }

    .area-create-badge {
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

    .area-create-title {
        margin-bottom: 8px;

        color: var(--racing-black);

        font-size: 32px;

        font-weight: 1000;

        letter-spacing: -1px;
    }

    .area-create-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .area-create-title {
        color: white;
    }

    .area-create-description {
        margin-bottom: 27px;

        color: #666;

        font-size: 14.5px;

        line-height: 1.6;

        max-width: 600px;
    }

    [data-bs-theme="dark"] .area-create-description {
        color: #bbb;
    }

    /* =========================
       FORM
    ========================= */

    .area-create-form {
        width: 100%;
        position: relative;
        z-index: 6;
    }

    .area-create-label {
        display: block;

        margin-bottom: 7px;

        color: var(--racing-black);

        font-size: 14px;

        font-weight: 800;
    }

    [data-bs-theme="dark"] .area-create-label {
        color: white;
    }

    .area-create-input {
        display: block;

        width: 100%;

        height: 46px;

        padding: 0 15px;

        background: white;

        color: var(--racing-black);

        border: 2px solid var(--racing-black);

        border-radius: 10px;

        font-size: 15px;

        outline: none;
    }

    .area-create-input:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .area-create-input {
        background: #252525;

        color: white;

        border-color: #555;
    }

    [data-bs-theme="dark"] .area-create-input:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .2);
    }

    .area-create-input::placeholder {
        color: #888;
    }

    [data-bs-theme="dark"] .area-create-input::placeholder {
        color: #aaa;
    }

    /* =========================
       BUTTON
    ========================= */

    .area-create-actions {
        display: flex;

        gap: 12px;

        margin-top: 25px;
    }

    .area-create-btn,
    .area-create-back {
        padding: 9px 18px;

        border-radius: 10px;

        font-size: 14px;

        font-weight: 800;

        text-decoration: none;
    }

    .area-create-btn {
        background: var(--racing-red);

        color: white;

        border: 2px solid var(--racing-black);

        box-shadow:
            3px 3px 0 var(--racing-black);
    }

    .area-create-btn:hover {
        background: #b91c1c;

        color: white;

        transform: translateY(-1px);
    }

    .area-create-back {
        background: white;

        color: var(--racing-black);

        border: 2px solid var(--racing-black);

        box-shadow:
            3px 3px 0 var(--racing-black);
    }

    .area-create-back:hover {
        background: var(--racing-yellow);

        color: var(--racing-black);
    }

    [data-bs-theme="dark"] .area-create-back {
        background: #252525;

        color: white;

        border-color: white;

        box-shadow:
            3px 3px 0 var(--racing-red);
    }

    [data-bs-theme="dark"] .area-create-back:hover {
        background: var(--racing-yellow);

        color: var(--racing-black);

        border-color: var(--racing-black);
    }

    /* =========================
       MCQUEEN
    ========================= */

    .area-create-hero {
        position: absolute;

        z-index: 3;

        right: 15px;
        top: -85px;

        width: 300px;

        object-fit: contain;

        transform: rotate(-3deg);

        filter:
            drop-shadow(
                7px 8px 0 rgba(0, 0, 0, .18)
            );

        pointer-events: none;
    }

    /* =========================
       RESPONSIVE
    ========================= */

    @media (max-width: 768px) {

        .area-create-page {
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .area-create-card {
            padding: 28px 20px 30px;

            box-shadow:
                5px 5px 0 var(--racing-black);
        }

        .area-create-title {
            font-size: 27px;
        }

        .area-create-description {
            max-width: 100%;
        }

        .area-create-hero {
            position: relative;

            display: block;

            width: 220px;

            margin: 10px auto -20px;

            right: auto;
            top: auto;

            transform: rotate(-3deg);
        }

        .area-create-actions {
            flex-direction: column;
        }

        .area-create-btn,
        .area-create-back {
            width: 100%;

            text-align: center;
        }
    }
</style>

<div class="area-create-page">

    <div class="area-create-checker"></div>

    <div class="area-create-card">

        <div class="area-create-content">

            <div class="area-create-badge">
                🏁 PARKING GARAGE
            </div>

            <div class="area-create-title">
                Tambah <span>Area Parkir</span>
            </div>

            <p class="area-create-description">
                Tambahkan area parkir baru beserta kapasitas dan jumlah
                kendaraan yang sedang terisi.
            </p>

            <form
                action="{{ route('area-parkir.store') }}"
                method="POST"
                class="area-create-form"
            >
                @csrf

                <div class="mb-3">

                    <label
                        for="nama_area"
                        class="area-create-label"
                    >
                        Nama Area
                    </label>

                    <input
                        type="text"
                        name="nama_area"
                        id="nama_area"
                        class="area-create-input"
                        placeholder="Masukkan nama area"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label
                        for="kapasitas"
                        class="area-create-label"
                    >
                        Kapasitas
                    </label>

                    <input
                        type="number"
                        name="kapasitas"
                        id="kapasitas"
                        class="area-create-input"
                        placeholder="Masukkan kapasitas"
                        min="0"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label
                        for="terisi"
                        class="area-create-label"
                    >
                        Terisi
                    </label>

                    <input
                        type="number"
                        name="terisi"
                        id="terisi"
                        class="area-create-input"
                        placeholder="Masukkan jumlah kendaraan"
                        min="0"
                        required
                    >

                </div>

                <div class="area-create-actions">

                    <button
                        type="submit"
                        class="area-create-btn"
                    >
                        Simpan
                    </button>

                    <a
                        href="{{ route('area-parkir.index') }}"
                        class="area-create-back"
                    >
                        Kembali
                    </a>

                </div>

            </form>

        </div>

        <img
            src="{{ asset('assets/images/racing/mcqueenpacar.png') }}"
            alt="McQueen"
            class="area-create-hero"
        >

    </div>

</div>

@endsection
```
