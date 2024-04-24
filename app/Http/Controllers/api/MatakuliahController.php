<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matakuliah;
use Illuminate\Support\Facades\DB;

class MatakuliahController extends Controller
{
    public function getAllData()
    {
        $matakuliah = Matakuliah::all();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data matakuliah',
            'data' => $matakuliah
        );
        return response()->json($response);
    }

    public function getDataById($kode_mk)
    {
        $matakuliah = Matakuliah::where('kode_mk', $kode_mk)->get();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data matakuliah dengan kode_mk ' . $kode_mk,
            'data' => $matakuliah
        );
        return response()->json($response);
    }

    public function createData(Request $request)
    {
        echo "<pre>";
        print_r($request->all());
        die;
        $matakuliah = new Matakuliah();
        $matakuliah->kode_mk = $request->kode_mk;
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();

        $response = array(
            'status' => 1,
            'message' => 'Berhasil menambahkan data matakuliah',
            'data' => $matakuliah
        );
        return response()->json($response);
    }

    public function updateData(Request $request, $kode_mk)
    {
        $matakuliah = Matakuliah::where('kode_mk', $kode_mk)->first();
        $matakuliah->nama_mk = $request->nama_mk;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();

        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengubah data matakuliah dengan kode_mk ' . $kode_mk,
            'data' => $matakuliah
        );
        return response()->json($response);
    }

    public function deleteData($kode_mk)
    {
        $matakuliah = DB::table('matakuliahs')->where('kode_mk', $kode_mk)->delete();
        
        $response = array(
            'status' => 1,
            'message' => 'Berhasil menghapus data matakuliah dengan kode_mk ' . $kode_mk
        );
        return response()->json($response);
    }
}
