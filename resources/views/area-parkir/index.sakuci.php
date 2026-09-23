@extends('layouts.app')

@section('title', config('app.name')  .  ' --kerangka PHP ringan')

@section ('content')

    <h1>area parkir</h1>
<a href="{{ route('area-parkir.create') }}" class="btn btn-primary mb-3 btn-sm"  style="background-color: #425B9A; color: white; border: none;">Tambah Daftar Member</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th style="background-color: #76C0EC !important; color: white !important;">No</th>
            <th style="background-color: #76C0EC !important; color: white !important;">nama_area</th>
            <th style="background-color: #76C0EC !important; color: white !important;">kapasitas</th>
            <th style="background-color: #76C0EC !important; color: white !important;">terisi</th>
            <th style="background-color: #76C0EC !important; color: white !important;">aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach($data as $a)
        <tr>
            <td> {{ $no++ }} </td>
            <td> {{ $a->nama_area }} </td>
            <td> {{ $a->kapasitas }} </td>
            <td> {{ $a->terisi }} </td>
            <td><a href="{{ route('area-parkir.edit', ['id' => $a->id_area]) }}" class="btn btn-sm btn-success">Edit</a>
            <form action="{{ route('area-parkir.destroy', ['id' => $a->id_area]) }}" method="POST" class="d-inline" onsubmit="return confirm('apakah benar akan dihapus?');">
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