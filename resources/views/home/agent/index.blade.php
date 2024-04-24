@extends('layouts.master')
@section('title', 'List Data Agent')
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
                                <h4 class="card-title">List Data Agent</h4>
                                <!-- Tombol Tambah Data -->
                                <a href="{{ route('agent.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <!-- Tabel Data -->
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nomor Induk</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Divisi</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Looping Data Agent -->
                                            @foreach ($agent as $ag)
                                            <tr>
                                                <td>{{ $ag->nik }}</td>
                                                <td>{{ $ag->nama }}</td>
                                                <td>{{ $ag->divisi }}</td>
                                                <td>{{ $ag->status }}</td>
                                                <td>
                                                    <!-- Tombol Perbarui -->
                                                    <a href="{{ route('agent.edit', $ag->id) }}" class="btn btn-outline-primary p-3">Perbarui</a>
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
