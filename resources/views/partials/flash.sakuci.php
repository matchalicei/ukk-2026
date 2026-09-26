{{-- Notifikasi flash & daftar error validasi (Bootstrap alert) --}}

@if(session('success')) <div
     style="
         display:flex;
         align-items:center;
         gap:10px;
         width:100%;
         min-height:48px;
         padding:10px 15px;
         margin-bottom:20px;
         background:#fff8d6;
         color:#252525;
         border:1px solid #f0d76a;
         border-left:4px solid #FFC400;
         border-radius:9px;
         font-size:14px;
         font-weight:600;
     "
 > <span
         style="
             color:#D62828;
             font-size:18px;
             line-height:1;
         "
     >🏁</span>
    <span>{{ session('success') }}</span>
</div>
@endif



@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

@if (errors()->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Periksa kembali isian Anda:</strong>
        <ul class="mb-0 mt-2 ps-3">
            @foreach (errors()->all() as $pesan)
                <li>{{ $pesan }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
    </div>
@endif

