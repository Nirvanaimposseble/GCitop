@extends('layouts.master')
@section('title', 'Detail Ticket')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row bordered">
                                    <div class="col-sm-6">
                                        <dl class="dl-horizontal">
                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Nomor Ticket :</dt>
                                                <dd class="col-sm-8">{{$ticket->no_ticket}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Kendala :</dt>
                                                <dd class="col-sm-8">{{$ticket->kendala}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Diajukan Kepada :</dt>
                                                <dd class="col-sm-8">{{$ticket->ticket_for}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Detail Kendala :</dt>
                                                <dd class="col-sm-8">{{$ticket->detail_kendala}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">IP Address :</dt>
                                                <dd class="col-sm-8">{{$ticket->client->ip_address}}</dd>
                                            </div><br>
                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Nomor Asset :</dt>
                                                <dd class="col-sm-8">{{$asset->no_asset}}</dd>
                                            </div><br>
                                            <!-- Add other ticket details here -->
                                        </dl>
                                    </div>
                                    <div class="col-sm-6">
                                        <dl class="dl-horizontal">
                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Telp / Ext :</dt>
                                                <dd class="col-sm-8">{{$client->telp}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Waktu Estimasi :</dt>
                                                <dd class="col-sm-8">:-</dd>
                                            </div> <br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Client :</dt>
                                                <dd class="col-sm-8">{{$ticket->client->nik}}</dd>
                                            </div><br>
                                            <div class="row-mb-3">
                                                <dt class="col-sm-5">Ticket Status :</dt>
                                                <dd class="col-sm-7">{{$ticket->status}}</dd>
                                            </div><br>

                                            <div class="row-mb-3">
                                                <dt class="col-sm-4">Tanggal / Waktu :</dt>
                                                <dd class="col-sm-8">{{$ticket->created_at}}</dd>
                                            </div>
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <form action="/detailticket/simpan" method="post" class="form-sample">
                                    @csrf
                                    <input type="hidden" value="{{ $ticket->id }}" name="ticket_id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Jenis Kendala :</label>
                                                <div class="col-sm-8">
                                                    <select id="jenis" name="jenis" class="form-control @error('jenis') is-invalid @enderror">
                                                        <option value="" selected disabled>Choose..</option>
                                                        <option value="Kendala">Kendala</option>
                                                        <option value="Permintaan">Permintaan</option>
                                                    </select>
                                                    @error('jenis')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Kategori ticket :</label>
                                                <div class="col-sm-8">
                                                    <select id="kategoriTicket" name="kkategoriticket" class="form-control @error('kkategoriticket') is-invalid @enderror">
                                                        <option value="" disabled selected>Choose...</option>
                                                        @foreach ($kategoriticket as $kategori)
                                                            <option value="{{ $kategori->id }}">{{ $kategori->kategoritiket }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('kkategoriticket')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Biaya :</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group">
                                                        <span class="input-group-text">IDR</span>
                                                        <input type="text"
                                                            name="biaya"
                                                            class="form-control @error('biaya') is-invalid @enderror"
                                                            value="{{ old('biaya') }}"
                                                            aria-label="biaya (ke rupiah terdekat)">
                                                    </div>
                                                    @error('biaya')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Sub Kategori :</label>
                                                <div class="col-md-8">
                                                    <select id="subKategori" name="ssubkategori" class="form-control">
                                                        <option value="" selected>Choose..</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label class="col-md-4 col-form-label">Saran Tindakan :</label>
                                                <div class="col-md-12 mb-4">
                                                    <textarea name="saran" class="form-control @error('saran') is-invalid @enderror" rows="3"></textarea>
                                                    @error('saran')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{route('ticket.index')}}" class="btn btn-light">Kembali</a>
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
