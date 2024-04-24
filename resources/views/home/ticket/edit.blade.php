@extends('layouts.master')
@section('title','Tambah Data Ticket')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Perbarui data</h4>
                <p class="card-description">
                  Basic form elements
                </p>
                <form action="{{route('ticket.update',['ticket'=>$ticket->id])}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Kendala :</label>
                                <div class="col-md-8">
                                    <input type="text"
                                        name="kendala" value="{{$ticket->kendala}}"
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
                                        <option value="" disabled>Choose...</option>
                                        @foreach ($asset as $asset)
                                            <option value="{{ $asset->id }}" @if($ticket->asset_id == $asset->id) selected @endif>{{ $asset->nama_barang }}</option>
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
                                        @foreach ($client as $cli)
                                            <option value="{{ $cli->id }}" @if ($ticket->client_id == $cli->id) selected @endif>{{ $cli->nama }}</option>
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
                                        <option value="" disabled>Choose...</option>
                                        <option value="Information Technology" @if($ticket->ticket_for == "Information Technology") selected @endif>Information Technology</option>
                                        <option value="Inventory Control" @if($ticket->ticket_for == "Inventory Control") selected @endif>Inventory Control</option>
                                        <option value="Manufaktur Engineering" @if($ticket->ticket_for == "Manufaktur Engineering") selected @endif>Manufaktur Engineering</option>
                                        <option value="Divisi Sipil" @if($ticket->ticket_for == "Divisi Sipil") selected @endif>Divisi Sipil</option>
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
                                            <option value="{{$lok->id}}" @if($ticket->lokasi_id == $lok->id) selected @endif>{{$lok->nama_lokasi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label hidden lass="col-md-4 col-form-label">Status</label>
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
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Detail Kendala :</label>
                                <div class="col-md-8">
                                    <textarea name="detail_kendala" class="form-control @error('detail_kendala') is-invalid @enderror" placeholder="Masukkan detail kendala..." rows="4" cols="50">{{ old('detail_kendala', $ticket->detail_kendala ?? '') }}</textarea>
                                    @error('detail_kendala')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
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
