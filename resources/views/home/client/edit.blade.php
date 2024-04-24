@extends('layouts.master')
@section('title', 'Edit Data Client')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Halaman edit data</h4>
                    <form action="{{ route('client.update', ['client' => $client->id]) }}" method="POST" class="form-sample">
                        @csrf
                        @method('PUT')
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
                                            value="{{ $client->nik }}"
                                            class="form-control"
                                            placeholder="Masukan" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Lokasi</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="lokasi_id"
                                            value="{{ $client->lokasi_id }}"
                                            class="form-control"
                                            placeholder="Masukan" />
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
                                            value="{{ $client->nama }}"
                                            class="form-control"
                                            placeholder="Masukan" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">Posisi</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="posisi_id"
                                            value="{{ $client->posisi_id }}"
                                            class="form-control"
                                            placeholder="Masukan" />
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
                                            value="{{ $client->telp }}"
                                            class="form-control"
                                            placeholder="Masukan" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label">IP Address</label>
                                    <div class="col-sm-8">
                                        <input type="text"
                                            name="ip_address"
                                            value="{{ $client->ip_address }}"
                                            class="form-control"
                                            placeholder="Masukan" />
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
