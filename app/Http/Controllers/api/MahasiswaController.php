<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function getAllData()
    {
        $mahasiswa = Mahasiswa::all();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data mahasiswa',
            'data' => $mahasiswa
        );
        return response()->json($response);
    }

    public function getDataById($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->get();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data mahasiswa',
            'data' => $mahasiswa
        );
        return response()->json($response);
    }

    public function createData(Request $request)
    {
        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->save();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil menambahkan data mahasiswa',
            'data' => $mahasiswa
        );
        return response()->json($response);
    }

    public function updateData(Request $request, $nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->tanggal_lahir = $request->tanggal_lahir;
        $mahasiswa->save();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengubah data mahasiswa',
            'data' => $mahasiswa
        );
        return response()->json($response);
    }

    public function deleteData($nim)
    {
        $mahasiswa = DB::table('mahasiswas')->where('nim', $nim)->first();

        if ($mahasiswa) {
            DB::table('mahasiswas')->where('nim', $nim)->delete();

            $response = [
                'status' => 1,
                'message' => 'Berhasil menghapus data mahasiswa',
                'data' => $mahasiswa
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Data mahasiswa tidak ditemukan'
            ];
        }

        return response()->json($response);
    }
}
