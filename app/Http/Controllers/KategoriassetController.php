<?php

namespace App\Http\Controllers;

use App\Models\Kategoriasset;
use Illuminate\Http\Request;

class KategoriassetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriasset = Kategoriasset::all();
        return view('home.kategoriasset.index',compact('kategoriasset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriasset = Kategoriasset::all();
        return view('home.kategoriasset.create',compact('kategoriasset'));
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
            'nama_kategori' => 'required|unique:kategoriassets,nama_kategori',
        ],[
            'nama_kategori.required' => 'Kolom tidak boleh kosong!',
            'nama_kategori.unique' => 'Nama kategori sudah ada. Harap ganti!',
        ]);

       $kategoriasset = Kategoriasset::create([
            'nama_kategori' => $request->nama_kategori,
       ]);

       if($kategoriasset){
        return redirect('/kategoriasset')->with('success','Data berhasil disimpan!');
       }

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
        $kategoriasset = Kategoriasset::find($id);
        return view('home.kategoriasset.edit',compact('kategoriasset'));
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
        $kategoriasset = Kategoriasset::find($id);
        $kategoriasset->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect('/kategoriasset')->with('success','Data berhasil diperbarui');
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
