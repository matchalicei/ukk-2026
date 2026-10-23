```php
@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')

<style>
    :root {
        --racing-red: #D62828;
        --racing-yellow: #FFC400;
        --racing-black: #252525;
    }

    .transaksi-create-page {
        width: 100%;
        padding-bottom: 65px;
    }

    .transaksi-create-checker {
        width: 100%;
        height: 42px;
        margin-bottom: 28px;
        background-color: #fff;
        background-image:
            linear-gradient(45deg, #252525 25%, transparent 25%, transparent 75%, #252525 75%),
            linear-gradient(45deg, #252525 25%, transparent 25%, transparent 75%, #252525 75%);
        background-position: 0 0, 21px 21px;
        background-size: 42px 42px;
    }

    .transaksi-create-card {
        width: calc(100% - 30px);
        max-width: 800px;
        margin: 0 auto;
        background: #fff;
        border: 2px solid var(--racing-black);
        border-radius: 18px;
        box-shadow: 7px 7px 0 var(--racing-black);
        overflow: visible;
    }

    [data-bs-theme="dark"] .transaksi-create-card {
        background: #242424;
        border-color: #fff;
        box-shadow: 7px 7px 0 var(--racing-red);
    }

    .transaksi-create-content {
        padding: 38px 42px 42px;
    }

    .transaksi-create-badge {
        display: inline-block;
        padding: 7px 15px;
        margin-bottom: 13px;
        background: var(--racing-red);
        color: #fff;
        border: 2px solid var(--racing-black);
        border-radius: 999px;
        font-size: 10px;
        font-weight: 900;
        letter-spacing: 2px;
        box-shadow: 3px 3px 0 var(--racing-black);
    }

    .transaksi-create-title {
        margin: 0 0 8px;
        color: var(--racing-black);
        font-size: 30px;
        font-weight: 1000;
        letter-spacing: -1px;
        line-height: 1.3;
    }

    .transaksi-create-title span {
        color: var(--racing-red);
    }

    [data-bs-theme="dark"] .transaksi-create-title {
        color: #fff;
    }

    .transaksi-create-description {
        margin-bottom: 28px;
        color: #666;
        font-size: 14px;
        line-height: 1.6;
    }

    [data-bs-theme="dark"] .transaksi-create-description {
        color: #bbb;
    }

    .transaksi-info {
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
        color: #eee;
        border-color: #665d30;
        border-left-color: var(--racing-yellow);
    }

    .transaksi-form {
        width: 100%;
        margin: 0;
        padding: 0;
    }

    .transaksi-form .mb-3 {
        width: 100%;
        margin-bottom: 21px !important;
    }

    .transaksi-label {
        display: block;
        margin-bottom: 7px;
        color: var(--racing-black);
        font-size: 14px;
        font-weight: 800;
    }

    [data-bs-theme="dark"] .transaksi-label {
        color: #fff;
    }

    .transaksi-select,
    .transaksi-form select,
    .transaksi-form input[type="text"],
    .transaksi-form input[type="file"] {
        display: block;
        width: 100%;
        min-width: 0;
        min-height: 47px;
        padding: 10px 14px;
        box-sizing: border-box;
        background: #fff;
        color: var(--racing-black);
        border: 2px solid var(--racing-black);
        border-radius: 10px;
        font-family: inherit;
        font-size: 14px;
        outline: none;
    }

    .transaksi-select:focus,
    .transaksi-form select:focus,
    .transaksi-form input:focus {
        border-color: var(--racing-red);
        box-shadow: 0 0 0 3px rgba(214, 40, 40, .15);
    }

    [data-bs-theme="dark"] .transaksi-select,
    [data-bs-theme="dark"] .transaksi-form select,
    [data-bs-theme="dark"] .transaksi-form input[type="text"],
    [data-bs-theme="dark"] .transaksi-form input[type="file"] {
        background: #252525;
        color: #fff;
        border-color: #777;
    }

    .transaksi-form input[type="file"] {
        cursor: pointer;
    }

    .transaksi-form input[type="file"]::file-selector-button {
        padding: 7px 12px;
        margin-right: 10px;
        background: #eee;
        color: #252525;
        border: 1px solid #252525;
        border-radius: 6px;
        font-family: inherit;
        cursor: pointer;
    }

    [data-bs-theme="dark"] .transaksi-form input[type="file"]::file-selector-button {
        background: #3a3a3a;
        color: #fff;
        border-color: #aaa;
    }

    /* CUSTOM MEMBER DROPDOWN */

    .member-dropdown {
        position: relative;
        width: 100%;
    }

    .member-trigger {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        text-align: left;
        cursor: pointer;
    }

    .member-trigger:focus-visible {
        outline: 2px solid var(--racing-red);
        outline-offset: 2px;
    }

    .member-trigger-text {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .member-menu {
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        right: 0;
        z-index: 1050;
        background: #fff;
        border: 2px solid #252525;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 6px 18px rgba(0, 0, 0, .18);
    }

    .member-menu[hidden] {
        display: none !important;
    }

    .member-search-wrap {
        padding: 9px;
        background: #fff;
        border-bottom: 1px solid #ddd;
    }

    .member-search-wrap input {
        width: 100%;
        min-height: 42px;
        box-sizing: border-box;
    }

    .member-options {
        max-height: 220px;
        overflow-y: auto;
    }

    .member-option {
        display: block;
        width: 100%;
        padding: 12px;
        background: #fff;
        color: #252525;
        border: 0;
        border-bottom: 1px solid #eee;
        text-align: left;
        font-family: inherit;
        font-size: 14px;
        overflow-wrap: anywhere;
        cursor: pointer;
    }

    .member-option:last-child {
        border-bottom: 0;
    }

    .member-option:hover,
    .member-option:focus-visible {
        background: #fff0f0;
        outline: none;
    }

    .member-option[hidden] {
        display: none !important;
    }

    .member-empty {
        padding: 12px;
        color: #777;
        font-size: 13px;
    }

    .member-empty[hidden] {
        display: none !important;
    }

    [data-bs-theme="dark"] .member-menu,
    [data-bs-theme="dark"] .member-search-wrap {
        background: #252525;
        border-color: #666;
    }

    [data-bs-theme="dark"] .member-option {
        background: #252525;
        color: #fff;
        border-bottom-color: #444;
    }

    [data-bs-theme="dark"] .member-option:hover,
    [data-bs-theme="dark"] .member-option:focus-visible {
        background: #493030;
    }

    [data-bs-theme="dark"] .member-empty {
        color: #bbb;
    }

    /* BUTTONS */

    .transaksi-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 29px;
    }

    .btn-transaksi-cancel,
    .btn-transaksi-save {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-height: 44px;
        padding: 0 18px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 800;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .btn-transaksi-cancel {
        background: #fff;
        color: #252525;
        border: 2px solid #252525;
    }

    .btn-transaksi-cancel:hover {
        background: #eee;
        color: #252525;
    }

    .btn-transaksi-save {
        background: var(--racing-red);
        color: #fff;
        border: 2px solid var(--racing-black);
        box-shadow: 3px 3px 0 var(--racing-black);
    }

    .btn-transaksi-save:hover {
        background: #b91c1c;
        color: #fff;
        transform: translateY(-1px);
    }

    [data-bs-theme="dark"] .btn-transaksi-cancel {
        background: #252525;
        color: #fff;
        border-color: #777;
    }

    [data-bs-theme="dark"] .btn-transaksi-cancel:hover {
        background: #333;
        color: #fff;
    }

    @media (max-width: 768px) {
        .transaksi-create-page {
            padding-bottom: 45px;
        }

        .transaksi-create-checker {
            height: 30px;
            margin-bottom: 20px;
            background-size: 30px 30px;
            background-position: 0 0, 15px 15px;
        }

        .transaksi-create-card {
            width: calc(100% - 24px);
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

    <div class="transaksi-create-checker"></div>

    <div class="transaksi-create-card">
        <div class="transaksi-create-content">

            <div class="transaksi-create-badge">
                TRANSAKSI BARU
            </div>

            <h1 class="transaksi-create-title">
                Tambah Transaksi
                <span>Parkiran Alvira</span>
            </h1>

            <p class="transaksi-create-description">
                Masukkan data kendaraan yang masuk ke area parkir.
                Pastikan semua informasi sudah benar sebelum menyimpan.
            </p>

            <div class="transaksi-info">
                🏁 <strong>Info:</strong>
                Pilih member, tarif parkir, area parkir, dan petugas
                sebelum menyimpan transaksi.
            </div>

            <form
                method="POST"
                action="{{ route('transaksi.store') }}"
                class="transaksi-form"
                enctype="multipart/form-data"
            >
                @csrf

                {{-- MEMBER --}}
                <div class="mb-3">
                    <label class="transaksi-label" for="memberTrigger">
                        Member
                    </label>

                    <div class="member-dropdown" id="memberDropdown">

                        <button
                            type="button"
                            class="transaksi-select member-trigger"
                            id="memberTrigger"
                            aria-expanded="false"
                            aria-controls="memberMenu"
                        >
                            <span
                                class="member-trigger-text"
                                id="memberSelectedText"
                            >-- Pilih Member --</span>

                            <span aria-hidden="true">▾</span>
                        </button>

                        <div
                            class="member-menu"
                            id="memberMenu"
                            hidden
                        >
                            <div class="member-search-wrap">
                                <input
                                    type="text"
                                    id="memberSearch"
                                    placeholder="Cari plat nomor atau username..."
                                    autocomplete="off"
                                    aria-label="Cari member"
                                >
                            </div>

                            <div
                                class="member-options"
                                id="memberOptions"
                            >
                                @foreach ($members as $member)
                                    <button
                                        type="button"
                                        class="member-option"
                                        data-value="{{ $member->id_member }}"
                                        data-search="{{ strtolower($member->plat_nomor . ' ' . ($member->user ? $member->user->username : '-') . ' ' . $member->jenis_kendaraan) }}"
                                    >
                                        {{ $member->user ? $member->user->username : '-' }}
                                        - {{ $member->plat_nomor }}
                                        - {{ $member->jenis_kendaraan }}
                                    </button>
                                @endforeach
                            </div>

                            <div
                                class="member-empty"
                                id="memberEmpty"
                                hidden
                            >
                                Member tidak ditemukan.
                            </div>
                        </div>
                    </div>

                    <input
                        type="hidden"
                        name="id_member"
                        id="id_member"
                        value="{{ old('id_member') }}"
                        required
                    >

                    @error('id_member')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- TARIF PARKIR --}}
                <div class="mb-3">
                    <label for="id_tarif" class="transaksi-label">
                        Tarif Parkir
                    </label>

                    <select
                        name="id_tarif"
                        id="id_tarif"
                        class="transaksi-select"
                        required
                    >
                        <option value="">-- Pilih Tarif --</option>

                        @foreach ($tarif as $t)
                            <option
                                value="{{ $t->id_tarif }}"
                                {{ old('id_tarif') == $t->id_tarif ? 'selected' : '' }}
                            >
                                {{ $t->jenis_kendaraan }}
                                - Rp {{ number_format($t->tarif_per_jam, 0, ',', '.') }}/jam
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
                    <label for="id_area" class="transaksi-label">
                        Area Parkir
                    </label>

                    <select
                        name="id_area"
                        id="id_area"
                        class="transaksi-select"
                        required
                    >
                        <option value="">-- Pilih Area Parkir --</option>

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
                    <label for="id_user" class="transaksi-label">
                        Petugas
                    </label>

                    <select
                        name="id_user"
                        id="id_user"
                        class="transaksi-select"
                        required
                    >
                        <option value="">-- Pilih Petugas --</option>

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

               {{-- FOTO PLAT NOMOR --}}
<div class="mb-3">
   <label class="form-label d-block fw-bold">Foto Plat Nomor Kendaraan</label>

    <!-- Input File Tersembunyi (Otomatis dipakai saat dibuka di HP) -->
    <input type="file" name="foto_plat" id="foto_plat" accept="image/*" capture="environment" style="display:none;" onchange="previewFotoHP(this)">

    <!-- SATU Tombol Utama -->
    <button type="button" id="btn-utama" class="btn btn-danger" onclick="mulaiKamera()">
         Ambil Foto Plat Nomor
    </button>

    <!-- Area Layar Kamera (Hanya muncul di Laptop saat tombol diklik) -->
    <div id="box-kamera" style="display:none;" class="mt-2 text-center">
        <video id="webcam" autoplay playsinline style="width: 100%; max-width: 320px; border-radius: 8px; border: 2px solid #555;"></video>
        <br>
        <button type="button" class="btn btn-sm btn-danger mt-2" onclick="jepretLaptop()"> Ambil Foto</button>
    </div>

    <!-- Preview Hasil Foto -->
    <div id="box-preview" style="display:none;" class="mt-2 text-center">
        <img id="img-preview" style="max-width: 250px;" class="img-thumbnail mb-2 d-block mx-auto">
        <button type="button" class="btn btn-sm btn-warning" onclick="resetKamera()">  Foto Ulang</button>
    </div>

    <!-- Hidden Input untuk foto webcam laptop -->
    <input type="hidden" name="foto_base64" id="foto_base64">
</div>

<script>
let video = document.getElementById('webcam');
let streamKamera = null;

function isMobile() {
    return /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
}

function mulaiKamera() {
    if (isMobile()) {
        // Di HP: Buka Kamera Bawaan HP
        document.getElementById('foto_plat').click();
    } else {
        // Di Laptop: Langsung Nyalakan Webcam di Layar
        document.getElementById('btn-utama').style.display = 'none';
        document.getElementById('box-kamera').style.display = 'block';

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(s => {
                streamKamera = s;
                video.srcObject = s;
            })
            .catch(err => alert("Kamera laptop tidak diizinkan / tidak ditemukan!"));
    }
}

// Handler Preview jika dari HP
function previewFotoHP(input) {
    if (input.files && input.files[0]) {
        let reader = new FileReader();
        reader.onload = e => {
            document.getElementById('img-preview').src = e.target.result;
            document.getElementById('btn-utama').style.display = 'none';
            document.getElementById('box-preview').style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Handler Jepret jika dari Laptop
function jepretLaptop() {
    let canvas = document.createElement('canvas');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    let dataUrl = canvas.toDataURL('image/jpeg');
    document.getElementById('foto_base64').value = dataUrl;
    document.getElementById('img-preview').src = dataUrl;

    document.getElementById('box-kamera').style.display = 'none';
    document.getElementById('box-preview').style.display = 'block';

    if (streamKamera) {
        streamKamera.getTracks().forEach(t => t.stop());
    }
}

function resetKamera() {
    document.getElementById('foto_plat').value = '';
    document.getElementById('foto_base64').value = '';
    document.getElementById('box-preview').style.display = 'none';
    document.getElementById('box-kamera').style.display = 'none';
    document.getElementById('btn-utama').style.display = 'inline-block';
}
</script>
                {{-- TOMBOL --}}
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const dropdown = document.getElementById('memberDropdown');
    const trigger = document.getElementById('memberTrigger');
    const menu = document.getElementById('memberMenu');
    const search = document.getElementById('memberSearch');
    const hiddenInput = document.getElementById('id_member');
    const selectedText = document.getElementById('memberSelectedText');
    const empty = document.getElementById('memberEmpty');

    if (!dropdown || !trigger || !menu || !search || !hiddenInput) {
        return;
    }

    const options = Array.from(
        dropdown.querySelectorAll('.member-option')
    );

    function filterMembers() {
        const keyword = search.value.toLowerCase().trim();
        let visibleCount = 0;

        options.forEach(function (option) {
            const searchableText = option.dataset.search || '';
            const matches = searchableText.includes(keyword);

            option.hidden = !matches;

            if (matches) {
                visibleCount++;
            }
        });

        empty.hidden = visibleCount > 0;
    }

    function openDropdown() {
        menu.hidden = false;
        trigger.setAttribute('aria-expanded', 'true');

        search.value = '';
        filterMembers();

        search.focus();
    }

    function closeDropdown() {
        menu.hidden = true;
        trigger.setAttribute('aria-expanded', 'false');
    }

    function selectMember(option) {
        hiddenInput.value = option.dataset.value;
        selectedText.textContent = option.textContent.trim();

        closeDropdown();
        trigger.focus();
    }

    trigger.addEventListener('click', function () {
        if (menu.hidden) {
            openDropdown();
        } else {
            closeDropdown();
        }
    });

    search.addEventListener('input', filterMembers);

    options.forEach(function (option) {
        option.addEventListener('click', function () {
            selectMember(this);
        });
    });

    document.addEventListener('click', function (event) {
        if (!dropdown.contains(event.target)) {
            closeDropdown();
        }
    });

    trigger.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeDropdown();
        }

        if (event.key === 'ArrowDown' && menu.hidden) {
            event.preventDefault();
            openDropdown();
        }
    });

    search.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closeDropdown();
            trigger.focus();
        }
    });

    // Pertahankan pilihan lama jika validasi form gagal.
    const oldValue = hiddenInput.value;

    if (oldValue) {
        const oldOption = options.find(function (option) {
            return option.dataset.value === oldValue;
        });

        if (oldOption) {
            selectedText.textContent = oldOption.textContent.trim();
        }
    }
});
</script>

@endsection
```