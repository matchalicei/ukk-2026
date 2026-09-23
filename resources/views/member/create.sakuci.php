@extends('layouts.app')

@section ('content')

<div class="container">
    <h1>Tambah Daftar Member</h1>
    <form action="{{ route('member.store') }}" method="POST">
        @csrf
      <div class="mb-3">
    <label for="id_user" class="form-label text-secondary fs-7">
        Pilih User / Pemilik
    </label>

    <select name="id_user" id="id_user" class="form-select" required>
        <option value="">-- Pilih User --</option>

        <?php foreach($users as $user): ?>
            <option value="<?= e($user->id) ?>">
                <?= e($user->username) ?>
            </option>
        <?php endforeach; ?>
    </select>
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