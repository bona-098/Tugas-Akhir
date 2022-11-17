<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Divisi;
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
        $divisi = Divisi::select('nama','id')->get();
        return view('user.anggota', compact('divisi'));
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
            'divisi_id' => 'required',
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

        $newNamecv = '-';
        $newNameporto = '-';
        if ($request->hasFile('cv')) {
            $newNamecv = date('ymd') . '-' . $request->nama . $request->cv->extension();
            $request->file('cv')->move(public_path('images/pendaftaran/cv'), $newNamecv);
        }
        
        if ($request->hasFile('porto')) {
            $newNameporto = date('ymd') . '-' . $request->nama . $request->porto->extension();
            $request->file('porto')->move(public_path('images/pendaftaran/porto'), $newNameporto);
        }
        Anggota::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'divisi_id' => $request->divisi_id,
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

        return redirect()->back()->with('success', 'Pendaftaran berhasil, silahkan tunggu pengumuman');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi = Divisi::select('nama','id')->get();
        $anggota = Anggota::find($id);
        return view('admin.anggota.anggotaedit', compact('anggota', 'divisi'));
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
            'divisi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
        ]);

        $anggot = $request->all();
        $anggota = Anggota::find($id);

        $anggota->update($anggot);
        $berkas = Anggota::get();
        return view('admin.anggota.pendaftaran', compact('berkas'));
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
        return redirect()->back()->with('success', "pendaftar lulus seleksi berkas");
    }

    public function anggoti(Request $request, $id)
    {
        $request->validate(['status' => 'required']);
        $anggota = Anggota::find($id);
        $anggota->update(['status' => $request->status]);
        return redirect()->back()->with('succes', "pendaftar lulus seleksi wawancara");
    }
}