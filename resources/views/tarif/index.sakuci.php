@extends('layouts.app')

@section('title', config('app.name')  .  ' --kerangka PHP ringan')

@section ('content')

    <h1>Daftar Tarif</h1>
<a href="{{ route('tarif.create') }}" class="btn btn-primary mb-3 btn-sm"  style="background-color: #425B9A; color: white; border: none;">Tambah Daftar Tarif</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th style="background-color: #76C0EC !important; color: white !important;">No</th>
            <th style="background-color: #76C0EC !important; color: white !important;">jenis_kendaraan</th>
            <th style="background-color: #76C0EC !important; color: white !important;">tarif_per_jam</th>
            <th style="background-color: #76C0EC !important; color: white !important;">aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach($data as $d)
        <tr>
            <td> {{ $no++ }} </td>
            <td> {{ $d->jenis_kendaraan }} </td>
            <td> {{ $d->tarif_per_jam }} </td>
            <td><a href="{{ route('tarif.edit', ['id' => $d->id_tarif]) }}" class="btn btn-sm btn-success">Edit</a>
            <form action="{{ route('tarif.destroy', ['id' => $d->id_tarif]) }}" method="POST" class="d-inline" onsubmit="return confirm('apakah benar akan dihapus?');">
             @csrf
             @method('DELETE')
    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
    </form>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $data->links() !!}

@endsection