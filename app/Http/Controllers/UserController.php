<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function construct()
    {
        $this->middleware(CheckRole::class . ':Client|Service Desk|Agent');
    }

    public function index()
    {
        $user = User::all();
        return view('home.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        $lokasi = Lokasi::all();
        return view('home.user.create', compact('user', 'lokasi'));
    }
    public function password()
    {
        return view('home.user.password');
    }
    public function passwordChange(Request $request)
    {
        $id = Auth()->User()->id;
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
            // 'new_password_confirmation' => 'confirmed'
        ], [
            'old_password.required' => 'password lama tidak boleh kosong',
            'new_password.required' => 'password baru tidak boleh kosong',
            // 'new_password_confirmation.confirmed' => 'password baru tidak valid',
            'new_password.confirmed' => 'password baru tidak valid',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Periksa apakah password lama cocok
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Old password is incorrect');
        }

        // Update password baru
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect('/admin/dashboard')->with('update', 'Password has been changed successfully');
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
            'nik'         => 'required|string|unique:users|max:8',
            'nama'        => 'required|string|max:50',
            'posisi_id'   => 'required',
            'lokasi_id'   => 'required',
            'password'    => ['required', 'min:8'],
            'telp'        => 'required|string|max:20',
            'ip_address'  => 'required|ip|unique:users',
            'role'        => 'required|',
        ], [
            'nik.required'       => 'Kolom tidak boleh kosong!',
            'nik.string'         => 'NIK harus berupa teks!',
            'nik.unique'         => 'NIK sudah ada!',
            'nik.max'            => 'Kolom melebihi batas maksimal!',
            'nama.required'      => 'Kolom tidak boleh kosong!',
            'nama.max'           => 'Kolom melebihi batas maksimal!',
            'posisi_id.required' => 'Kolom tidak boleh kosong!',
            'lokasi_id.required' => 'Kolom tidak boleh kosong!',
            'password.required'  => 'Kolom password tidak boleh kosong!',
            'password.min'       => 'Kolom password minimal harus 8 karakter!',
            'telp.required'      => 'Kolom telp tidak boleh kosong',
            'telp.max'           => 'Kolom telp melebihi batas maksimal!',
            'ip_address.required' => 'Kolom IP tidak boleh kosong!',
            'ip_address.ip'      => 'Format IP tidak valid!',
            'ip_address.unique'  => 'IP sudah digunakan!',
            'role.required'      => 'Kolom role tidak boleh kosong!',
        ]);

        $user = User::create([
            'nik'         => $request->nik,
            'nama'        => $request->nama,
            'lokasi_id'   => $request->lokasi_id,
            'posisi_id'   => $request->posisi_id,
            'password'    => bcrypt($request->password),
            'telp'        => $request->telp,
            'ip_address'  => $request->ip_address,
            'role'        => $request->role,
        ]);

        if ($user) {
            if ($request->role === 'Client') {
                Client::create([
                    'nik'         => $request->nik,
                    'nama'        => $request->nama,
                    'posisi_id'   => $request->posisi_id,
                    'lokasi_id'   => $request->lokasi_id,
                    'telp'        => $request->telp,
                    'ip_address'  => $request->ip_address,
                ]);
            } elseif ($request->role === 'Service Desk') {
            }

            return redirect('/user')->with('success', 'Data berhasil disimpan!');
        }

        return redirect('/user')->with('error', 'Gagal menyimpan data!');
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
        $user = User::find($id);
        $lokasi = Lokasi::all();
        return view('home.user.edit', compact('user', 'lokasi'));
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
        $user = User::find($id);
        $user->update([
            'nik'               => $request->nik,
            'nama'              => $request->nama,
            'lokasi_id'         => $request->lokasi_id,
            'posisi_id'         => $request->posisi_id,
            'password'          => bcrypt($request->password),
            'telp'              => $request->telp,
            'ip_address'        => $request->ip_address,
            'role'              => $request->role,
        ]);
        return redirect('/user')->with('success', 'Data berhasil diperbarui');
        if ($user) {
            if ($request->role === 'Client') {
                Client::where('user_id', $id)->update([
                    'nik'         => $request->nik,
                    'nama'        => $request->nama,
                    'posisi_id'   => $request->posisi_id,
                    'lokasi_id'   => $request->lokasi_id,
                    'telp'        => $request->telp,
                    'ip_address'  => $request->ip_address,
                ]);
            } elseif ($request->role === 'Service Desk') {
                // Lakukan tindakan lain jika diperlukan untuk Service Desk
            }

            return redirect('/user')->with('success', 'Data berhasil disimpan!');
        }
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
    public function profile()
    {
        $id = Auth()->User()->id;
        $user = User::find($id);
        return view('home.user.profile', compact('user'));
    }
}
