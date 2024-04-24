<?php

namespace App\Http\Controllers;

use App\Models\Kategoriticket;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class SubkategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkategori = Subkategori::all();
        return view('home.subkategori.index',compact('subkategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriticket = Kategoriticket::all();
        $subkategori = Subkategori::all();
        return view('home.subkategori.create',compact('subkategori','kategoriticket'));
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
             'nama_subkategori' => 'required|unique:subkategoris',
             'kategoriticket_id' => 'required',
        ], [
             'nama_subkategori.required' => 'Nama subkategori harus diisi.',
             'nama_subkategori.unique' => 'Nama subkategori sudah ada.',
             'kategoriticket_id.required' => 'Kategori ticket harus dipilih.',
        ]);

        Subkategori::create([
            'nama_subkategori' => $request->nama_subkategori,
            'kategoriticket_id' => $request->kategoriticket_id,
        ]);

        return redirect('/subkategori')->with('success', 'Data berhasil disimpan!');
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
        $subkategori = Subkategori::find($id);
        $kategoriticket = Kategoriticket::all();
        return view('home.subkategori.edit',compact('subkategori','kategoriticket'));
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
        $subkategori = Subkategori::find($id);
        $subkategori->update([
            'nama_subkategori' => $request->nama_subkategori,
            'kategoriticket_id' => $request->kategoriticket_id,
        ]);
        return redirect('/subkategori')->with('success','Data berhasil diperbarui!');
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
