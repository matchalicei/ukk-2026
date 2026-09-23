@extends('layouts.app')

@section ('content')

<div class="container">
    <h1>Tambah area</h1>
    <form action="{{ route('area-parkir.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
        <label for="nama_area">nama area</label>
          <input
            type="text"
            name="nama_area"
            id="nama_area"
            class="form-control"
            placeholder="area"
            required>
        </div>
    
        <div class="form-group mb-3">
            <label for="kapasitas">kapasitas</label>

            <input
                type="number"
                name="kapasitas"
                id="kapasitas"
                class="form-control"
                placeholder="Masukkan kapasitas"
                min="0"
                required>
        </div>

         <div class="form-group mb-3">
            <label for="terisi">terisi</label>

            <input
                type="number"
                name="terisi"
                id="terisi"
                class="form-control"
                placeholder="terisi?"
                min="0"
                required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection