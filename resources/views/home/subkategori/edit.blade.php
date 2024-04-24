@extends('layouts.master')
@section('title','Halaman Edit Data')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">Halaman Edit data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{route('subkategori.update',['subkategori'=> $subkategori->id])}}" method="post" class="form-sample">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nama sub kategori</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        name="nama_subkategori" value="{{$subkategori->nama_subkategori}}"
                                                        class="form-control @error('nama_subkategori')
                                                            is-invalid
                                                        @enderror"
                                                        placeholder="Masukan"
                                                        value="{{ old('nama_subkategori') }}"
                                                    />
                                                    @error('nama_subkategori')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="kategoriticket_id" class="col-sm-4 col-form-label">Kategori Ticket</label>
                                                <div class="col-sm-8">
                                                    <select name="kategoriticket_id" class="form-control @error('kategoriticket_id') is-invalid @enderror" id="kategoriticket_id">
                                                        @foreach ($kategoriticket as $kt)
                                                            <option value="{{$kt->id}}">{{$kt->kategoritiket}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kategoriticket_id')
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
                                            <a href="{{ route('subkategori.index') }}" type="button" class="btn btn-light">Kembali</a>
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
