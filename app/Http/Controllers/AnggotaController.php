<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;
use illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.anggota.anggota', compact('daftar'));
    }

    public function berkas()
    {
        $berkas = Anggota::get();
        return view('admin.anggota.pendaftaran', compact('berkas'));
    }

    public function wawancara()
    {
        $wawan = Anggota::get();
        return view('admin.anggota.wawancara', compact('wawan'));
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

        // dd($request);
        // return $request;
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'pilihan_satu' => 'required',
            'alasan_satu' => 'required',
            'pilihan_dua' => 'required',
            'alasan_dua' => 'required',
            'pindah_divisi' => 'required',
            'motivasi' => 'required',
            'komitmen' => 'required',
            'user_id' => 'Auth::id()',
            'cv' => 'required|mimes:pdf|max:50000',
            // 'porto' => 'required|mimes:pdf|max:50000',
        ]);

        $newNamecv = date('ymd') . '-' . $request->nama . '-' . $request->cv->extension();
        $newNameporto = date('ymd') . '-' . $request->nama . '-' . $request->porto->extension();
       


        $request->file('cv')->move(public_path('images/pendaftaran/cv'), $newNamecv);
        $request->file('porto')->move(public_path('images/pendaftaran/porto'), $newNameporto);
       
        Anggota::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'pilihan_satu' => $request->pilihan_satu,
            'alasan_satu' => $request->alasan_satu,
            'pilihan_dua' => $request->pilihan_dua,
            'alasan_dua' => $request->alasan_dua,
            'pindah_divisi' => $request->pindah_divisi,
            'motivasi' => $request->motivasi,
            'komitmen' => $request->komitmen,
            'cv' => $newNamecv,
            'porto' => $newNameporto,
            'kepengurusan_id' => null,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
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
        return view('admin.anggota.anggotadetail', compact('anggota'));
    }

    // public function showp($id)
    // {
    //     $anggota = Anggota::where('status', '1')->get();
    //     return view('admin.anggota.pendaftaran', compact('pendaftaran'));
    // }
    //terima anggota
    // public function deleteData($id=null){
    //     Angota::findOrFail($id)->delete();
    //     Toastr::success('Post Successfully Deleted', 'Success', 
    //     ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
    //         return redirect()->back();
    // }

    //tiadakan
    // public function restoreData($id){
    //     Post::withTrashed()->findOrFail($id)->restore();
    //     Toastr::success('Post Successfully restored', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
    //         return redirect()->back(); 
    // }

    //tolak
    // public function pDeleteData($id=null){
    //     Post::onlyTrashed()->findOrFail($id)->forceDelete();
    //     Toastr::success('Post permanently Deleted', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
    //     return redirect()->back();
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = Anggota::find($id);
        return view('admin.anggota.anggotaedit', compact('anggota'));
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
            'prodi' => 'required',
            'no_telp' => 'required',
            'resume' => 'required',
            'transkip' => 'required',
            'surat_rekomendasi' => 'required',
            'sertifikat' => 'required',
            'kepengurusan_id' => 'file|mimes:jpg, jpeg, png|max:50000'
        ]);

        $anggot = $request->all();
        $anggota = Anggota::find($id);

        if ($resume = $request->file('resume')) {
            file::delete('images/pendaftaran/anggota/' . $anggota->resume);
            $file_name = $request->media->getVlientOriginalName();
            $resume->move(public_path('images/pendaftaran/anggota'), $file_name);
            $anggot['resume'] = "$file_name";
        } else {
            unset($anggot['resume']);
        }

        $anggota->update($anggot);
        return redirect()->route('anggota.index')->with('nice');
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

    //terimatolak

    public function wawancari(Request $request, $id)
    {
        $request->validate(['status' => 'required']);
        $anggota = Anggota::find($id);
        $anggota->update(['status' => $request->status]);
        return redirect()->back()->with('pesan', "anggota lulus seleksi");
    }

    public function anggoti(Request $request, $id)
    {
        $request->validate(['status' => 'required']);
        $anggota = Anggota::find($id);
        $anggota->update(['status' => $request->status]);
        return redirect()->back()->with('pesan', "anggota lulus wawancara");
    }
}