@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Edit Daftar Tarif</h1>

    <form action="{{ route('tarif.update', ['id_tarif' => $tarif->id_tarif]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="jenis_kendaraan">Jenis Kendaraan</label>
            <input
                type="text"
                name="jenis_kendaraan"
                id="jenis_kendaraan"
                class="form-control"
                value="{{ $tarif->jenis_kendaraan }}"
                required>
        </div>

        <div class="form-group mb-3">
            <label for="tarif_per_jam">Tarif Per Jam</label>
            <input
                type="number"
                name="tarif_per_jam"
                id="tarif_per_jam"
                class="form-control"
                value="{{ $tarif->tarif_per_jam }}"
                required>
        </div>

        <button type="submit" class="btn btn-primary">update</button>
        <a href="{{ route('tarif.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

@endsection