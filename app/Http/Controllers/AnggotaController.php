<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Anggota;
use App\Models\Kepengurusan;
use Illuminate\Http\Request;
use illuminate\Support\Facades\File;

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

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'no_telp' => 'required',
            'prodi' => 'required',
            'prodi' => 'required',
            'user_id' => 'Auth::id()',
            'resume' => 'required|mimes:pdf|max:50000',
            'transkip' => 'required|mimes:pdf|max:50000',
            'surat_rekomendasi' => 'required|mimes:pdf|max:50000',
            'sertifikat' => 'required|mimes:pdf|max:50000'
        ]);

        $newNameResume = date('ymd') . '-' . $request->nama . '-' . $request->resume->extension();
        $newNameTranskip = date('ymd') . '-' . $request->nama . '-' . $request->transkip->extension();
        $newNameSurat = date('ymd') . '-' . $request->nama . '-' . $request->surat_rekomendasi->extension();
        $newNameSertifikat = date('ymd') . '-' . $request->nama . '-' . $request->sertifikat->extension();



        $request->file('resume')->move(public_path('images/pendaftaran/resume'), $newNameResume);
        $request->file('transkip')->move(public_path('images/pendaftaran/transkip'), $newNameTranskip);
        $request->file('surat_rekomendasi')->move(public_path('images/pendaftaran/surat_rekomendasi'), $newNameSurat);
        $request->file('sertifikat')->move(public_path('images/pendaftaran/sertifikat'), $newNameSertifikat);

        Anggota::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'prodi' => $request->prodi,
            'no_telp' => $request->no_telp,
            'resume' => $newNameResume,
            'transkip' => $newNameTranskip,
            'surat_rekomendasi' => $newNameSurat,
            'sertifikat' => $newNameSertifikat,
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