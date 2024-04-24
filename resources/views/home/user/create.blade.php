@extends('layouts.master')
@section('title','Tambah data user')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Halaman Tambah Data</h4>
                    <p class="card-description">
                        Personal info
                    </p>
                    <form action="{{ route('user.store') }}" method="POST" class="forms-sample">
                        @csrf
                        <div class="form-group">
                            <label class="form-label">Nomor Induk</label>
                            <input type="text"
                                name="nik"
                                class="form-control @error('nik') is-invalid @enderror"
                                value="{{ old('nik') }}"
                                placeholder="Masukan"
                            />
                            @error('nik')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama User</label>
                            <input type="text"
                                name="nama"
                                class="form-control @error('nama') is-invalid @enderror"
                                value="{{ old('nama') }}"
                                placeholder="Masukan"
                            />
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Posisi</label>
                            <input type="text"
                                name="posisi_id"
                                class="form-control @error('posisi_id') is-invalid @enderror"
                                value="{{ old('posisi_id') }}"
                                placeholder="Masukan"
                            />
                            @error('posisi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <select name="lokasi_id" class="form-control">
                                <option value="" selected disabled>Choose...</option>
                                @foreach ($lokasi as $lok)
                                    <option value="{{$lok->id}}">{{$lok->nama_lokasi}}</option>
                                @endforeach
                            </select>
                            @error('lokasi_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password"
                                autocomplete="new-password"
                                placeholder="Masukan"
                                value="{{ old('password') }}"
                            />
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telp" class="form-label">Telp / Ext</label>
                            <input type="text"
                                id="telp"
                                class="form-control @error('telp') is-invalid @enderror"
                                name="telp"
                                placeholder="Masukan"
                                value="{{ old('telp') }}"
                            />
                            @error('telp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="ip_address" class="form-label">IP Address</label>
                            <input type="text"
                                id="ip_address"
                                class="form-control @error('ip_address') is-invalid @enderror"
                                name="ip_address"
                                placeholder="Masukan"
                                value="{{ old('ip_address') }}"
                            />
                            @error('ip_address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="" disabled selected>Choose..</option>
                                @php
                                    $roles = ['Client', 'Service Desk', 'Agent'];
                                    $selectedRole = old('role');
                                @endphp
                                @foreach ($roles as $role)
                                    <option value="{{$role}}" @if ($selectedRole == $role) selected @endif>
                                        {{$role}}
                                        @if ($selectedRole == $role)@endif
                                    </option>
                                @endforeach
                            </select>
                            @error('role')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                        <a href="{{ route('user.index') }}" class=" btn btn-light">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
