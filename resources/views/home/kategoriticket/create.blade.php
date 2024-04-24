@extends('layouts.master')
@section('title','Halaman tambah data')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">Halaman Tambah data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('kategoriticket.store') }}" method="post" class="form-sample">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Kategori ticket</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                    name="kategoritiket"
                                                    class="form-control @error('kategoritiket')
                                                        is-invalid
                                                    @enderror"
                                                    placeholder="Masukan"
                                                />
                                                    @error('kategoritiket')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                            <a href="{{ route('kategoriticket.index') }}" type="button" class="btn btn-light">Kembali</a>
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
