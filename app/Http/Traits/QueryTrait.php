<?php

namespace App\Http\Traits;
use App\Models\programkerja;
use App\ProgramkerjaController;


trait QueryTrait {
    public function show($id)
    {
        $proker = Programkerja::findOrfail($id);
        return view('admin.proker.show', compact('proker'));
    }
}