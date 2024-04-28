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
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fas fa-mail-forward mr-2"></i> Assign
                                            </button>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Assign</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p class="font-center">List data agent</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <a href="/ticket" class="btn btn-primary"><i
                                                                    class="fas fa-paper-plane mr-2"></i> Kirim</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#pendingModal">
                                                <i class="fas fa-sign-out-alt mr-2"></i> Pending
                                            </button>
                                            <div class="modal fade" id="pendingModal" tabindex="-1" role="dialog"
                                                aria-labelledby="pendingModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/pending/post" method="post">
                                                                <div class="form-group">
                                                                    <label for="pendingTextarea"
                                                                        class="left-align-label">Alasan pending :</label>
                                                                    <textarea class="form-control left-align-textarea" id="pendingTextarea" rows="5"></textarea>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-outline-primary"
                                                                data-dismiss="modal">Tutup</button>
                                                            <a href="{{ route('ticket.pending', $ticket->id) }}"
                                                                class="btn btn-primary"><i
                                                                    class="fas fa-paper-plane-o mr-2"></i> Kirim</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="{{ route('ticket.resolve', $ticket->id) }}" class="btn btn-primary">
                                                <i class="fas fa-check mr-2"></i> Selesai
                                            </a>
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
