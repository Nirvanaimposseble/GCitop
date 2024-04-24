@extends('layouts.master')
@section('title', 'List Data Lokasi')
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
                                <h4 class="card-title">List Data Lokasi</h4>
                                <!-- Tombol Tambah Data -->
                                <a href="{{ route('lokasi.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <!-- Tabel Data -->
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Lokasi</th>
                                                <th>Wilayah</th>
                                                <th>Regional</th>
                                                <th>Area</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data Lokasi -->
                                            @foreach ($lokasi as $lok)
                                            <tr>
                                                <td>{{ $lok->nama_lokasi }}</td>
                                                <td>{{ $lok->wilayah }}</td>
                                                <td>{{ $lok->regional }}</td>
                                                <td>{{ $lok->area }}</td>
                                                <td>
                                                    <!-- Tombol Perbarui -->
                                                    <a href="{{ route('lokasi.edit', $lok->id) }}" class="btn btn-outline-primary p-3">Perbarui</a>
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
