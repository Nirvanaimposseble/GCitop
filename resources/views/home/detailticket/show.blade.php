@extends('layouts.master')
@section('title', 'Lihat data')
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
                                                    <dd class="col-sm-8">{{ $ticket->no_ticket }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Kendala :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->kendala }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Diajukan Kepada :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->ticket_for }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Detail Kendala :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->detail_kendala }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">IP Address :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->client->ip_address }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Nomor Asset :</dt>
                                                    <dd class="col-sm-8">{{ $asset->no_asset }}</dd>
                                                </div><br>
                                            </dl>
                                        </div>
                                        <div class="col-sm-6">
                                            <dl class="dl-horizontal">
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Telp / Ext :</dt>
                                                    <dd class="col-sm-8">{{ $client->telp }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Waktu Estimasi :</dt>
                                                    @if ($ticket->status === 'Finished')
                                                        <dd class="col-sm-8">{{ $est }} Minutes</dd>
                                                    @elseif ($ticket->status === 'Resolved')
                                                        <dd class="col-sm-8">{{ $est }} Minutes</dd>
                                                    @else
                                                        <dd class="col-sm-8">-</dd>
                                                    @endif
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Client :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->client->nik }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-5">Ticket Status :</dt>
                                                    <dd class="col-sm-7">{{ $ticket->status }}</dd>
                                                </div><br>
                                                <div class="row-mb-3">
                                                    <dt class="col-sm-4">Tanggal / Waktu :</dt>
                                                    <dd class="col-sm-8">{{ $ticket->created_at }}</dd>
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
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive pt-3">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Jenis Ticket</th>
                                                    <th scope="col">Kategori Ticket</th>
                                                    <th scope="col">Sub Kategori ticket</th>
                                                    <th scope="col">Pengeluaran</th>
                                                    <th scope="col">Tanggal Tindakan</th>
                                                    <th scope="col">Saran Tindakan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($detailticket as $detail)
                                                    <tr>
                                                        <td>{{ $detail->jenis }}</td>
                                                        <td>{{ $detail->Kategoriticket->kategoritiket }}</td>
                                                        <td>{{ $detail->Subkategori->nama_subkategori }}</td>
                                                        <td>Rp {{ $detail->biaya }}</td>
                                                        <td>{{ $detail->created_at }}</td>
                                                        <td>
                                                            <button type="button" class="btn btn-link" data-toggle="modal"
                                                                data-target="#saranModal{{ $loop->index }}">
                                                                Lihat saran
                                                            </button>
                                                            <div class="modal fade" id="saranModal{{ $loop->index }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="saranModalLabel{{ $loop->index }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="saranModalLabel{{ $loop->index }}">
                                                                                Detail Saran</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            {{ $detail->saran }}
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-outline-primary"
                                                                                data-dismiss="modal">Tutup</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <a href="/ticket" class="btn btn-primary">
                                                <i class="fas fa-mail-reply mr-2"></i> &nbsp; Kembali
                                            </a>
                                            @if ($ticket->status === 'Resolved')
                                            <a href="{{ route('ticket.finished', ['ticket_id' => $ticket->id]) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-check mr-2"></i>Finished
                                            </a>
                                            @elseif ($ticket->status === 'Onprocess')
                                            <a href="{{ route('ticket.resolve', $ticket->id) }}" class="btn btn-primary">
                                                <i class="fas fa-check mr-2"></i> Selesai
                                            </a>
                                            @else
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
