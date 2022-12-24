<?php

namespace App\Http\Controllers;
use App\Models\Anggota;
use App\Models\Service;
use App\Models\Prestasi;
use App\Models\Programkerja;
use App\Models\Dokumentasi;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index()
    {
        $jumlah_anggota = Anggota::all();
        $jumlah_service = Service::all();
        $jumlah_prestasi = Prestasi::all();
        $jumlah_programkerja = Programkerja::all();
        // $proker = Programkerja::all();
        // @dd($proker);
        // dd($jumlah_anggota);
        return view('admin.dashboard', compact('jumlah_anggota', 'jumlah_service', 'jumlah_prestasi', 'jumlah_programkerja'));
    }

    public function landingpage()
    {
        $getdokumentasi = Dokumentasi::all();
        $getpengumuman = Pengumuman::limit(2)->get();
        $getproker = Programkerja::all();
        $getprestasi = Prestasi::all();
        return view('user.home', compact(
            'getdokumentasi',
            'getpengumuman',
            'getprestasi',
            'getproker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
