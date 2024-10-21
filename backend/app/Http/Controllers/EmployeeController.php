<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'gaji' => 'required|numeric',
        ]);

        $id = DB::table('karyawan')->insert([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'gaji' => $request->gaji,
        ]);
        return response()->json(['id' => $nama], 201);
    }
}
