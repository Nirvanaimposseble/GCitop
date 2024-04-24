<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Detailticket;
use App\Models\Ticket;
use App\Models\Client;
use App\Models\Kategoriticket;
use App\Models\Subkategori;
use Illuminate\Http\Request;

class DetailticketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $client = Client::findOrFail($ticket->client_id);
        $asset = Asset::findOrFail($ticket->asset_id);
        $detailticket = Detailticket::where('ticket_id', $ticket_id)->get();

        return view('home.detailticket.index', compact('detailticket', 'client', 'ticket', 'asset'));
    }
    public function assign($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->update([
            'status' => 'Assign'
        ]);
        return redirect()->back()->with('success','data berhasil di assign!');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $ticket = Ticket::where('id', $id)->first();
        $client = Client::where('id', $ticket->client_id)->first();
        $asset = Asset::where('id', $ticket->asset_id)->first();
        $detailtickets = Detailticket::where('ticket_id', $id)->get();

        $kategoriticket = Kategoriticket::all();
        $subkategori = Subkategori::all();

        $ticket->update([
            'status' => 'Onprocess'
        ]);

        return view('home.detailticket.create', [
            'client' => $client,
            'asset' => $asset,
            'ticket' => $ticket,
            'detailticket' => $detailtickets,
            'kategoriticket' => $kategoriticket,
            'subkategori' => $subkategori,
        ]);
    }

    public function Lanjut2($id)
    {
        $ticket = Ticket::where('id', $id)->first();
        $client = Client::where('id', $ticket->client_id)->first();
        $asset = Asset::where('id', $ticket->asset_id)->first();
        $detailtickets = Detailticket::where('ticket_id', $id)->get();

        $kategoriticket = Kategoriticket::all();
        $subkategori = Subkategori::all();

        $ticket->update([
            'status' => 'Onprocess'
        ]);

        return view('home.detailticket.create', [
            'client' => $client,
            'asset' => $asset,
            'ticket' => $ticket,
            'detailticket' => $detailtickets,
            'kategoriticket' => $kategoriticket,
            'subkategori' => $subkategori,
        ]);
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
            'kkategoriticket' => 'required',
            'biaya' => 'required|numeric',
            'ssubkategori' => 'required',
            'saran' => 'required|string|max:255',
            'jenis' => 'required',
        ],[
            'kkategoriticket.required' => 'Kategori ticket tidak boleh kosong!',
            'biaya.required' => 'Biaya tidak boleh kosong!',
            'saran.required' => 'Saran tidak boleh kosong!',
            'saran.max' => 'Saran maksimal 255 karakter!',
            'jenis.required' => 'Jenis tidak boleh kosong!',
        ]);

        $ticket_id = $request->ticket_id;

        $detail = Ticket::findOrFail($ticket_id);

        Detailticket::create([
            'ticket_id' => $ticket_id,
            'kkategoriticket' => $request->kkategoriticket,
            'biaya' => $request->biaya,
            'ssubkategori' => $request->ssubkategori,
            'saran' => $request->saran,
            'jenis' => $request->jenis,
        ]);

        $detail->update([
            'status' => 'Onprocess'
        ]);

        return redirect('/detailticket/'.$ticket_id)->with('success','Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $client = Client::findOrFail($ticket->client_id);
        $asset = Asset::findOrFail($ticket->asset_id);
        $detailticket = Detailticket::where('ticket_id', $ticket_id)->get();

        return view('home.detailticket.show', compact('detailticket', 'client', 'ticket', 'asset'));
    }


    public function Lanjut($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $client = Client::findOrFail($ticket->client_id);
        $asset = Asset::findOrFail($ticket->asset_id);
        $detailticket = Detailticket::where('ticket_id', $ticket_id)->get();

        return view('home.detailticket.index', compact('detailticket', 'client', 'ticket', 'asset'));
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
