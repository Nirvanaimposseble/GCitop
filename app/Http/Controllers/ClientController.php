<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = Client::all();
        return view('home.client.index',compact('client'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $client = Client::all();
        return view('home.client.create',compact('client'));
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
        'nik'           => 'required|string|unique:clients|max:8',
        'nama'          => 'required|string|max:50',
        'posisi_id'     => 'required',
        'lokasi_id'     => 'required',
        'telp'          => 'required|string',
        'ip_address'    => 'required|string|ip|unique:clients',
    ], [
        'nik.required'      => 'Kolom tidak boleh kosong!',
        'nik.string'        => 'NIK harus berupa angka!',
        'nik.unique'        => 'NIK sudah terdaftar!',
        'nik.max'           => 'NIK maksimal 8 karakter!',
        'nama.required'     => 'Kolom tidak boleh kosong!',
        'nama.string'       => 'Nama harus berupa huruf!',
        'nama.max'          => 'Nama maksimal 50 karakter!',
        'posisi_id.required'=> 'Kolom tidak boleh kosong!',
        'lokasi_id.required'=> 'Kolom tidak boleh kosong!',
        'telp.required'     => 'Kolom tidak boleh kosong!',
        'telp.string'       => 'Nomor harus berupa angka!',
        'ip_address.required'=> 'Kolom tidak boleh kosong!',
        'ip_address.ip'     => 'IP tidak valid!',
        'ip_address.unique' => 'IP sudah terdaftar!',
    ]);

    Client::create([
        'nik'           => $request->nik,
        'nama'          => $request->nama,
        'posisi_id'     => $request->posisi_id,
        'lokasi_id'     => $request->lokasi_id,
        'telp'          => $request->telp,
        'ip_address'    => $request->ip_address,
    ]);

    return redirect('/client')->with('success', 'Data berhasil disimpan');
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
        $client  = Client::find($id);
        return view('home.client.edit',compact('client'));
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
        $client = Client::find($id);
        $client->update([
            'nik'                   =>$request->nik,
            'nama'                  =>$request->nama,
            'posisi_id'             =>$request->posisi_id,
            'lokasi_id'             =>$request->lokasi_id,
            'telp'                  =>$request->telp,
            'ip_address'            =>$request->ip_address,

        ]);
        return redirect('/client')->with('success','Data berhasil diperbarui');
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
