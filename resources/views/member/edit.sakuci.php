@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Daftar member</h1>

    <form action="{{ route('member.update', ['id_member' => $member->id_member]) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="mb-3"><label for="id_user" class="form-label text-secondary fs-7">Pilih User / Pemilik</label>
                            <select name="id_user" id="id_user" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach($users as $user)
                                    @php 
                                        $userId = $user->id ?? $user->id_user; 
                                    @endphp
                                    <option value="{{ $userId }}" {{ $member->id_user == $userId ? 'selected' : '' }}>
                                        {{ $user->nama ?? $user->name ?? $user->username }}
                                    </option>
                                @endforeach
                            </select>
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