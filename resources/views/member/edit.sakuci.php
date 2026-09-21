@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Daftar member</h1>

    <form action="{{ route('member.update', ['id_member' => $member->id_member]) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="form-group mb-3">
            <label for="nama_member">nama member</label>
            <input
                type="text"
                name="nama_member"
                id="nama_member"
                class="form-control"
                value="{{ $member->nama_member}}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="plat_nomor">plat nomor</label>
            <input
                type="text"
                name="plat_nomor"
                id="plat_nomor"
                class="form-control"
                value="{{ $member->plat_nomor }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="jenis_kendaraan">Jenis Kendaraan</label>
            <input
                type="text"
                name="jenis_kendaraan"
                id="jenis_kendaraan"
                class="form-control"
                value="{{ $member->jenis_kendaraan }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="warna">warna</label>
            <input
                type="text"
                name="warna"
                id="warna"
                class="form-control"
                value="{{ $member->warna }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection