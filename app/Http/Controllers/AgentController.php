<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = Agent::all();
        return view('home.agent.index',compact('agent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent = Agent::all();
        return view('home.agent.create',compact('agent'));
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
            'nik' => 'required|string',
            'nama' => 'required|string',
            'divisi' => 'required|string',
            'status' => 'required|string',
        ],[
            'nik.required' => 'Nomor Induk wajib diisi.',
            'nama.required' => 'Nama wajib diisi.',
            'divisi.required' => 'Divisi wajib dipilih.',
            'status.required' => 'Status wajib dipilih.',
        ]);

        $agent = new Agent();
        $agent->nik = $request->nik;
        $agent->nama = $request->nama;
        $agent->divisi = $request->divisi;
        $agent->status = $request->status;
        $agent->save();

        return redirect()->route('agent.index')->with('success', 'Data berhasil disimpan.');
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
        //
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
        //
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
