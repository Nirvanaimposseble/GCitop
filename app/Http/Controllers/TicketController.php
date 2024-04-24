<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Client;
use App\Models\Lokasi;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth()->User()->role === 'Agent') {

            $ticket = Ticket::where('status','=','Assign')->get();
            return view('home.ticket.index', compact('ticket'));
        } elseif(Auth()->User()->role === 'Service Desk') {
            $ticket = Ticket::all();
            return view('home.ticket.index', compact('ticket'));

        }
        else{
            $client = Client::where('nik','=',Auth()->User()->nik)->first();
            $ticket = Ticket::where('client_id',$client->id)->get();
            return view('home.ticket.index',compact('ticket'));
        }
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
        $client = Client::all();
        $ticket = Ticket::all();
        return view('home.ticket.create', compact('ticket', 'client', 'asset', 'lokasi'));
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
            'kendala'         => 'required|string|max:50',
            'detail_kendala'  => 'required|string|max:50',
            'lokasi_id'       => 'required|exists:lokasi,id',
            'lokasi_id'       => 'required',
            'client_id'       => 'required|exists:clients,id',
            'asset_id'        => 'required|exists:assets,id',
            'ticket_for'      => 'required|in:Information Technology,Inventory Control,Manufaktur Engineering,Divisi Sipil',
        ], [
            'kendala.required'          => 'Kolom kendala tidak boleh kosong!',
            'kendala.string'            => 'Kolom kendala harus berupa teks!',
            'kendala.max'               => 'Kolom kendala tidak boleh lebih dari :max karakter!',
            'detail_kendala.required'   => 'Kolom detail kendala tidak boleh kosong!',
            'detail_kendala.string'     => 'Kolom detail kendala harus berupa teks!',
            'detail_kendala.max'        => 'Kolom detail kendala tidak boleh lebih dari :max karakter!',
            'lokasi_id.required'        => 'Kolom lokasi tidak boleh kosong!',
            'lokasi_id.exists'          => 'Lokasi yang dipilih tidak valid!',
            'client_id.required'        => 'Kolom client tidak boleh kosong!',
            'client_id.exists'          => 'Client yang dipilih tidak valid!',
            'asset_id.required'         => 'Kolom asset tidak boleh kosong!',
            'asset_id.exists'           => 'Aset yang dipilih tidak valid!',
            'ticket_for.required'       => 'Kolom tidak boleh kosong!',
            'ticket_for.in'             => 'Pilihan column tidak valid!',
        ]);
        Ticket::create([
            'kendala'                => $request->kendala,
            'detail_kendala'         => $request->detail_kendala,
            'lokasi_id'              => $request->lokasi_id,
            'asset_id'               => $request->asset_id,
            'client_id'              => $request->client_id,
            'status'                 => $request->status,
            'ticket_for'             => $request->ticket_for,
            'role'                   => $request->role,
        ]);

        return redirect('/ticket')->with('success', 'Data berhasil simpan');
    }

    public function resolveTicket($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $ticket->update([
            'status' => 'Resolved'
        ]);
        return redirect()->route('ticket.index')->with('success', 'Ticket berhasil disimpan');
    }

    public function finished($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $ticket->update([
            'status' => 'Finished'
        ]);
        return redirect()->route('ticket.index')->with('success', 'Ticket berhasil di finish');
    }

    public function Pending($ticket_id)
    {
        $ticket = Ticket::findOrFail($ticket_id);
        $ticket->update([
            'status' => 'Pending'
        ]);
        return redirect()->route('ticket.index')->with('danger', 'Berhasil di pending');
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
        $asset = Asset::all();
        $lokasi = Lokasi::all();
        $client = Client::all();
        $ticket = Ticket::find($id);
        return view('home.ticket.edit', compact('ticket', 'client', 'asset', 'lokasi'));
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
        $ticket = Ticket::find($id);
        $ticket->update([
            'kendala'                => $request->kendala,
            'detail_kendala'         => $request->detail_kendala,
            'lokasi_id'              => $request->lokasi_id,
            'asset_id'               => $request->asset_id,
            'client_id'              => $request->client_id,
            'ticket_for'             => $request->ticket_for,
            'role'                   => $request->role,
        ]);
        return redirect('/ticket')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect('/ticket');
    }
}
