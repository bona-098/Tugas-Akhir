<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sers = Servis::get();
        return view('admin.servis', compact('sers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.servis');
    }

    public function usercreate()
    {
        return view('user.servis');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nomor = 2;
        $kepengurusan = Servis::where('id', $nomor)->pluck('id');

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('servis/foto'), $newNameFoto);

        Servis::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'foto'=>$newNameFoto

        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    public function userstore(Request $request)
    {
        // $nomor = 2;
        // $kepengurusan = Servis::where('id', $nomor)->pluck('id');

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        // dd($request);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('servis/foto'), $newNameFoto);

        Servis::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'foto'=>$newNameFoto

        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function show(Servis $servis)
    {
        $servis = Servis::where('id', $servis)->get();
        return view('admin.servis', compact('servis'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function edit(Servis $servis)
    {

        $serv = Servis::get();
        return view('admin.servisedit', compact('serv'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servis $servis)
    {

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        $service = $request->all();

        if ($foto = $request->file('foto')) {
            File::delete('servis/foto/'.$servis->foto);
            $destinationPath = 'servis/foto/';
            $profileFoto = date('Ymd'). '-' . $request->nama . '.' . $request->foto->extension();
            $foto->move($destinationPath, $profileFoto);
            $service['foto'] = "$profileFoto";
        }else{
            unset($servis['foto']);
        }

        $servis->update($service);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servis  $servis
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servis $servis)
    {
        // $karyawan = Karyawan::find($karyawan);
        $servis->delete();
        File::delete('servis/foto'.$servis->foto);

        return redirect()->back();
    }
}
