<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;
use illuminate\Support\Facades\File;

class pendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $daftar = pendaftaran::get();
        return view('admin.anggota.pendaftaran');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('user.anggota');
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
            'nama' => 'required',
            'nim' => 'required',
            'no_telp' => 'required',
            'prodi' => 'required',
            'resume' => 'required|mimes:pdf|max:50000',
            'transkip' => 'required|mimes:pdf|max:50000',
            'surat_rekomendasi' => 'required|mimes:pdf|max:50000',
            'sertifikat' => 'required|mimes:pdf|max:50000'
        ]);
        
        $newNameResume = date('ymd'). '-' . $request->nama . '-' . $request->resume->extension();
        $newNameTranskip = date('ymd'). '-' . $request->nama . '-' . $request->transkip->extension();
        $newNameSurat = date('ymd'). '-' . $request->nama . '-' . $request->surat_rekomendasi->extension();
        $newNameSertifikat = date('ymd'). '-' . $request->nama . '-' . $request->sertifikat->extension();
        
        
        
        $request->file('resume')->move(public_path('images/pendaftaran/resume'), $newNameResume);
        $request->file('transkip')->move(public_path('images/pendaftaran/transkip'), $newNameTranskip);
        $request->file('surat_rekomendasi')->move(public_path('images/pendaftaran/surat_rekomendasi'), $newNameSurat);
        $request->file('sertifikat')->move(public_path('images/pendaftaran/sertifikat'), $newNameSertifikat);
        
        anggota::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'prodi'=>$request->prodi,
            'no_telp'=>$request->no_telp,            
            'resume'=>$newNameResume,
            'transkip'=>$newNameTranskip,
            'surat_rekomendasi'=>$newNameSurat,
            'sertifikat'=>$newNameSertifikat,
        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     $pendaftaran = pendaftaran::where('id', $id)->get();
    //     return view('admin.pendaftaran.pendaftarandetail', compact('pendaftaran'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $pendaftaran = pendaftaran::find($id);
    //     return view('admin.pendaftaran.pendaftaranedit', compact('pendaftaran'));
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nama'=>'required',
    //         'nim'=>'required',            
    //         'prodi'=>'required',
    //         'no_telp'=>'required',            
    //         'resume'=>'required',
    //         'transkip'=>'required',
    //         'surat_rekomendasi'=>'required',
    //         'sertifikat'=>'required',
    //         'kepengurusan_id'=>'file|mimes:jpg, jpeg, png|max:50000'
    //     ]);

    //     $anggot = $request->all();
    //     $pendaftaran = pendaftaran::find($id);
        
    //     if ($resume = $request->file('resume')){
    //         file::delete('images/pendaftaran/pendaftaran/'. $pendaftaran->resume);
    //         $file_name = $request->media->getVlientOriginalName();
    //         $resume->move(public_path('images/pendaftaran/pendaftaran'), $file_name);
    //         $anggot['resume'] = "$file_name";
    //     }else{
    //         unset($anggot['resume']);
    //     }

    //     $pendaftaran->update($anggot);
    //     return redirect()->route('pendaftaran.index')->with('nice');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(pendaftaran $pendaftaran, $id) 
    // {
    //     $pendaftaran->destroy($id);
    //     return redirect()->back();
    // }
}
