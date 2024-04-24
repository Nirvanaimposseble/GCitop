@extends('layouts.master')
@section('title', 'List Data Barang Asset')
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
                                <h4 class="card-title">List Data Asset</h4>
                                <!-- Tombol Tambah Data -->
                                <a href="{{ route('asset.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <!-- Tabel Data -->
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>No Asset</th>
                                                <th>Nama Barang</th>
                                                <th>Kategori Asset</th>
                                                <th>Nomor Seri</th>
                                                <th>Model barang</th>
                                                <th>Merk barang</th>
                                                <th>Status barang</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data Asset -->
                                            @foreach ($asset as $aset)
                                            <tr>
                                                <td>{{ $aset->no_asset }}</td>
                                                <td>{{ $aset->nama_barang }}</td>
                                                <td>{{ $aset->Kategoriasset->nama_kategori }}</td>
                                                <td>{{ $aset->no_serial }}</td>
                                                <td>{{ $aset->model }}</td>
                                                <td>{{ $aset->merk }}</td>
                                                <td>{{ $aset->status }}</td>
                                                <td>
                                                    <!-- Tombol Perbarui -->
                                                    <a href="{{ route('asset.edit', $aset->id) }}" class="btn btn-outline-primary p-3">Perbarui</a>
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
