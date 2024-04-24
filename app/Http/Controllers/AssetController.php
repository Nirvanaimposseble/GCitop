<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Kategoriasset;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asset = Asset::all();
        return view('home.asset.index',compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asset = Asset::all();
        $lokasi = Lokasi::all();
        $kategoriasset = Kategoriasset::all();
        return view('home.asset.create',compact('asset','kategoriasset','lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_asset'                   => ['required','unique:assets,no_asset','string','max:50'],
            'nama_barang'                => ['required', 'string', 'max:50'],
            'kategoriasset_id'           => ['required', 'exists:kategoriassets,id'],
            'lokasi_id'                  => ['required', 'exists:lokasis,id'],
            'no_serial'                  => ['required', 'unique:assets,no_serial'],
            'merk'                       => ['required'],
            'model'                      => ['required'],
        ], [
            'no_asset.required'          => 'No Asset wajib diisi!.',
            'no_asset.unique'            => 'No Asset sudah ada!.',
            'no_asset.max'               => 'Nomor melebihi maksimal !.',
            'nama_barang.required'       => 'Nama Barang wajib diisi!.',
            'nama_barang.string'         => 'Nama Barang harus berupa teks!.',
            'nama_barang.max'            => 'Nama Barang Maksimal 50 Karakter!.',
            'lokasi_id.required'         => 'Column wajib diisi!',
            'lokasi_id.exists'           => 'Lokasi tidak valid!',
            'kategoriasset_id.required'  => 'Column wajib dipilih!.',
            'kategoriasset_id.exists'    => 'Kategori Asset tidak valid!.',
            'no_serial.required'         => 'No Serial wajib diisi!.',
            'no_serial.unique'           => 'No Serial sudah ada.!',
            'merk.required'              => 'Merk wajib diisi!.',
            'model.required'             => 'Model wajib diisi!.',
        ]);

        Asset::create([
            'no_asset'                  => $request->no_asset,
            'nama_barang'               => $request->nama_barang,
            'kategoriasset_id'          => $request->kategoriasset_id,
            'lokasi_id'                 => $request->lokasi_id,
            'no_serial'                 => $request->no_serial,
            'merk'                      => $request->merk,
            'model'                     => $request->model,
        ]);

        return redirect('/asset')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asset = Asset::find($id);
        $lokasi = Lokasi::all();
        $kategoriasset = Kategoriasset::all();
        return view('home.asset.edit',compact('asset','kategoriasset','lokasi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);
        $asset->update([
            'no_asset'                  => $request->no_asset,
            'nama_barang'               => $request->nama_barang,
            'kategoriasset_id'          => $request->kategoriasset_id,
            'lokasi_id'                 => $request->lokasi_id,
            'no_serial'                 => $request->no_serial,
            'merk'                      => $request->merk,
            'model'                     => $request->model,
        ]);
        return redirect('/asset')->with('success','Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
