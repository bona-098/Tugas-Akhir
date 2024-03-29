<?php

namespace App\Http\Controllers;

use App\Models\Kepengurusan;
use App\Models\prestasi;
use App\Models\programkerja;
use App\Models\Anggota;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class KepengurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kepengurusan = Kepengurusan::get();
        return view('admin.kepengurusan.index', compact('kepengurusan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kepengurusan.add');
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
            'tahun' => 'required',
            'pembina' => 'required',
            'ketua' => 'required',
            'internal' => 'required',
            'external' => 'required',
            'sekretaris' => 'required',
        ]);

        Kepengurusan::create([
            'nama'=>$request->nama,
            'tahun'=>$request->tahun,
            'pembina'=>$request->pembina,
            'ketua'=>$request->ketua,
            'internal'=>$request->internal,
            'external'=>$request->external,
            'sekretaris'=>$request->sekretaris,
            
        ]);
        return redirect()->route('kepengurusan.index')->with('success', 'Berhasil menambah kepengurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kepengurusan = Kepengurusan::with("prestasi", "programkerja")->find($id);
        return view('admin.kepengurusan.show', compact('kepengurusan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kepengurusan = Kepengurusan::findOrfail($id);
        return view('admin.kepengurusan.edit', compact('kepengurusan'));
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
            'tahun' => 'required',
            'pembina' => 'required',
            'ketua' => 'required',
            'internal' => 'required',
            'external' => 'required',
            'sekretaris' => 'required',
        ]);
        $urus = $request->all();
        $kepengurusan = Kepengurusan::find($id);

        $kepengurusan->update([
            'nama'=>$request->nama,
            'tahun'=>$request->tahun,
            'pembina'=>$request->pembina,
            'ketua'=>$request->ketua,
            'internal'=>$request->internal,
            'external'=>$request->external,
            'sekretaris'=>$request->sekretaris,
        ]);
        
        return redirect()->route('kepengurusan.index')->with('success', 'Kepengurusan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepengurusan $kepengurusan)
    {
        $kepengurusan->delete();
        return redirect()->back()->with('success', 'Kepengurusan berhasil dihapus');
    }
}
