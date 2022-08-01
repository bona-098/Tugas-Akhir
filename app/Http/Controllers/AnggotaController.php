<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar = Anggota::get();
        return view('admin.anggota', compact('daftar'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $kepengurusan = Kepengurusan::where('id', $nomor)->pluck('id');

        // dd($kepengurusan);?
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
        
        
        
        $request->file('resume')->move(public_path('pendaftaran/resume'), $newNameResume);
        $request->file('transkip')->move(public_path('pendaftaran/transkip'), $newNameTranskip);
        $request->file('surat_rekomendasi')->move(public_path('pendaftaran/surat_rekomendasi'), $newNameSurat);
        $request->file('sertifikat')->move(public_path('pendaftaran/sertifikat'), $newNameSertifikat);
        
        Anggota::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'prodi'=>$request->prodi,
            'no_telp'=>$request->no_telp,            
            'resume'=>$newNameResume,
            'transkip'=>$newNameTranskip,
            'surat_rekomendasi'=>$newNameSurat,
            'sertifikat'=>$newNameSertifikat,
            'kepengurusan_id'=>null
        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = Anggota::where('id', $id)->get();
        return view('admin.anggotadetail', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('admin.anggotaedit', compact('anggota'));
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

        $anggota = $request->all();

        if ($resume = $request->file('resume')) {
            File::delete('pendaftaran/resume/'.$service->resume);
            $destinationPath = 'images/anggota/';
            $profileImage = date('Ymd'). '-' . $request->nama_anggota . '.' . $request->resume->extension();
            $resume->move($destinationPath, $profileImage);
            $anggota['resume'] = "$profileImage";
        }else{
            unset($anggota['resume']);
        }

        $pendaftaran->update($anggota);

        if($anggota){
            //redirect dengan pesan sukses
            Riwayat::create([
                'user_id' => Auth::user()->id,
                'aktivitas' => 'Mengubah Data anggotawan '.$anggota->nama_anggota.''
            ]);

            Alert::toast('Data Berhasil Diubah', 'success');
            return redirect()->route('anggota.index');
        }else{
            //redirect dengan pesan error
            return redirect()->route('anggota.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota, $id)
    {
        $anggota->destroy($id);
        return redirect()->back();
    }
}
