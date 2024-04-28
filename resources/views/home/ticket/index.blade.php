@extends('layouts.master')
@section('title', 'List Data Ticket')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-header bg-white">
                                    <h4 class="card-title">List Data Ticket</h4>
                                    <a href="{{ route('ticket.create') }}" class="btn btn-primary">Tambah Data</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive pt-3">
                                        <table id="order-listing" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nomor Ticket</th>
                                                    <th>Kendala</th>
                                                    <th>Dibuat Pada</th>
                                                    <th>Status Ticket</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($ticket as $ticket)
                                                    <tr>
                                                        <td>{{ $ticket->no_ticket }}</td>
                                                        <td>{{ $ticket->kendala }}</td>
                                                        <td>{{ $ticket->created_at }}</td>
                                                        <td>Completed</td>
                                                        <td>{{ $ticket->status }}</td>
                                                        <td>
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-outline-primary dropdown-toggle p-3"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    Opsi lain
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    @cannot($ticket)
                                                                        @if (auth()->user()->role === 'Service Desk')
                                                                            @if ($ticket->status === 'Pending')
                                                                                <a class="dropdown-item"
                                                                                    href="/detailticket/{{ $ticket->id }}/lanjut">
                                                                                    <i
                                                                                        class="fas fa-pencil-square-o mr-2"></i>Lanjutkan
                                                                                </a>
                                                                                <a class="dropdown-item" href="/detail_ticket/{{$ticket->id}}/assign">
                                                                                    <i
                                                                                        class="fas fa-share-square-o mr-2"></i>assign
                                                                                </a>
                                                                            @elseif($ticket->status === 'Created')
                                                                                <a class="dropdown-item"
                                                                                    href="/detailticket/create/{{ $ticket->id }}">
                                                                                    <i class="fas fa-share mr-2"></i>tangani
                                                                                </a>

                                                                                <a class="dropdown-item"
                                                                                    href="{{ route('ticket.edit', $ticket->id) }}">
                                                                                    <i
                                                                                        class="fas fa-pencil-square-o mr-2"></i>perbarui
                                                                                </a>

                                                                                <a class="dropdown-item" href="/detail_ticket/{{$ticket->id}}/assign">
                                                                                    <i
                                                                                        class="fas fa-share-square-o mr-2"></i>assign
                                                                                </a>

                                                                                <a href="" class="dropdown-item">
                                                                                    <i class="fas fa-trash-o mr-2"></i>hapus
                                                                                </a>
                                                                                <a href="/detailticket/{{ $ticket->id }}/show"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fas fa-file-text-o mr-2"></i>Detail
                                                                                    ticket
                                                                                </a>
                                                                            @elseif($ticket->status === 'Onprocess')
                                                                                <a class="dropdown-item" href="{{ route('detailticket.lanjut2', ['ticket_id' => $ticket->id]) }}">
                                                                                    <i class="fas fa-pencil-square-o mr-2"></i>Lanjutkan
                                                                                </a>
                                                                                <a href="/detailticket/{{ $ticket->id }}/show"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fas fa-file-text-o mr-2"></i>Detail
                                                                                    ticket
                                                                                </a>
                                                                            @elseif($ticket->status === 'Finished' || 'Ressolved')
                                                                                <a href="/detailticket/{{ $ticket->id }}/show"
                                                                                    class="dropdown-item">
                                                                                    <i
                                                                                        class="fas fa-file-text-o mr-2"></i>Detail
                                                                                    ticket
                                                                                </a>
                                                                            @else()
                                                                                <a class="dropdown-item"
                                                                                    href="/detailticket/{{ $ticket->id }}/lanjut">
                                                                                    <i
                                                                                        class="fas fa-pencil-square-o mr-2"></i>Lanjutkan
                                                                                </a>
                                                                            @endif
                                                                        @endif
                                                                    @endcannot
                                                                    @cannot($ticket)
                                                                        @if (Auth()->User()->role === 'Client')
                                                                            <a href="/detailticket/{{ $ticket->id }}/show"
                                                                                class="dropdown-item">
                                                                                <i class="fas fa-file-text-o mr-2"></i>Detail
                                                                                ticket
                                                                            </a>
                                                                        @endif
                                                                    @endcannot
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5">Tidak ada data ticket.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
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
