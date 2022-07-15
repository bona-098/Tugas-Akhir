<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sers = service::get();
        return view('admin.service', compact('sers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service');
    }

    public function usercreate()
    {
        return view('user.service');
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
        $kepengurusan = service::where('id', $nomor)->pluck('id');

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('service/foto'), $newNameFoto);

        service::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'foto'=>$newNameFoto

        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    public function userstore(Request $request)
    {
        // $nomor = 2;
        // $kepengurusan = service::where('id', $nomor)->pluck('id');

        // dd($kepengurusan);?
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        // dd($request);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('service/foto'), $newNameFoto);

        service::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'foto'=>$newNameFoto

        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(service $service)
    {
        $service = service::where('id', $service)->get();
        return view('admin.service', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::findOrfail($id);
        return view('admin.serviceedit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request);
        $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'file|mimes:jpg,jpeg|max:50000'
        ]);

        
        
        $serviced = $request->all();

        $service = Service::find($id); 
        
        // dd($serviced);
        if ($foto = $request->file('foto')) {
            File::delete('service/foto/'.$service->foto);
            $fotos = 'service/foto/';
            $file_name = $request->foto->getClientOriginalName();
            $foto->move($fotos, $file_name);
            $serviced['foto'] = "$file_name";
        }else{
            unset($serviced['foto']);
        }

        $service->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'hari' => $request->hari,
            'sesi' => $request->sesi,
            'no_hp' => $request->no_hp,
            'foto' => $foto,
        ]);
        
        // $service->update([
            //     'nama' => 'required',
        //     'nim' => 'required',
        //     'hari' => 'required',
        //     'sesi' => 'required',
        //     'no_hp' => 'required',
        //     'foto' => 'file|mimes:jpg,jpeg|max:50000'
        // ]);


        return redirect()->route('admin-service.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service, $id)
    {
        // $karyawan = Karyawan::find($karyawan);
        $service->destroy($id);
        return redirect()->back();
    }
}
