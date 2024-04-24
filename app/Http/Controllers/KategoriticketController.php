<?php

namespace App\Http\Controllers;

use App\Models\Kategoriticket;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class KategoriticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoriticket = Kategoriticket::all();
        return view('home.kategoriticket.index',compact('kategoriticket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriticket = Kategoriticket::all();
        return view('home.kategoriticket.create',compact('kategoriticket'));
    }

    public function getSubcategories(Request $request)
    {
        $kategoriId = $request->kategoriId;
        $subcategories = Subkategori::where('kategoriticket_id', $kategoriId)->pluck('nama_subkategori', 'id');
        return response()->json($subcategories);
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
            'kategoritiket' => 'required|unique:kategoritickets|string'
        ], [
            'kategoritiket.required' => 'Kolom tidak boleh kosong!',
            'kategoritiket.unique'   => 'Kategori sudah ada!',
            'kategoritiket.string'   => 'Kategori harus berupa teks'
        ]);

        Kategoriticket::create([
            'kategoritiket' => $request->kategoritiket,
        ]);

        return redirect('/kategoriticket')->with('success','Data telah disimpan');
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
        $kategoriticket = Kategoriticket::find($id);
        return view('home.kategoriticket.edit',compact('kategoriticket'));
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
        $kategoriticket = Kategoriticket::find($id);
        $kategoriticket->update([
            'kategoritiket' => $request->kategoritiket,
        ]);
        return redirect('/kategoriticket')->with('success','Data berhasil diberbarui');
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
