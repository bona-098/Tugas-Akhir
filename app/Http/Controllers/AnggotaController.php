<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Divisi;
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
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kepengurusan = Kepengurusan::select('nama','id')->OrderBy('id', 'desc')->get();
        $divisi = Divisi::select('nama','id')->get();
        return view('user.anggota',
        [
            'kepengurusan' => $kepengurusan,
            'divisi' => $divisi,
            ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'Auth::id()',
            'cv' => 'required|mimes:pdf|max:50000',
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
            'porto' => $newNameporto,
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
        $kepengurusan = Kepengurusan::select('nama','id')->get();
        $divisi = Divisi::select('nama','id')->get();
        $anggota = Anggota::find($id);
        return view('admin.anggota.anggotaedit', compact('anggota', 'divisi', 'kepengurusan'));
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
        $wawan = Anggota::get();
        return view('admin.anggota.wawancara', compact('wawan'));
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