@extends('layouts.master')
@section('title', 'List Data User')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <!-- Bagian Konten -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-white">
                                <!-- Judul -->
                                <h4 class="card-title">List Data User</h4>
                                <!-- Tombol Tambah Data -->
                                <a href="{{ route('user.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <!-- Tabel Data -->
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nomor Induk</th>
                                                <th>Nama User</th>
                                                <th>Lokasi</th>
                                                <th>Posisi</th>
                                                <th>Telp / Ext</th>
                                                <th>IP Address</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data User -->
                                            @foreach ($user as $usr)
                                            <tr>
                                                <td>{{ $usr->nik }}</td>
                                                <td>{{ $usr->nama }}</td>
                                                <td>{{ $usr->Lokasi->nama_lokasi }}</td>
                                                <td>{{ $usr->posisi_id }}</td>
                                                {{-- <td>{{ $usr->telp }}</td> --}}
                                                <td><a target="_Blank" href="https://wa.me/{{$usr->telp}}">{{$usr->telp}}</a></td>
                                                <td>{{ $usr->ip_address }}</td>
                                                <td>
                                                    <!-- Tombol Perbarui -->
                                                    <a href="{{ route('user.edit',['user'=> $usr->id]) }}" class="btn btn-outline-primary p-3">Perbarui</a>
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
</div>
@endsection
