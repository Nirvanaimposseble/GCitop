@extends('layouts.master')
@section('title','List Data Client')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4 class="card-title">List Data Client</h4>
                            {{-- <a href="{{ route('client.create') }}" class="btn btn-primary">Tambah Data</a> --}}
                        </div>
                        <div class="card-body">
                            <div class="table-responsive pt-3">
                                <table id="order-listing" class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Nomor Induk</th>
                                            <th scope="col">Nama User</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Posisi</th>
                                            <th scope="col">IP Address</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($client as $index => $cl)
                                            <tr class="{{ $index % 2 == 0 ? 'bg-light' : '' }}">
                                                <td>{{ $cl->nik }}</td>
                                                <td>{{ $cl->nama }}</td>
                                                <td>{{ $cl->lokasi_id }}</td>
                                                <td>{{ $cl->posisi_id }}</td>
                                                <td>{{ $cl->ip_address }}</td>
                                                <td>
                                                    <a href="{{ route('client.edit',$cl->id) }}" class="btn btn-outline-primary">Perbarui</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
