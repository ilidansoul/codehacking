<?php

namespace App\Http\Controllers;

use App\Http\Requests\PenggunaRequest;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;
use App\Http\Requests;


class AdminPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengguna = User::all();

        return view ('admin.pengguna.index', compact('pengguna'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $peran = Role::all();
        return view ('admin.pengguna.buat', compact('peran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PenggunaRequest $request)
    {
        $fotoId = "";
        if($foto = $request->file('file'))
        {
            $namaFoto = time() . $foto->getClientOriginalName();
            $foto->move('fotodirektori', $namaFoto);
            $fotoId = Photo::create(['lokasi_file'=>$namaFoto]);
            $fotoId = $fotoId->id;
        }

        User::create([
            'name'=> $request->nama,
            'role_id'=> $request->peran,
            'email' => $request->email,
            'is_active' => $request->status,
            'password' => bcrypt($request->katasandi),
            'foto_id' => $fotoId->id
        ]);


        return redirect('admin/pengguna');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view ('admin.pengguna.tampilkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        $peran = Role::all();
        return view('admin.pengguna.ubah', compact('pengguna', 'peran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PenggunaRequest $request, $id)
    {
        $pengguna = User::findOrFail($id);
        $fotoId = "";
        if($foto = $request->file('file'))
        {
            $namaFoto = time() . $foto->getClientOriginalName();
            $foto->move('fotodirektori', $namaFoto);
            $fotoId = Photo::create(['lokasi_file'=>$namaFoto]);
            $fotoId = $fotoId->id;
        }

        $pengguna->update([
            'name'=> $request->nama,
            'role_id'=> $request->peran,
            'email' => $request->email,
            'is_active' => $request->status,
            'password' => bcrypt($request->katasandi),
            'foto_id' => $fotoId
        ]);
        return redirect('admin/pengguna');
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
