@extends('layouts.app') 
 
@section('title', config('app.name') . ' -- Daftar Tarif') 
 
@section('content') 
 
<style> 
    :root { 
        --racing-red: #D62828; 
        --racing-yellow: #FFC400; 
        --racing-black: #252525; 
        --racing-white: #F8F8F6; 
    } 
 
    .tarif-page { 
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
    } 
 
    [data-bs-theme="dark"] .tarif-page { 
        background: 
            radial-gradient( 
                circle at 90% 10%, 
                rgba(255, 196, 0, .08), 
                transparent 30% 
            ), 
            #171717; 
    } 
 
    .tarif-container { 
        position: relative; 
        z-index: 5; 
    } 
 
    /* =========================
       CHECKER
    ========================= */ 
 
    .tarif-checker { 
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
       HEADER
    ========================= */ 
 
    .tarif-header { 
        position: relative; 
        min-height: 210px; 
        overflow: hidden; 
        padding: 32px 38px; 
        margin-bottom: 30px; 
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
 
    [data-bs-theme="dark"] .tarif-header { 
        background: 
            linear-gradient( 
                115deg, 
                #242424 0%, 
                #242424 55%, 
                #401818 100% 
            ); 
        border-color: white; 
        box-shadow: 7px 7px 0 var(--racing-red); 
    } 
 
    /* =========================
       HEADER CONTENT
    ========================= */ 
 
    .tarif-header-content { 
        position: relative; 
        z-index: 6; 
        max-width: 560px; 
    } 
 
    .tarif-badge { 
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
 
    .tarif-title { 
        margin-bottom: 8px; 
        color: var(--racing-black); 
        font-size: 32px; 
        font-weight: 1000; 
        letter-spacing: -1px; 
    } 
 
    .tarif-title span { 
        color: var(--racing-red); 
    } 
 
    [data-bs-theme="dark"] .tarif-title { 
        color: white; 
    } 
 
    .tarif-description { 
        max-width: 500px; 
        margin: 0; 
        color: #666; 
        line-height: 1.6; 
    } 
 
    [data-bs-theme="dark"] .tarif-description { 
        color: #c7c7c7; 
    } 
 
    /* =========================
       MCQUEEN
    ========================= */ 
 
    .mcqueen-tarif { 
        position: absolute; 
        right: 35px; 
        bottom: -18px; 
        width: 235px; 
        z-index: 5; 
        transform: rotate(-3deg); 
        filter: drop-shadow(0 12px 7px rgba(0, 0, 0, .18)); 
    } 
 
    /* =========================
       FLAG
    ========================= */ 
 
    .tarif-flag { 
        position: absolute; 
        right: 250px; 
        top: 25px; 
        width: 85px; 
        z-index: 4; 
        transform: rotate(10deg); 
        filter: drop-shadow(0 5px 4px rgba(0, 0, 0, .12)); 
    } 
 
    /* =========================
       ACTION BAR
    ========================= */ 
 
    .tarif-action { 
        display: flex; 
        align-items: center; 
        justify-content: space-between; 
        gap: 15px; 
        margin-bottom: 18px; 
    } 
 
    .tarif-section-title { 
        margin: 0; 
        color: var(--racing-black); 
        font-size: 21px; 
        font-weight: 1000; 
    } 
 
    [data-bs-theme="dark"] .tarif-section-title { 
        color: white; 
    } 
 
    .btn-racing { 
        padding: 9px 17px; 
        background: var(--racing-red); 
        color: white; 
        border: 2px solid var(--racing-black); 
        border-radius: 9px; 
        font-size: 13px; 
        font-weight: 800; 
        box-shadow: 3px 3px 0 var(--racing-black); 
        transition: .2s ease; 
    } 
 
    .btn-racing:hover { 
        background: var(--racing-yellow); 
        color: var(--racing-black); 
        transform: translate(-2px, -2px); 
        box-shadow: 5px 5px 0 var(--racing-black); 
    } 
 
    /* =========================
       TABLE
    ========================= */ 
 
    .tarif-table-wrapper { 
        overflow: hidden; 
        background: white; 
        border: 2px solid var(--racing-black); 
        border-radius: 15px; 
        box-shadow: 6px 6px 0 var(--racing-black); 
    } 
 
    [data-bs-theme="dark"] .tarif-table-wrapper { 
        background: #242424; 
        border-color: white; 
        box-shadow: 6px 6px 0 var(--racing-red); 
    } 
 
    .tarif-table { 
        margin: 0 !important; 
        vertical-align: middle; 
    } 
 
    .tarif-table thead th { 
        padding: 14px 16px; 
        background: var(--racing-red) !important; 
        color: white !important; 
        border-color: var(--racing-black) !important; 
        font-size: 12px; 
        font-weight: 900; 
        letter-spacing: .8px; 
        text-transform: uppercase; 
    } 
 
    .tarif-table tbody td { 
        padding: 15px 16px; 
        color: var(--racing-black); 
        border-color: #dedede; 
        font-size: 14px; 
    } 
 
    [data-bs-theme="dark"] .tarif-table tbody td { 
        color: white; 
        border-color: #444; 
        background: #242424; 
    } 
 
    .tarif-table tbody tr { 
        transition: .15s ease; 
    } 
 
    .tarif-table tbody tr:hover td { 
        background: #fff4f4 !important; 
    } 
 
    [data-bs-theme="dark"] .tarif-table tbody tr:hover td { 
        background: #321d1d !important; 
    } 
 
    .tarif-number { 
        font-weight: 900; 
        color: var(--racing-red); 
    } 
 
    .vehicle-badge { 
        display: inline-block; 
        padding: 5px 10px; 
        background: #fff0f0; 
        color: var(--racing-red); 
        border: 1px solid var(--racing-red); 
        border-radius: 7px; 
        font-size: 12px; 
        font-weight: 800; 
    } 
 
    [data-bs-theme="dark"] .vehicle-badge { 
        background: #401818; 
    } 
 
    .price-text { 
        font-weight: 900; 
        color: var(--racing-black); 
    } 
 
    [data-bs-theme="dark"] .price-text { 
        color: var(--racing-yellow); 
    } 
 
    /* =========================
       BUTTON
    ========================= */ 
 
    .btn-edit { 
        background: var(--racing-yellow); 
        color: var(--racing-black); 
        border: 2px solid var(--racing-black); 
        font-weight: 800; 
        box-shadow: 2px 2px 0 var(--racing-black); 
    } 
 
    .btn-edit:hover { 
        background: #ffd633; 
        color: var(--racing-black); 
        transform: translateY(-2px); 
    } 
 
    .btn-delete { 
        background: var(--racing-red); 
        color: white; 
        border: 2px solid var(--racing-black); 
        font-weight: 800; 
        box-shadow: 2px 2px 0 var(--racing-black); 
    } 
 
    .btn-delete:hover { 
        background: #a91f1f; 
        color: white; 
        transform: translateY(-2px); 
    } 
 
    /* =========================
       PAGINATION
    ========================= */ 
 
    .tarif-pagination { 
        margin-top: 25px; 
    } 
 
    .tarif-pagination nav { 
        display: flex; 
        justify-content: center; 
    } 
 
    /* =========================
       MOBILE
    ========================= */ 
 
    @media (max-width: 768px) { 
 
        .tarif-page { 
            padding-top: 40px; 
        } 
 
        .tarif-header { 
            min-height: 300px; 
            padding: 28px 25px; 
        } 
 
        .tarif-title { 
            font-size: 28px; 
        } 
 
        .tarif-header-content { 
            max-width: 100%; 
        } 
 
        .mcqueen-tarif { 
            width: 175px; 
            right: 5px; 
            bottom: -8px; 
        } 
 
        .tarif-flag { 
            width: 65px; 
            right: 160px; 
            top: 65px; 
        } 
 
        .tarif-action { 
            align-items: flex-start; 
            flex-direction: column; 
        } 
 
        .tarif-table-wrapper { 
            overflow-x: auto; 
        } 
 
        .tarif-table { 
            min-width: 650px; 
        } 
    } 

    /* =========================
   PAGINATION COLOR
========================= */

.tarif-pagination .pagination {
    gap: 5px;
}

.tarif-pagination .page-link {
    color: var(--racing-red);
    background: white;
    border: 2px solid var(--racing-black);
    font-weight: 800;
    border-radius: 7px;
    box-shadow: 2px 2px 0 var(--racing-black);
    transition: .2s ease;
}

.tarif-pagination .page-link:hover {
    color: var(--racing-black);
    background: var(--racing-yellow);
    border-color: var(--racing-black);
    transform: translateY(-2px);
}

.tarif-pagination .page-item.active .page-link {
    color: white;
    background: var(--racing-red);
    border-color: var(--racing-black);
    box-shadow: 2px 2px 0 var(--racing-black);
}

.tarif-pagination .page-item.disabled .page-link {
    color: #999;
    background: #eeeeee;
    border-color: #cccccc;
    box-shadow: none;
}

[data-bs-theme="dark"] .tarif-pagination .page-link {
    color: var(--racing-yellow);
    background: #242424;
    border-color: white;
}

[data-bs-theme="dark"] .tarif-pagination .page-item.active .page-link {
    color: white;
    background: var(--racing-red);
    border-color: white;
}

[data-bs-theme="dark"] .tarif-pagination .page-item.disabled .page-link {
    color: #666;
    background: #303030;
    border-color: #444;
}
</style> 
 
<div class="tarif-page"> 
 
    <div class="tarif-checker"></div> 
 
    <div class="container tarif-container"> 
 
        {{-- HEADER --}} 
        <div class="tarif-header"> 
 
            {{-- BENDERA --}} 
            <img 
                src="{{ asset('assets/images/racing/flag.png') }}" 
                class="tarif-flag" 
                alt="" 
            > 
 
            {{-- MCQUEEN 95 --}} 
            <img 
                src="{{ asset('assets/images/racing/95mcqueen.png') }}" 
                class="mcqueen-tarif" 
                alt="McQueen" 
            > 
 
            <div class="tarif-header-content"> 
 
                <div class="tarif-badge"> 
                    🏁 PARKING RATE 
                </div> 
 
                <h1 class="tarif-title"> 
                    Daftar <span>Tarif</span> 
                </h1> 
 
                <p class="tarif-description"> 
                    Kelola tarif parkir berdasarkan jenis kendaraan 
                    dengan mudah dan terorganisir. 
                </p> 
 
            </div> 
 
        </div> 
 
        {{-- ACTION --}} 
        <div class="tarif-action"> 
 
            <h2 class="tarif-section-title"> 
                Daftar Tarif Parkir 
            </h2> 
 
            <a 
                href="{{ route('tarif.create') }}" 
                class="btn btn-racing" 
            > 
                + Tambah Tarif 
            </a> 
 
        </div> 
 
        {{-- TABLE --}} 
        <div class="tarif-table-wrapper"> 
 
            <table class="table table-hover tarif-table"> 
 
                <thead> 
 
                    <tr> 
 
                        <th> 
                            No 
                        </th> 
 
                        <th> 
                            Jenis Kendaraan 
                        </th> 
 
                        <th> 
                            Tarif Per Jam 
                        </th> 
 
                        <th> 
                            Aksi 
                        </th> 
 
                    </tr> 
 
                </thead> 
 
                <tbody> 
 
                    @php $no = 1; @endphp 
 
                    @foreach($data as $d) 
 
                    <tr> 
 
                        <td class="tarif-number"> 
                            {{ $no++ }} 
                        </td> 
 
                        <td> 
                            <span class="vehicle-badge"> 
                                {{ $d->jenis_kendaraan }} 
                            </span> 
                        </td> 
 
                        <td class="price-text"> 
                            Rp {{ number_format($d->tarif_per_jam, 0, ',', '.') }} 
                        </td> 
 
                        <td> 
 
                            <a 
                                href="{{ route('tarif.edit', ['id' => $d->id_tarif]) }}" 
                                class="btn btn-sm btn-edit" 
                            > 
                                Edit 
                            </a> 
 
                            <form 
                                action="{{ route('tarif.destroy', ['id' => $d->id_tarif]) }}" 
                                method="POST" 
                                class="d-inline" 
                                onsubmit="return confirm('apakah benar akan dihapus?');" 
                            > 
 
                                @csrf 
 
                                @method('DELETE') 
 
                                <button 
                                    type="submit" 
                                    class="btn btn-sm btn-delete" 
                                > 
                                    Hapus 
                                </button> 
 
                            </form> 
 
                        </td> 
 
                    </tr> 
 
                    @endforeach 
 
                </tbody> 
 
            </table> 
 
        </div> 
 
        {{-- PAGINATION --}} 
        <div class="tarif-pagination"> 
            {!! $data->links() !!} 
        </div> 
 
    </div> 
 
</div> 
 
@endsection