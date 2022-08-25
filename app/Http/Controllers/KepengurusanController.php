<?php

namespace App\Http\Controllers;

use App\Models\Kepengurusan;
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
        // dd('$request');
        $this->validate($request, [
            'nama' => 'required',
            'tahun' => 'required',
            'pembina' => 'required',
            'bph' => 'required',
            'pengurus_lain' => 'required',
            'anggota' => 'required',
            'program_kerja' => 'required',
        ]);

        Kepengurusan::create([
            'nama'=>$request->nama,
            'tahun'=>$request->tahun,
            'pembina'=>$request->pembina,
            'bph'=>$request->bph,
            'pengurus_lain'=>$request->pengurus_lain,
            'anggota'=>$request->anggota,
            'program_kerja'=>$request->program_kerja
        ]);
        return redirect()->route('kepengurusan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            'bph' => 'required',
            'pengurus_lain' => 'required',
            'anggota' => 'required',
            'program_kerja' => 'required'
        ]);
        
        return redirect()->route('kepengurusan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kepengurusan, $id)
    {
        $kepengurusan->destroy($id);
        return redirect()->back();
    }
}
