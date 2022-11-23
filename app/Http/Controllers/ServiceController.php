<?php

namespace App\Http\Controllers;

use Toastr;
use App\Models\User;
use App\Models\Service;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::with("teknisi", "user")->get();
        // dd($service);
        // $service = Service::where('status', '1')->orWhere('status', '2');
        return view('admin.service.service', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $hari = $request->get('hari');
        
        $ambilhari = Carbon::parse($hari)->translatedFormat('l');
        
        $filter = Teknisi::where('hari', '=', $ambilhari)->get();
        // dd($filter);
        // dd(auth::id());


        return view('user.service', compact('filter'));

    }
    
    // public function usercreate()
    // {
    //     return view('user.service');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);

        $this->validate($request, [
            'nama' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'pesan' => 'required',
            // 'status' => '1',
            'teknisi_id' => 'required',
        ]);

        // dd($request->all());

        if(Service::where('sesi', '=', $request->sesi)->where('hari', '=', $request->hari)->exists()){
            return redirect()->back()->with('gagal', 'Data servis di sesi dan yang sama telah terisi');
        }else{
            Service::create([
                'nama' => $request->nama,
                'hari' => $request->hari,
                'sesi' => $request->sesi,
                'no_hp' => $request->no_hp,
                'pesan' => $request->pesan,
                'status' => 1,
                'teknisi_id' => $request->teknisi_id,
                'user_id' => Auth::user()->id
            ]);

            return redirect()->route('service')->with('success', 'Servis berhasil, silahkan cek profil');
        }
    }

    // public function userstore(Request $request)
    // {
    //     $this->validate($request, [
    //         'nama' => 'required',
    //         'hari' => 'required',
    //         'sesi' => 'required',
    //         'no_hp' => 'required',
    //         'pesan' => 'required',
    //         'status' => 'required',
    //         'foto' => 'required|mimes:jpg,jpeg|max:50000',
    //         // 'user_id' => 'required'
    //     ]);

    //     $newNameFoto = date('ymd'). '-' . $request->foto . '-' . $request->foto->extension();

    //     $request->file('foto')->move(public_path('images/service'), $newNameFoto);

    //     service::create([
    //         'nama'=>$request->nama,
    //         'hari'=>$request->hari,
    //         'sesi'=>$request->sesi,
    //         'no_hp'=>$request->no_hp,
    //         'pesan'=>$request->pesan,
    //         'status'=>$request->status,
    //         'foto'=>$newNameFoto,
    //     ]);

    //     return redirect()->back()->with('success','Data berhasil ditambahkan');
    // }

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
        $request->validate([
            'nama' => 'required',
            // 'nim' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'pesan' => 'required',
            'status' => 'required',
            'user_id' => 'required',
            // 'foto' => 'file|mimes:jpg,jpeg|max:50000'
        ]);



        $serviced = $request->all();

        $service = Service::find($id);

        // dd($serviced);
        // if ($foto = $request->file('foto')) {
        //     File::delete('images/service/' . $service->foto);
        //     $fotos = 'images/service/';
        //     $file_name = $request->foto->getClientOriginalName();
        //     $foto->move($fotos, $file_name);
        //     $serviced['foto'] = "$file_name";
        // } else {
        //     unset($serviced['foto']);
        // }

        $service->update([
            'nama' => $request->nama,
            // 'nim' => $request->nim,
            'hari' => $request->hari,
            'sesi' => $request->sesi,
            'no_hp' => $request->no_hp,
            'pesan' => $request->pesan,
            'status' => $request->status,
            'user_id' => $request->user_id,
            // 'foto' => $foto,
        ]);

        return redirect()->route('service.index')->with('success', 'servis berhasil diperbarui');
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
        return redirect()->back()->with('success', 'riwayat servis berhasil dihapus');
    }

    public function changeStatus(Request $request, $id)
    {
        // dd($request->all());
        if ($request->status == 'terima') {
            $status = 'terima';
        } elseif ($request->status == 'selesai') {
            $status = 'selesai';
        } else {
            $status = 'gagal';
        }
        Service::where('id', $id)->update(['status' => $status]);
        return redirect()->back()->with('success', 'servis telah selesai');
    }
    public function riwayat()
    {
        $service = Service::with("teknisi", "user")->get();
        return view('admin.service.riwayat', compact('service'));
    }
}
