<?php

namespace App\Http\Controllers;

use App\Models\prestasi;
use App\Models\Kepengurusan;
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
        return view('admin.prestasi.prestasi', compact('prestasi')); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $kepengurusan = Divisi::select('nama','id')->get();
        $kepengurusan = Kepengurusan::select('nama','id')->get();
        return view('admin.prestasi.prestasitambah', 
        [
            // 'divisi' => $divisi,
            'kepengurusan' => $kepengurusan
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
            'kepengurusan_id' => 'required',
            'foto' => 'required|mimes:jpg,img,jpeg|max:50000'
        ]);
        
        $newNameFoto = date('ymd'). '-' . $request->foto->extension();
         
        $request->file('foto')->move(public_path('images/prestasi'), $newNameFoto);
        
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
            'kepengurusan_id'=>$request->kepengurusan_id,
            'foto'=>$newNameFoto
        ]);

        return redirect()->route('prestasi.index')->with('success','Data berhasil ditambahkan');
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
        return view('admin.prestasi.prestasidetail', compact('prestasi'));
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
        return view('admin.prestasi.prestasiedit', compact('prestasi'));
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
        

        if ($foto = $request->file('foto')) {
            File::delete('images/prestasi/'.$prestasi->foto);
            $file_name = $request->foto->getClientOriginalName();
            $foto->move(public_path('images/prestasi'), $file_name);
            $prestasis['foto'] = "$file_name";
        }else{
            unset($prestasis['foto']);
        }

        $prestasi->update($prestasis);

        return redirect()->route('prestasi.index')->with('success','Data berhasil ditambahkan');
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
