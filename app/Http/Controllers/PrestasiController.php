<?php

namespace App\Http\Controllers;

use App\Models\prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $prestasi = Prestasi::get();
        return view('admin.prestasi', compact('prestasi')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prestasitambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);/
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'pencapaian' => 'required',
            'dospem' => 'required',
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'penyelenggara' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'foto' => 'required|mimes:jpg,img,jpeg|max:50000'
        ]);
        
        $newNameFoto = date('ymd'). '-' . $request->foto->extension();
         
        $request->file('foto')->move(public_path('prestasi/foto'), $newNameFoto);
        
        Prestasi::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'pencapaian'=>$request->pencapaian,            
            'dospem'=>$request->dospem,
            'kategori'=>$request->kategori,
            'nama_kegiatan'=>$request->nama_kegiatan,
            'penyelenggara'=>$request->penyelenggara,
            'waktu'=>$request->waktu,
            'tempat'=>$request->tempat,
            'foto'=>$newNameFoto
        ]);

        return redirect()->route('admin-prestasi.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestasi = Prestasi::where('id', $id)->get();
        return view('admin.prestasidetail', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prestasi = Prestasi::findOrfail($id);
        return view('admin.prestasiedit', compact('prestasi'));
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
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'pencapaian' => 'required',
            'dospem' => 'required',
            'kategori' => 'required',
            'nama_kegiatan' => 'required',
            'penyelenggara' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'foto' => 'file|mimes:jpg,jpeg|max:50000'
        ]);

        
        
        $prestasis = $request->all();

        $prestasi = Prestasi::find($id); 
        
        // dd($prestasis);
        if ($foto = $request->file('foto')) {
            File::delete('prestasi/foto/'.$prestasi->foto);
            // $fotos = 'prestasi/foto/';
            $file_name = $request->foto->getClientOriginalName();
            // $foto->move($fotos, $file_name);
            $foto->move(public_path('prestasi/foto'), $file_name);
            $prestasis['foto'] = "$file_name";
        }else{
            unset($prestasis['foto']);
        }

        $prestasi->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'pencapaian' => $request->pencapaian,
            'dospem' => $request->dospem,
            'kategori' => $request->kategori,
            'nama_kegiatan' => $request->nama_kegiatan,
            'penyelenggara' => $request->penyelenggara,
            'waktu' => $request->waktu,
            'tempat' => $request->tempat,
            'foto' => $foto,
        ]);

        return redirect()->route('admin-prestasi.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi,$id)
    {
        $prestasi->destroy($id);
        return redirect()->back();
    }

    public function showuser($id)
    {
        $prestasi = Prestasi::where('id', $id)->get();
        return view('user.prestasidetail', compact('prestasi'));
    }

    public function user()
    {
        $prestasi = Prestasi::get();
        return view('user.prestasi', compact('prestasi')); 
    }
}
