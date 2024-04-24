@extends('layouts.master')
@section('title','Tambah Data Ticket')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Halaman tambah data</h4>
                <p class="card-description">
                  Basic form elements
                </p>
                <form action="{{ route('ticket.store') }}" method="POST" class="forms-sample">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Kendala :</label>
                                <div class="col-md-8">
                                    <input type="text"
                                        name="kendala"
                                        class="form-control @error('kendala') is-invalid @enderror"
                                        value="{{ old('kendala') }}"
                                        placeholder="Masukan">
                                    @error('kendala')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Asset :</label>
                                <div class="col-md-8">
                                    <select name="asset_id" class="form-control @error('asset_id') is-invalid @enderror">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach ($asset as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->nama_barang}}</option>
                                        @endforeach
                                    </select>
                                    @error('asset_id')
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
                                <label class="col-md-4 col-form-label">Client :</label>
                                <div class="col-md-8">
                                    <select name="client_id" class="form-control @error('client_id') is-invalid @enderror">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach ($client as $client)
                                            <option value="{{ $client->id }}">{{ $client->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Ticket for :</label>
                                <div class="col-md-8">
                                    <select name="ticket_for" class="form-control @error('ticket_for') is-invalid @enderror">
                                        <option value="" selected disabled>Choose...</option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Inventory Control">Inventory Control</option>
                                        <option value="Manufaktur Engineering">Manufaktur Engineering</option>
                                        <option value="Divisi Sipil">Divisi Sipil</option>
                                    </select>
                                    @error('ticket_for')
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
                                <label class="col-md-4 col-form-label">Lokasi</label>
                                <div class="col-md-8">
                                    <select name="lokasi_id" class="form-control">
                                        <option value="" selected disabled>Choose...</option>
                                        @foreach ($lokasi as $lok)
                                            <option value="{{$lok->id}}">{{$lok->nama_lokasi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label hidden class="col-md-4 col-form-label">Status</label>
                                <div class="col-md-8">
                                    <select hidden name="status" class="form-control">
                                        <option value="Created">Created</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label hidden class="col-md-4 col-form-label">Role</label>
                                <div class="col-md-8">
                                    <select hidden name="role" class="form-control">
                                        <option value="Service Desk">Service Desk</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Detail ticket :</label>
                                <div class="col-md-12 mb-4">
                                    <textarea name="detail_kendala" class="form-control @error('detail_kendala') is-invalid @enderror" rows="3"></textarea>
                                    @error('detail_ticket')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                    <a href="{{ route('ticket.index') }}" type="button" class="btn btn-light">Kembali</a>
                </form>
              </div>
            </div>
          </div>
    </section>
</div>
@endsection
