@extends('layouts.app')

@section('title', config('app.name') . ' -- Edit Member')

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

    .edit-member-page {
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

    [data-bs-theme="dark"] .edit-member-page {
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

    .edit-member-card {
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

    [data-bs-theme="dark"] .edit-member-card {
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

        background: var(--racing-red);
        color: white;

        border: 2px solid var(--racing-black);
        border-radius: 999px;

        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;

        box-shadow: 3px 3px 0 var(--racing-black);
    }

    [data-bs-theme="dark"] .edit-badge {
        border-color: white;
        box-shadow: 3px 3px 0 var(--racing-yellow);
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
       CALIFORNIA
    ========================= */

    .edit-california {
        position: absolute;
        right: 15px;
        bottom: -18px;

        width: 180px;

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

    /* SELECT */

    [data-bs-theme="dark"] select.racing-input option {
        background: #303030;
        color: white;
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

        .edit-member-page {
            padding-top: 40px;
        }

        .edit-member-card {
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

        .edit-california {
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


<div class="edit-member-page">

    <div class="edit-checker"></div>

    <div class="edit-member-card">

        {{-- HEADER --}}
        <div class="edit-header">

            {{-- CALIFORNIA --}}
            <img
                src="{{ asset('assets/images/racing/california.jpeg') }}"
                class="edit-california"
                alt="California"
            >

            <div class="edit-badge">
                🏁 MEMBER GARAGE
            </div>

            <h1 class="edit-title">
                Edit <span>Member</span>
            </h1>

            <p class="edit-description">
                Perbarui data member parkir berdasarkan
                identitas dan kendaraan yang digunakan.
            </p>

        </div>


        {{-- FORM --}}

        <h2 class="form-section-title">
            Informasi Member
        </h2>

        <form
            action="{{ route('member.update', ['id_member' => $member->id_member]) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- USER / PEMILIK --}}
            <div class="racing-form-group">

                <label
                    for="id_user"
                    class="racing-label"
                >
                    Pilih User / Pemilik
                </label>

                <select
                    name="id_user"
                    id="id_user"
                    class="racing-input"
                    required
                >

                    <option value="">
                        -- Pilih User --
                    </option>

                    @foreach($users as $user)

                        @php
                            $userId = $user->id ?? $user->id_user;
                        @endphp

                        <option
                            value="{{ $userId }}"
                            {{ $member->id_user == $userId ? 'selected' : '' }}
                        >
                            {{ $user->nama ?? $user->name ?? $user->username }}
                        </option>

                    @endforeach

                </select>

                <div class="input-help">
                    Pilih user yang menjadi pemilik kendaraan.
                </div>

            </div>


            {{-- PLAT NOMOR --}}
            <div class="racing-form-group">

                <label
                    for="plat_nomor"
                    class="racing-label"
                >
                    Plat Nomor
                </label>

                <input
                    type="text"
                    name="plat_nomor"
                    id="plat_nomor"
                    class="racing-input"
                    value="{{ $member->plat_nomor }}"
                    placeholder="Contoh: D 1234 ABC"
                    required
                >

                <div class="input-help">
                    Masukkan nomor plat kendaraan member.
                </div>

            </div>


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
                    value="{{ $member->jenis_kendaraan }}"
                    placeholder="Contoh: Motor, Mobil"
                    required
                >

                <div class="input-help">
                    Masukkan jenis kendaraan yang digunakan.
                </div>

            </div>


            {{-- WARNA --}}
            <div class="racing-form-group">

                <label
                    for="warna"
                    class="racing-label"
                >
                    Warna Kendaraan
                </label>

                <input
                    type="text"
                    name="warna"
                    id="warna"
                    class="racing-input"
                    value="{{ $member->warna }}"
                    placeholder="Contoh: Merah, Hitam, Putih"
                    required
                >

                <div class="input-help">
                    Masukkan warna kendaraan member.
                </div>

            </div>


            {{-- BUTTON --}}
            <div class="form-actions">

                <button
                    type="submit"
                    class="btn btn-update"
                >
                    Update Member
                </button>

                <a
                    href="{{ route('member.index') }}"
                    class="btn-back"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection