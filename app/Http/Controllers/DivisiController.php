<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\divisi;
use App\Models\programkerja;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

// use App\Http\Traits\QueryTrait;
// use App\Models\programkerja;

class DivisiController extends Controller
{
    // use QueryTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $divisi = Divisi::get();
        return view('admin.divisi.index', compact('divisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.divisi.tambah');
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
            'kadiv' => 'required',
            'staffahli' => 'required',
            'staff' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        Divisi::create([
            'nama'=>$request->nama,
            'kadiv'=>$request->kadiv,
            'staffahli'=>$request->staffahli,
            'staff'=>$request->staff,
            'visi'=>$request->visi,
            'misi'=>$request->misi
        ]);

        return redirect()->route('divisi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $divisi = Divisi::findOrfail($id);
        $proker = Programkerja::where('divisi_id', '=', $id)->get();
        return view('admin.divisi.show',
        [
            'divisi' => $divisi,
            'proker' => $proker
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $divisi = Divisi::findOrfail($id);
        return view('admin.divisi.edit', compact('divisi'));
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
            'kadiv' => 'required',
            'staffahli' => 'required',
            'staff' => 'required',
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $div = $request->all();
        $divisi = Divisi::find($id);

        $divisi->update([
            'nama'=>$request->nama,
            'kadiv'=>$request->kadiv,
            'staffahli'=>$request->staffahli,
            'staff'=>$request->staff,
            'visi'=>$request->visi,
            'misi'=>$request->misi
        ]);

        return redirect()->route('divisi.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Divisi $divisi
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->back();
    }
}