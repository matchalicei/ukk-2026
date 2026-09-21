@extends('layouts.app')

@section ('content')

<div class="container">
    <h1>Tambah Daftar Member</h1>
    <form action="{{ route('member.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
        <label for="nama_member">nama member</label>
          <input
            type="text"
            name="nama_member"
            id="nama_member"
            class="form-control"
            placeholder="Masukkan Nama"
            required>
        </div>
    
        <div class="form-group mb-3">
            <label for="plat_nomor">Plat Nomor</label>

            <input
                type="text"
                name="plat_nomor"
                id="plat_nomor"
                class="form-control"
                placeholder="Masukkan plat nomor"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="jenis_kendaraan">jenis kendaraan</label>

            <input
                type="text"
                name="jenis_kendaraan"
                id="jenis_kendaraan"
                class="form-control"
                placeholder="Masukkan jenis_kendaraan"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="warna">warna</label>

            <input
                type="text"
                name="warna"
                id="warna"
                class="form-control"
                placeholder="Masukkan warna kendaraan"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection