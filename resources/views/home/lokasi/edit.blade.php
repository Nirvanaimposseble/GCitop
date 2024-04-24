@extends('layouts.master')
@section('layouts','Halaman Edit data')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Halaman Edit data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('lokasi.update',['lokasi' =>$lokasi->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <p class="card-description">
                                    Personal info
                                </p>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Nama Lokasi</label>
                                            <div class="col-sm-8">
                                                <input type="text"
                                                    name="nama_lokasi" value="{{$lokasi->nama_lokasi}}"
                                                    class="form-control @error('nama_lokasi') is-invalid @enderror"
                                                    placeholder="Masukan"
                                                    value="{{ old('nama_lokasi') }}"
                                                />
                                                @error('nama_lokasi')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Wilayah</label>
                                            <div class="col-sm-8">
                                                <select name="wilayah" class="form-control @error('wilayah') is-invalid @enderror">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Distribution Center">Distribution Center</option>
                                                    <option value="Head Office">Head Office</option>
                                                    <option value="Wilayah 1">Wilayah 1</option>
                                                    <option value="Wilayah 2">Wilayah 2</option>
                                                    <option value="Wilayah 3">Wilayah 3</option>
                                                    <option value="Wilayah 4">Wilayah 4</option>
                                                    <option value="Wilayah 5">Wilayah 5</option>
                                                    <option value="Wilayah 6">Wilayah 6</option>
                                                    <option value="Wilayah 7">Wilayah 7</option>
                                                    <option value="Wilayah 8">Wilayah 8</option>
                                                    <option value="Wilayah 9">Wilayah 9</option>
                                                    <option value="Wilayah 10">Wilayah 10</option>
                                                    <option value="Wilayah 11">Wilayah 11</option>
                                                    <option value="Wilayah 12">Wilayah 12</option>
                                                    <option value="Wilayah 13">Wilayah 13</option>
                                                    <option value="Wilayah 14">Wilayah 14</option>
                                                    <option value="Wilayah 15">Wilayah 15</option>
                                                    <option value="Wilayah 16">Wilayah 16</option>
                                                    <option value="Wilayah 17">Wilayah 17</option>
                                                    <option value="Wilayah 18">Wilayah 18</option>
                                                    <option value="Wilayah 19">Wilayah 19</option>
                                                    <option value="Wilayah 20">Wilayah 20</option>
                                                    <option value="Wilayah 21">Wilayah 21</option>
                                                    <option value="Wilayah 22">Wilayah 22</option>
                                                    <option value="Wilayah 23">Wilayah 23</option>
                                                    <option value="Wilayah 24">Wilayah 24</option>
                                                    <option value="Wilayah 25">Wilayah 25</option>
                                                    <option value="Wilayah 26">Wilayah 26</option>
                                                    <option value="Wilayah 27">Wilayah 27</option>
                                                    <option value="Wilayah 28">Wilayah 28</option>
                                                    <option value="Wilayah 29">Wilayah 29</option>
                                                    <option value="Wilayah 30">Wilayah 30</option>
                                                    <option value="Wilayah 31">Wilayah 31</option>
                                                    <option value="Wilayah 32">Wilayah 32</option>
                                                    <option value="Wilayah 33">Wilayah 33</option>
                                                    <option value="Wilayah 34">Wilayah 34</option>
                                                    <option value="Wilayah 35">Wilayah 35</option>
                                                    <option value="Wilayah 36">Wilayah 36</option>
                                                    <option value="Wilayah 37">Wilayah 37</option>
                                                    <option value="Wilayah 38">Wilayah 38</option>
                                                    <option value="Wilayah 39">Wilayah 39</option>
                                                    <option value="Wilayah 40">Wilayah 40</option>
                                                    <option value="Wilayah 41">Wilayah 41</option>
                                                    <option value="Wilayah 42">Wilayah 42</option>
                                                    <option value="Wilayah 43">Wilayah 43</option>
                                                    <option value="Wilayah 44">Wilayah 44</option>
                                                    <option value="Wilayah 45">Wilayah 45</option>
                                                    <option value="Wilayah 46">Wilayah 46</option>
                                                    <option value="Wilayah 47">Wilayah 47</option>
                                                    <option value="Wilayah 48">Wilayah 48</option>
                                                    <option value="Wilayah 49">Wilayah 49</option>
                                                    <option value="Wilayah 50">Wilayah 50</option>
                                                    <option value="Wilayah 51">Wilayah 51</option>
                                                    <option value="Wilayah 52">Wilayah 52</option>
                                                    <option value="Wilayah 53">Wilayah 53</option>
                                                    <option value="Wilayah 54">Wilayah 54</option>
                                                    <option value="Wilayah 55">Wilayah 55</option>
                                                    <option value="Wilayah 56">Wilayah 56</option>
                                                    <option value="Wilayah 57">Wilayah 57</option>
                                                    <option value="Wilayah 58">Wilayah 58</option>
                                                    <option value="Wilayah 59">Wilayah 59</option>
                                                    <option value="Wilayah 60">Wilayah 60</option>
                                                </select>
                                                @error('wilayah')
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
                                            <label class="col-sm-4 col-form-label">Regional</label>
                                            <div class="col-sm-8">
                                                <select name="regional" class="form-control @error('regional') is-invalid @enderror">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Distributin Center">Distribution Center</option>
                                                    <option value="Head Office">Head Office</option>
                                                    <option value="Regional A">Regional A</option>
                                                    <option value="Regional B">Regional B</option>
                                                    <option value="Regional C">Regional C</option>
                                                    <option value="Regional D">Regional D</option>
                                                    <option value="Regional E">Regional E</option>
                                                    <option value="Regional F">Regional F</option>
                                                </select>
                                                @error('regional')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Area</label>
                                            <div class="col-sm-8">
                                                <select name="area" class="form-control @error('area') is-invalid @enderror">
                                                    <option selected disabled value="">Choose...</option>
                                                    <option value="Distribution Center">Distribution Center</option>
                                                    <option value="Head Office">Head Office</option>
                                                    <option value="Area 1">Area 1</option>
                                                    <option value="Area 2">Area 2</option>
                                                </select>
                                                @error('area')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                    <a href="{{ route('lokasi.index') }}" type="button" class="btn btn-light">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
