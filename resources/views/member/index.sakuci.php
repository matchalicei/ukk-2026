@extends('layouts.app')

@section('title', config('app.name')  .  ' --kerangka PHP ringan')

@section ('content')

    <h1>Daftar Member</h1>
<a href="{{ route('member.create') }}" class="btn btn-primary mb-3 btn-sm">Tambah Daftar Member</a>
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>nama_member</th>
            <th>plat_nomor</th>
            <th>jenis_kendaraan</th>
            <th>warna</th>
            <th>aksi</th>
        </tr>
    </thead>
    <tbody>
        @php $no=1; @endphp
        @foreach($data as $m)
        <tr>
            <td> {{ $no++ }} </td>
            <td> {{ $m->nama_member }} </td>
            <td> {{ $m->plat_nomor }} </td>
            <td> {{ $m->jenis_kendaraan }} </td>
            <td> {{ $m->warna }} </td>
            <td><a href="{{ route('member.edit', ['id' => $m->id_member]) }}" class="btn btn-sm btn-success">Edit</a>
            <form action="{{ route('member.destroy', ['id' => $m->id_member]) }}" method="POST" class="d-inline" onsubmit="return confirm('apakah benar akan dihapus?');">
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