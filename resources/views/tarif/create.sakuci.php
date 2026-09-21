@extends('layouts.app')

@section ('content')

<div class="container">
    <h1>Tambah Daftar tarif</h1>
    <form action="{{ route('tarif.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
        <label for="jenis_kendaraan">Jenis Kendaraan</label>
          <input
            type="text"
            name="jenis_kendaraan"
            id="jenis_kendaraan"
            class="form-control"
            placeholder="Contoh: Motor, Mobil, Bus"
            required>
        </div>
    
        <div class="form-group mb-3">
            <label for="tarif_per_jam">Tarif Per-Jam</label>

            <input
                type="number"
                name="tarif_per_jam"
                id="tarif_per_jam"
                class="form-control"
                placeholder="Masukkan tarif per jam"
                min="0"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection