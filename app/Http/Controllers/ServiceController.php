<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        $service = Service::get();
        return view('admin.service.service', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.servicetambah');
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
        $this->validate($request, [
            'nama' => 'required',
            'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000'
        ]);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('images/service'), $newNameFoto);

        service::create([
            'nama'=>$request->nama,
            'nim'=>$request->nim,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'foto'=>$newNameFoto

        ]);

        return redirect()->route('service.index')->with('success','Data berhasil ditambahkan');
    }

    public function userstore(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'pesan' => 'required',
            'status' => 'required',
            'foto' => 'required|mimes:jpg,jpeg|max:50000',
            'user_id' => 'required'
        ]);

        $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

        $request->file('foto')->move(public_path('images/service'), $newNameFoto);

        service::create([
            'nama'=>$request->nama,            
            'hari'=>$request->hari,            
            'sesi'=>$request->sesi,
            'no_hp'=>$request->no_hp,
            'pesan'=>$request->pesan,
            'status'=>'in progress',
            'foto'=>$newNameFoto,
        ]);

        return redirect()->back()->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        $service = Service::where('id', $service)->get();
        return view('admin.service.service', compact('service'));
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
        return view('admin.service.serviceedit', compact('service'));
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
        // $request->validate([
        //     'nama' => 'required',
        //     'nim' => 'required',
        //     'hari' => 'required',
        //     'sesi' => 'required',
        //     'no_hp' => 'required',
        //     'pesan' => 'required',
        //     'status' => 'required',
        //     'user_id' => 'required',
        //     'foto' => 'file|mimes:jpg,jpeg|max:50000'
        // ]);

        
        
        // $serviced = $request->all();

        // $service = Service::find($id); 
        
        // dd($serviced);
        // if ($foto = $request->file('foto')) {
        //     File::delete('images/service/'.$service->foto);
        //     $fotos = 'images/service/';
        //     $file_name = $request->foto->getClientOriginalName();
        //     $foto->move($fotos, $file_name);
        //     $serviced['foto'] = "$file_name";
        // }else{
        //     unset($serviced['foto']);
        // }

        // $service->update([
        //     'nama' => $request->nama,
        //     'nim' => $request->nim,
        //     'hari' => $request->hari,
        //     'sesi' => $request->sesi,
        //     'no_hp' => $request->no_hp,
        //     'pesan' => $request->pesan,
        //     'status' => 'in progress',
        //     'user_id' => $request->user_id,
        //     'foto' => $foto,
        // ]);

        // return redirect()->route('service.index')->with('success','Data berhasil ditambahkan');
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
