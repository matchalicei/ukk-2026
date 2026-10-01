@extends('layouts.app')

@section('title', 'Cetak Struk')

@section('content')

<style>
    .struk-page {
        min-height: 80vh;
        display: flex;
        justify-content: center;
        align-items: flex-start;
        padding: 40px 20px 60px;
    }

    .struk-wrapper {
        width: 100%;
        max-width: 430px;
    }

    .struk-paper {
        background: white;
        color: #252525;

        padding: 30px 28px;

        border: 2px solid #252525;
        border-radius: 8px;

        box-shadow: 6px 6px 0 #252525;
    }

    [data-bs-theme="dark"] .struk-paper {
        background: #252525;
        color: white;

        border-color: white;
        box-shadow: 6px 6px 0 #D62828;
    }

    .struk-header {
        text-align: center;

        padding-bottom: 18px;
        margin-bottom: 18px;

        border-bottom: 2px dashed #999;
    }

    .struk-title {
        margin: 0;

        font-size: 24px;
        font-weight: 1000;
        letter-spacing: 1px;
    }

    .struk-subtitle {
        margin: 5px 0 0;

        color: #D62828;

        font-size: 12px;
        font-weight: 900;
        letter-spacing: 2px;
    }

    .struk-section {
        margin-bottom: 18px;
    }

    .struk-row {
        display: flex;
        justify-content: space-between;
        gap: 15px;

        padding: 7px 0;

        font-size: 13px;
    }

    .struk-label {
        color: #777;
        font-weight: 600;
    }

    .struk-value {
        font-weight: 800;
        text-align: right;
    }

    [data-bs-theme="dark"] .struk-label {
        color: #aaa;
    }

    .struk-total {
        display: flex;
        justify-content: space-between;
        align-items: center;

        padding: 15px 0;
        margin-top: 8px;

        border-top: 2px dashed #999;
        border-bottom: 2px dashed #999;
    }

    .struk-total-label {
        font-size: 15px;
        font-weight: 1000;
    }

    .struk-total-value {
        color: #D62828;

        font-size: 20px;
        font-weight: 1000;
    }

    .struk-footer {
        margin-top: 20px;

        text-align: center;

        font-size: 11px;
        color: #777;
    }

    [data-bs-theme="dark"] .struk-footer {
        color: #aaa;
    }

    .struk-actions {
        display: flex;
        justify-content: center;
        gap: 10px;

        margin-top: 25px;
    }

    .btn-struk {
        display: inline-flex;
        align-items: center;
        justify-content: center;

        min-width: 110px;
        height: 40px;

        padding: 0 15px;

        border-radius: 8px;

        font-size: 13px;
        font-weight: 900;

        text-decoration: none;

        cursor: pointer;
    }

    .btn-print {
        background: #D62828;
        color: white;

        border: 2px solid #252525;
    }

    .btn-print:hover {
        background: #b91c1c;
        color: white;
    }

    .btn-back {
        background: white;
        color: #252525;

        border: 2px solid #252525;
    }

    .btn-back:hover {
        background: #f2f2f2;
        color: #252525;
    }

    [data-bs-theme="dark"] .btn-back {
        background: #252525;
        color: white;
        border-color: white;
    }

    @media print {

        body {
            background: white !important;
        }

        .struk-page {
            min-height: auto;
            padding: 0;
        }

        .struk-paper {
            width: 100%;
            max-width: 430px;

            border: none;
            box-shadow: none;

            margin: 0 auto;
        }

        .struk-actions {
            display: none !important;
        }
    }
</style>


<div class="struk-page">

    <div class="struk-wrapper">

        <div class="struk-paper">

            {{-- HEADER --}}

            <div class="struk-header">

                <h1 class="struk-title">
                    PARKIRAN ALVIRA
                </h1>

                <p class="struk-subtitle">
                    STRUK PARKIR
                </p>

            </div>


            {{-- DATA TRANSAKSI --}}

            <div class="struk-section">

                <div class="struk-row">
                    <span class="struk-label">
                        No. Karcis
                    </span>

                    <span class="struk-value">
                        {{ $data->nomor_karcis }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Pemilik
                    </span>

                    <span class="struk-value">
                        {{ $data->username }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Plat Nomor
                    </span>

                    <span class="struk-value">
                        {{ $data->plat_nomor }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Kendaraan
                    </span>

                    <span class="struk-value">
                        {{ $data->jenis_kendaraan }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Area
                    </span>

                    <span class="struk-value">
                        {{ $data->nama_area }}
                    </span>
                </div>

            </div>


            {{-- WAKTU PARKIR --}}

            <div class="struk-section">

                <div class="struk-row">
                    <span class="struk-label">
                        Waktu Masuk
                    </span>

                    <span class="struk-value">
                        {{ $data->waktu_masuk }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Waktu Keluar
                    </span>

                    <span class="struk-value">
                        {{ $data->waktu_keluar }}
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Durasi
                    </span>

                    <span class="struk-value">
                        {{ $data->durasi_jam }} jam
                    </span>
                </div>


                <div class="struk-row">
                    <span class="struk-label">
                        Tarif
                    </span>

                    <span class="struk-value">
                        Rp {{ number_format($data->tarif_per_jam, 0, ',', '.') }}/jam
                    </span>
                </div>

            </div>


            {{-- TOTAL --}}

            <div class="struk-total">

                <span class="struk-total-label">
                    TOTAL
                </span>

                <span class="struk-total-value">
                    Rp {{ number_format($data->biaya_total, 0, ',', '.') }}
                </span>

            </div>


            {{-- FOOTER --}}

            <div class="struk-footer">

                Terima kasih telah menggunakan
                <strong>Parkiran Alvira</strong>.

            </div>

        </div>


        {{-- BUTTON --}}

        <div class="struk-actions">

            <a
                href="{{ route('transaksi.index') }}"
                class="btn-struk btn-back"
            >
                Kembali
            </a>

            <button
                type="button"
                class="btn-struk btn-print"
                onclick="window.print()"
            >
                🖨 Cetak
            </button>

        </div>

    </div>

</div>

@endsection