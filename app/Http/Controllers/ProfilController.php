<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
// use RealRashhid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Auth::user();
        $getservice = Service::where('user_id', Auth::user()->id)->get();
        return view('profil.index', compact('profil', 'getservice'));
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
        $profil = Auth::user();
        return view('profil.index', compact('profil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Auth::user();
        return view('profil.edit', compact('profil'));
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'role' => 'nullable',
            'current_password' => 'nullable|required_with:new_password',
            'new_password' => 'nullable|min:8|max:12|required_with:new_password|same:new_password',
            'password_confirmation' => 'nullable|min:8|max:12|required_with:new_password|same:new_password',
        ]);

        $user = User::findOrFail(Auth::user()->id);

        //ganti password
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $user->password)) {
                $user->password = Hash::make($request->input('new_password'));
            } else {
                // Alert::toast('Password Lama Tidak Sesuai!', 'error');
                return redirect()->back();
            }
        }
        $user->save();
        // Alert::toast('data berhasil diubah', 'succes');
        return redirect()->route('profil.index');
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