@extends('layouts.master')
@section('title', 'List Data Sub Kategori')
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
                                <h4 class="card-title">List Data Sub Kategori</h4>
                                <!-- Tombol Tambah Data -->
                                <a href="{{ route('subkategori.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <!-- Tabel Data -->
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Nama Sub Kategori</th>
                                                <th>Kategori Asset</th>
                                                <th>Dibuat Pada</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data Sub Kategori -->
                                            @foreach ($subkategori as $sub)
                                            <tr>
                                                <td>{{ $sub->nama_subkategori }}</td>
                                                <td>{{ $sub->Kategoriticket->kategoritiket }}</td>
                                                <td>{{ $sub->created_at }}</td>
                                                <td>
                                                    <!-- Tombol Perbarui -->
                                                    <a href="{{ route('subkategori.edit', $sub->id) }}" class="btn btn-outline-primary p-3">Perbarui</a>
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
