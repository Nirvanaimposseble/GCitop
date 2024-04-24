@extends('layouts.master')
@section('title', 'Data Profile')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div id="profile12" class="card-header bg-white">
                                <h4 class="card-title">Profile Data: {{ auth()->user()->nama }} <i class="mdi mdi-profile"></i></h4>
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <img src="/assets/images/faces/face23.jpg" alt="Profile Picture" class="img-lg rounded">
                                </div>
                                <div>
                                    <a href="{{ route('user.edit', Auth()->user()->id) }}" class="btn btn-primary"><i class="fas fa-pencil-square-o mr-2"></i> Edit Profil</a>
                                    <a href="/password/change" class="btn btn-warning"><i class="fas fa-key mr-2"></i> Change Password</a>
                                </div>
                            </div>
                            <div id="profile12" class="card-body">
                                <div class="col-lg-6">
                                    <dl>
                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>Nomor Induk :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->nik }}</dd></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>Nama :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->nama }}</dd></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>Role user :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->role }}</dd></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>Lokasi :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->lokasi->nama_lokasi }}</dd></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>Posisi :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->posisi_id }}</dd></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-4"><dt>IP Address :</dt></div>
                                            <div class="col-sm-8"><dd>{{ Auth()->user()->ip_address }}</dd></div>
                                        </div>

                                    </dl>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                        </div>
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
