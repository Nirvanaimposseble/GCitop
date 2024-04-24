@extends('layouts.master')
@section('title','Halaman Tambah Data')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-tile">Halaman Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('kategoriasset.store')}}" method="post" class="form-sample">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nama Kategori :</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        name="nama_kategori"
                                                        placeholder="Masukan"
                                                        value="{{old('nama_kategori')}}"
                                                        class="form-control @error('nama_kategori')
                                                            is-invalid
                                                        @enderror"
                                                    />
                                                    @error('nama_kategori')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                            <a href="{{ route('kategoriasset.index') }}" type="button" class="btn btn-light">Kembali</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
