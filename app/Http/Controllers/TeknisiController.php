<?php

namespace App\Http\Controllers;

use App\Models\Teknisi;
use App\Models\service;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class TeknisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Teknisi $teknisi)
    {
        $teknisi = Teknisi::with("user")->get();
        return view('admin.teknisi.index', compact('teknisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::get();
        return view('admin.teknisi.tambah', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'hari' => 'required',
            'user_id' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,img,jpeg|max:50000'
        ]);

        $newNameFoto = date('ymd'). '-' .$request->nim. '.'. $request->foto->extension();

        $request->file('foto')->move(public_path('images/teknisi'), $newNameFoto);

        Teknisi::create([
            'nim' => $request->nim,
            'hari' => $request->hari,
            'user_id' => $request->user_id,
            'no_hp' => $request->no_hp,
            'foto' => $newNameFoto
        ]);
        return redirect()->route('teknisi.index')->with('success', 'Teknisi berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Teknisi $teknisi)
    {
        // dd($teknisi);
        return view('admin.teknisi.edit', compact('teknisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teknisi = Teknisi::find($id);
        return view('admin.teknisi.edit', compact('teknisi'));
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
        $request->validate([]);

        $teknisis = $request->all();

        $teknisi = Teknisi::find($id);

        if ($foto = $request->file('foto')) {
            File::delete('images/teknisi' .$teknisi->foto);
            $file_name = $request->foto->getClientOriginalName();
            $foto->move(public_path('images/teknisi'), $file_name);
            $teknisis['foto'] = "$file_name";
        }else {
            unset($teknisis['foto']);
        }

        $teknisi->update($teknisis);
        return redirect()->route('teknisi.index')->with('success', 'Teknisi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teknisi $teknisi)
    {
        $teknisi->delete();
        File::delete('images/teknisi/'.$teknisi->foto);
        return redirect()->back()->with('success', 'Teknisi berhasil dihapus');
    }
}
