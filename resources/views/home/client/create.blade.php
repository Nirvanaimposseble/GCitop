@extends('layouts.master')
@section('title','Tambah Data Client')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Halaman tambah data</h4>
                    <form action="{{ route('client.store') }}" method="POST" class="form-sample">
                        @csrf
                        <p class="card-description">
                            Personal info
                        </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nomor Induk</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="nik"
                                            class="form-control @error('nik') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('nik') }}"
                                            />
                                            @error('nik')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lokasi</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="lokasi_id"
                                            class="form-control @error('lokasi_id') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('lokasi_id') }}"
                                            />
                                            @error('lokasi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Nama</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="nama"
                                            class="form-control @error('nama') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('nama') }}"
                                            />
                                            @error('nama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Posisi</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="posisi_id"
                                            class="form-control @error('posisi_id') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('posisi_id') }}"
                                            />
                                            @error('posisi_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Telp / Ext</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="telp"
                                            class="form-control @error('telp') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('telp') }}"
                                            />
                                            @error('telp')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP Address</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="ip_address"
                                            class="form-control @error('ip_address') is-invalid @enderror"
                                            placeholder="Masukan"
                                            value="{{ old('ip_address') }}"
                                            />
                                            @error('ip_address')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ route('client.index') }}" type="button" class="btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
