<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        return view('home.lokasi.index',compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokasi = Lokasi::all();
        return view('home.lokasi.create',compact('lokasi'));
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
            'nama_lokasi' => 'required',
            'wilayah' => 'required',
            'regional' => 'required',
            'area' => 'required',
        ],[
            'nama_lokasi.required' => 'Kolom nama lokasi tidak boleh kosong!',
            'wilayah.required' => 'Kolom wilayah tidak boleh kosong!',
            'regional.required' => 'Kolom regional tidak boleh kosong!',
            'area.required' => 'Kolom area tidak boleh kosong!',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
            'wilayah' => $request->wilayah,
            'regional' => $request->regional,
            'area' => $request->area,
        ]);
        return redirect('/lokasi')->with('success','Data berhasil disimpan!');
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
        $lokasi = Lokasi::find($id);
        return view('home.lokasi.edit',compact('lokasi'));
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
        $lokasi = Lokasi::find($id);
        $lokasi->update([
            'nama_lokasi' => $request->nama_lokasi,
            'wilayah' => $request->wilayah,
            'regional' => $request->regional,
            'area' => $request->area,
        ]);
        return redirect('/lokasi')->with('success','Data berhasil diperbarui');
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
