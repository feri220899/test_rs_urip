<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function index()
    {
        $karyawan = DB::table('karyawan')->get();
        return response()->json($karyawan);
    }

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
        return response()->json(['id' => $id], 201);
    }

    public function destroy($id)
    {
        $deleted = DB::table('karyawan')->where('id', $id)->delete();

        if ($deleted) {
            return response()->json(['message' => 'Karyawan deleted successfully']);
        }

        return response()->json(['message' => 'Karyawan not found'], 404);
    }

    public function update(Request $request, $id)
    {

        $updated = DB::table('karyawan')->where('id', $id)->update([
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'gaji' => $request->gaji,
        ]);

        if ($updated) {
            return response()->json(['message' => 'Karyawan updated successfully']);
        }

        return response()->json(['message' => 'Karyawan not found'], 404);
    }
}
