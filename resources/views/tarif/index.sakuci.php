@extends('layouts.app')

@section('title', config('app.name')  .  ' --kerangka PHP ringan')

@section ('content')

    <h1>Daftar Tarif</h1>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>id_tarif</th>
            <th>jenis_kendaraan</th>
            <th>tarif_per_jam</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td> {{ $d->id_tarif }} </td>
            <td> {{ $d->jenis_kendaraan }} </td>
            <td> {{ $d->tarif_per_jam }} </td>
            <td><button class="btn btn-sm btn-success">Edit</button>
            <button class="btn btn-sm btn-danger">Hapus</button>
        </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! $data->links() !!}

@endsection