```blade
@extends('layouts.app')

@section('title', config('app.name') . ' -- Edit Area Parkir')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    .area-edit-page {
        position: relative;
        width: 100%;
        padding-top: 30px;
        padding-bottom: 65px;
    }

    /* =========================
       CHECKER
    ========================= */

    .area-edit-checker {
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

    .area-edit-card {
        position: relative;

        width: 100%;
        max-width: 800px;

        margin: 0 auto;

        overflow: hidden;

        padding: 34px 40px 55px;

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

    [data-bs-theme="dark"] .area-edit-card {
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

    .area-edit-content {
        position: relative;

        z-index: 5;

        width: 100%;
    }

    .area-edit-badge {
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

    .area-edit-title {
        margin-bottom: 8px;

        color: var(--racing-black);

        font-size: 32px;

        font-weight: 1000;

        letter-spacing: -1px;
    }

    .area-edit-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .area-edit-title {
        color: white;
    }

    .area-edit-description {
        margin-bottom: 27px;

        color: #666;

        font-size: 14.5px;

        line-height: 1.6;

        max-width: 600px;
    }

    [data-bs-theme="dark"] .area-edit-description {
        color: #bbb;
    }

    /* =========================
       FORM
    ========================= */

    .area-edit-form {
        width: 100%;

        position: relative;

        z-index: 6;
    }

    .area-edit-label {
        display: block;

        margin-bottom: 7px;

        color: var(--racing-black);

        font-size: 14px;

        font-weight: 800;
    }

    [data-bs-theme="dark"] .area-edit-label {
        color: white;
    }

    .area-edit-input {
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

    .area-edit-input:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .area-edit-input {
        background: #252525;

        color: white;

        border-color: #555;
    }

    [data-bs-theme="dark"] .area-edit-input:focus {
        border-color: var(--racing-red);

        box-shadow:
            0 0 0 3px rgba(214, 40, 40, .2);
    }

    /* =========================
       BUTTON
    ========================= */

    .area-edit-actions {
        display: flex;

        gap: 12px;

        margin-top: 25px;
    }

    .area-edit-btn,
    .area-edit-back {
        padding: 9px 18px;

        border-radius: 10px;

        font-size: 14px;

        font-weight: 800;

        text-decoration: none;
    }

    .area-edit-btn {
        background: var(--racing-red);

        color: white;

        border: 2px solid var(--racing-black);

        box-shadow:
            3px 3px 0 var(--racing-black);
    }

    .area-edit-btn:hover {
        background: #b91c1c;

        color: white;

        transform: translateY(-1px);
    }

    .area-edit-back {
        background: white;

        color: var(--racing-black);

        border: 2px solid var(--racing-black);

        box-shadow:
            3px 3px 0 var(--racing-black);
    }

    .area-edit-back:hover {
        background: var(--racing-yellow);

        color: var(--racing-black);
    }

    [data-bs-theme="dark"] .area-edit-back {
        background: #252525;

        color: white;

        border-color: white;

        box-shadow:
            3px 3px 0 var(--racing-red);
    }

    [data-bs-theme="dark"] .area-edit-back:hover {
        background: var(--racing-yellow);

        color: var(--racing-black);

        border-color: var(--racing-black);
    }

    /* =========================
       MCQUEEN
    ========================= */

    .area-edit-hero {
        position: absolute;

        z-index: 3;

        right: 15px;
        top: -75px;

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

        .area-edit-page {
            padding-top: 30px;
            padding-bottom: 50px;
        }

        .area-edit-card {
            padding: 28px 20px 30px;

            box-shadow:
                5px 5px 0 var(--racing-black);
        }

        .area-edit-title {
            font-size: 27px;
        }

        .area-edit-description {
            max-width: 100%;
        }

        .area-edit-hero {
            position: relative;

            display: block;

            width: 220px;

            margin: 10px auto -20px;

            right: auto;
            top: auto;

            transform: rotate(-3deg);
        }

        .area-edit-actions {
            flex-direction: column;
        }

        .area-edit-btn,
        .area-edit-back {
            width: 100%;

            text-align: center;
        }
    }
</style>

<div class="area-edit-page">

    <div class="area-edit-checker"></div>

    <div class="area-edit-card">

        <div class="area-edit-content">

            <div class="area-edit-badge">
                🏁 PARKING GARAGE
            </div>

            <div class="area-edit-title">
                Edit <span>Area Parkir</span>
            </div>

            <p class="area-edit-description">
                Perbarui nama area, kapasitas, dan jumlah kendaraan
                yang sedang terisi.
            </p>

            <form
                action="{{ route('area-parkir.update', ['id_area' => $data->id_area]) }}"
                method="POST"
                class="area-edit-form"
            >
                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label
                        for="nama_area"
                        class="area-edit-label"
                    >
                        Nama Area
                    </label>

                    <input
                        type="text"
                        name="nama_area"
                        id="nama_area"
                        class="area-edit-input"
                        value="{{ $data->nama_area }}"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label
                        for="kapasitas"
                        class="area-edit-label"
                    >
                        Kapasitas
                    </label>

                    <input
                        type="number"
                        name="kapasitas"
                        id="kapasitas"
                        class="area-edit-input"
                        value="{{ $data->kapasitas }}"
                        min="0"
                        required
                    >

                </div>

                <div class="mb-3">

                    <label
                        for="terisi"
                        class="area-edit-label"
                    >
                        Terisi
                    </label>

                    <input
                        type="number"
                        name="terisi"
                        id="terisi"
                        class="area-edit-input"
                        value="{{ $data->terisi }}"
                        min="0"
                        required
                    >

                </div>

                <div class="area-edit-actions">

                    <button
                        type="submit"
                        class="area-edit-btn"
                    >
                        Update
                    </button>

                    <a
                        href="{{ route('area-parkir.index') }}"
                        class="area-edit-back"
                    >
                        Batal
                    </a>

                </div>

            </form>

        </div>

        <img
            src="{{ asset('assets/images/racing/mcqueenpacar.png') }}"
            alt="McQueen"
            class="area-edit-hero"
        >

    </div>

</div>

@endsection
```
