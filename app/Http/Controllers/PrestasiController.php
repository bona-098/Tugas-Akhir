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
            'nama_kegiatan' => 'required',
            'jenis_kegiatan' => 'required',
            'partisipasi' => 'required',
            'deskripsi' => 'required',
            'sertifikat' => 'required',
            'penyelenggara' => 'required',
            'waktu' => 'required',
            'tempat' => 'required',
            'kepengurusan_id' => 'required',
            'sertifikat' => 'required|mimes:pdf|max:50000'
        ]);
        
        $newNameSertifikat = date('ymd'). '-' . $request->sertifikat->extension();
         
        $request->file('sertifikat')->move(public_path('images/prestasi'), $newNameSertifikat);
        
        Prestasi::create([
            'nama_kegiatan'=>$request->nama_kegiatan,
            'jenis_kegiatan'=>$request->jenis_kegiatan,            
            'partisipasi'=>$request->partisipasi,            
            'deskripsi'=>$request->deskripsi,
            'penyelenggara'=>$request->penyelenggara,
            'waktu'=>$request->waktu,
            'tempat'=>$request->tempat,
            'kepengurusan_id'=>$request->kepengurusan_id,
            'sertifikat'=>$newNameSertifikat
        ]);

        return redirect()->route('prestasi.index')->with('success','Prestasi berhasil ditambahkan');
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
            // 'nama_kegiatan' => 'required',
            // 'jenis_kegiatan' => 'required',
            // 'partisipasi' => 'required',
            // 'deskripsi' => 'required',
            // 'sertifikat' => 'required',
            // 'penyelenggara' => 'required',
            // 'waktu' => 'required',
            // 'tempat' => 'required',
            // 'kepengurusan_id' => 'required',
            // 'sertifikat' => 'required|mimes:pdf|max:50000'
        ]);
        
        $prestasis = $request->all();

        $prestasi = Prestasi::find($id); 
        

        if ($sertifikat = $request->file('sertifikat')) {
            File::delete('images/prestasi/'.$prestasi->sertifikat);
            $file_name = $request->sertifikat->getClientOriginalName();
            $sertifikat->move(public_path('images/prestasi'), $file_name);
            $prestasis['sertifikat'] = "$file_name";
        }else{
            unset($prestasis['sertifikat']);
        }

        $prestasi->update($prestasis);

        return redirect()->route('prestasi.index')->with('success','Prestasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestasi $prestasi)
    {
        $prestasi->delete();
        File::delete('images/prestasi/'.$prestasi->sertifikat);
        return redirect()->back()->with('success', 'Prestasi berhasil dihapus');
    }
    // public function destroy(Pengumuman $pengumuman)
    // {
    //     $pengumuman->delete();
    //     File::delete('images/pengumuman/'.$pengumuman->media);
    //     return redirect()->back()->with('succes', 'Pengumuman berhasil dihapus');
    // }
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
