@extends('layouts.master')
@section('title','Halaman edit data')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">Halaman Edit Data</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('asset.update',['asset'=> $asset->id]) }}" method="post" class="form-sample">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nomor asset :</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                    name="no_asset" value="{{$asset->no_asset}}"
                                                    class="form-control @error('no_asset')
                                                        is-invalid
                                                    @enderror"
                                                    placeholder="Masukan"
                                                    value="{{old('no_asset')}}"
                                                />
                                                @error('no_asset')
                                                    <div class="invalid-feedback">
                                                        {{$message}}
                                                    </div>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Nama barang :</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        name="nama_barang" value="{{$asset->nama_barang}}"
                                                        class="form-control @error('nama_barang')
                                                            is-invalid
                                                        @enderror"
                                                        placeholder="Masukan"
                                                        value="{{old('nama_barang')}}"
                                                    />
                                                    @error('nama_barang')
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
                                                <label class="col-sm-4 col-form-label">Kategori asset :</label>
                                                <div class="col-sm-8">
                                                    <select name="" class="form-control">
                                                        @foreach ($kategoriasset as $ka)
                                                            <option value="{{$ka->id}}">{{$ka->nama_kategori}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">No serial :</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <input type="text"
                                                            name="no_serial" value="{{$asset->no_serial}}"
                                                            class="form-control @error('no_serial')
                                                                is-invalid
                                                            @enderror"
                                                            placeholder="Masukan"
                                                            value="{{old('no_serial')}}"
                                                        />
                                                        @error('no_serial')
                                                            <div class="invalid-feedback">
                                                                {{$message}}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Lokasi :</label>
                                                <div class="col-sm-8">
                                                    <select name="lokasi_id" class="form-control @error('lokasi_id') is-invalid @enderror">
                                                        @foreach ($lokasi as $lok)
                                                            <option value="{{$lok->id}}">{{$lok->nama_lokasi}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('lokasi_id')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-sm-4 col-form-label">Merk barang :</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        name="merk" value="{{$asset->merk}}"
                                                        class="form-control @error('merk')
                                                            is-invalid
                                                        @enderror"
                                                        placeholder="Masukan"
                                                        value="{{old('merk')}}"
                                                    />
                                                    @error('merk')
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
                                                <label class="col-sm-4 col-form-label">Model</label>
                                                <div class="col-sm-8">
                                                    <input type="text"
                                                        name="model" value="{{$asset->model }}"
                                                        class="form-control @error('model')
                                                            is-invalid
                                                        @enderror"
                                                        value="{{old('model')}}"
                                                        placeholder="Masukan"
                                                    />
                                                    @error('model')
                                                        <div class="invalid-feedback">
                                                            {{$message}}
                                                        </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label hidden class="col-sm-4 col-form-label">Status</label>
                                                    <div class="col-sm-8">
                                                        <select name="status" class="form-control @error('status') is-invalid @enderror" {{ old('status') ? '' : 'hidden' }}>
                                                            <option value="" selected disabled>Choose...</option>
                                                            <option value="Digunakan">Digunakan</option>
                                                            <option value="Ruksak">Ruksak</option>
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
