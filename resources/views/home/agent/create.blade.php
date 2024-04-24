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
                                <h4 class="card-title">Halaman Tambah Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('agent.store')}}" method="post" class="form-sample">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nomor Induk :</label>
                                                <div class="col-md-8">
                                                    <input type="text"
                                                        name="nik"
                                                        placeholder="Masukan"
                                                        value="{{old('nik')}}"
                                                        class="form-control @error('nik')
                                                            is-invalid
                                                        @enderror"
                                                    />
                                                    @error('nik')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nama :</label>
                                                <div class="col-md-8">
                                                    <input type="text"
                                                        name="nama"
                                                        placeholder="Masukan"
                                                        value="{{old('nama')}}"
                                                        class="form-control @error('nama')
                                                            is-invalid
                                                        @enderror"
                                                    />
                                                    @error('nama')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Divisi</label>
                                                <div class="col-md-8">
                                                    <select name="divisi" class="form-control @error('divisi')
                                                        is-invalid
                                                    @enderror">
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Information Technology">Information Technology</option>
                                                        <option value="Inventory Control">Inventory Control</option>
                                                        <option value="Manufaktur Engineering">Manufaktur Engineering</option>
                                                        <option value="Sipil">Sipil</option>
                                                    </select>
                                                    @error('divisi')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Status</label>
                                                <div class="col-md-8">
                                                    <select name="status" class="form-control @error('status')
                                                        is-invalid
                                                    @enderror">
                                                        <option value="" selected disabled>Choose...</option>
                                                        <option value="Working">Working</option>
                                                        <option value="Idle">Idle</option>
                                                    </select>
                                                    @error('status')
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
                                            <a href="{{ route('asset.index') }}" type="button" class="btn btn-light">Kembali</a>
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
