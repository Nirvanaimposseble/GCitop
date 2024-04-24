@extends('layouts.master')
@section('title', 'List Data Kategori Ticket')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch">
                        <div class="card">
                            <div class="card-header bg-white">
                                <h4 class="card-title">List Data Kategori Ticket</h4>
                                <a href="{{ route('kategoriticket.create') }}" class="btn btn-primary">Tambah Data</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive pt-3">
                                    <table id="order-listing" class="table">
                                        <thead>
                                            <tr>
                                                <th>Kategori Ticket</th>
                                                <th>Dibuat pada</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kategoriticket as $kt)
                                                <tr>
                                                    <td>{{ $kt->kategoritiket }}</td>
                                                    <td>{{ $kt->created_at }}</td>
                                                    <td>
                                                        <a href="{{route('kategoriticket.edit',$kt->id)}}" class="btn btn-outline-primary p-3">Perbarui</a>
                                                    </td>
                                                </tr>
                                            @endforeach
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
