<?php

namespace App\Http\Controllers;

use Toastr;
use App\Mail\BookingMail;
use App\Models\User;
use App\Models\Service;
use App\Models\Teknisi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class serviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teknisis = Teknisi::where('user_id', Auth::id())->first();;
        $service = Service::with("teknisi", "user")->get();
        // @dd($teknisis);
        return view('admin.service.service', compact('service', 'teknisis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $c = ['sesi 1', 'sesi 2', 'sesi 3', 'sesi 4'];

        $hari = $request->get('hari');

        $ambilhari = Carbon::parse($hari)->translatedFormat('l');

        $filter = Teknisi::where('hari', '=', $ambilhari)->get();

        $sesi = Service::get('sesi');

        if ($request->get('teknisi_id')) {
            $cekTeknisi = Service::where('teknisi_id', $request->get('teknisi_id'))
                ->get('sesi')
                ->pluck('sesi')
                ->toArray();
            foreach ($c as $item) {
                if (!in_array($item, $cekTeknisi)) {
                    $dataSesi[] = $item;
                }
            }
            // dd($cekTeknisi);   
              
        } else {
            $dataSesi = [];
        }

        // $teknis = Service::where('sesi', '=', $sesi)->get();
        return view('user.service', compact('filter', 'sesi','dataSesi'));
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
        // dd(request()->all()) ;
        // dd($request->all); 
        $this->validate($request, [
            'nama' => 'required',
            'hari' => 'required',
            'sesi' => 'required',
            'no_hp' => 'required',
            'pesan' => 'required',
            // 'status' => '1',
            'teknisi_id' => 'required',
        ]);
        
        if (Service::where('sesi', '=', $request->sesi)->where('hari', '=', $request->hari)->exists()) {
            return redirect()->back()->with('gagal', 'Data servis di sesi dan yang sama telah terisi');
        } else {
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
            $teknisi = Teknisi::find($request->teknisi_id);
            $emailteknisi = User::find($teknisi->user_id)->email;
            $details = [
                'title' => 'Informasi Booking',
                'body' => 'Silahkan login untuk mengelola booking',
                'nama' => $request->nama,
                'sesi' => $request->sesi,
                'hari' => $request->hari,
                'pesan' => $request->pesan
            ];
            Mail::to($emailteknisi)->send(new BookingMail($details));
            // dd($details);
            return redirect()->route('service')->with('success', 'Servis berhasil, silahkan cek profil');
        }
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
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->back()->with('success', 'riwayat servis berhasil dihapus');
    }

    public function changeStatus(Request $request, $id)
    {
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
        $teknisis = Teknisi::where('user_id', Auth::id())->first();;
        $service = Service::with("teknisi", "user")->get();
        return view('admin.service.riwayat', compact('service', 'teknisis'));
    }
}
