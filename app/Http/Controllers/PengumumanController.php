<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengumuman = Pengumuman::get();
        return view('admin.pengumuman', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumumantambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $this->validate($request, [
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
            'media' => 'required|mimes:jpg,img,jpeg|max:50000'
        ]);
        
        $newNameMedia = $request->judul . '-' . date('His') . '.' .$request->media->extension();
         
        $request->file('media')->move(public_path('pengumuman/media'), $newNameMedia);

        Pengumuman::create([
            'judul'=>$request->judul,
            'deskripsi'=>$request->deskripsi,
            'waktu'=>$request->waktu,
            'media'=>$newNameMedia,
        ]);
        return redirect()->route('admin-pengumuman.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->get();
        return view('admin.pengumumandetail', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pengumuman = Pengumuman::findOrfail($id);
        return view('admin.pengumumanedit', compact('pengumuman'));
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
            'judul' => 'required',
            'deskripsi' => 'required',
            'waktu' => 'required',
            'media' => 'file|mimes:jpg,jpeg|max:50000'
        ]);
        
        $pengumumans = $request->all();

        $pengumuman = Pengumuman::find($id); 
        
        // dd($prestasis);
        if ($media = $request->file('media')) {
            File::delete('pengumuman/media/'.$pengumuman->media);
            // $medias = 'pengumuman/media/';
            $file_name = $request->media->getClientOriginalName();
            // $media->move($medias, $file_name);
            $media->move(public_path('pengumuman/media'), $file_name);
            $pengumumans['media'] = "$file_name";
        }else{
            unset($pengumumans['media']);
        }

        $pengumuman->update($pengumumans);

        return redirect()->route('admin-pengumuman.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman, $id)
    {
        $pengumuman->destroy($id);
        return redirect()->back();
    }
    public function showpengumuman($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->get();
        return view('user.pengumuman', compact('pengumuman'));
    }

    public function user()
    {
        $pengumuman = Pengumuman::get();
        return view('user.pengumuman', compact('pengumuman')); 
    }
}
