@extends('layouts.master')
@section('title', 'List Data Kategori Asset')
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
                                <h4 class="card-title">List Data Kategori Asset</h4>
                                <a href="{{ route('kategoriasset.create') }}" class="btn btn-primary">Tambah data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Kategori Asset</th>
                                                <th scope="col">Dibuat Pada</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategoriasset as $ka)
                                            <tr>
                                                <td>{{ $ka->nama_kategori }}</td>
                                                <td>{{ $ka->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('kategoriasset.edit', $ka->id) }}" class="btn btn-outline-facebook p-3">Perbarui</a>
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
