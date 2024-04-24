<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Perkuliahan;
use Illuminate\Support\Facades\DB;

class PerkuliahanController extends Controller
{
    public function getAllData()
    {
        $perkuliahan = Perkuliahan::join('mahasiswas as m', 'm.nim', '=', 'perkuliahans.nim')
            ->join('matakuliahs as m2', 'm2.kode_mk', '=', 'perkuliahans.kode_mk')
            ->select('perkuliahans.nim', 'm.nama', 'm.alamat', 'm.tanggal_lahir', 'm2.kode_mk', 'm2.mata_mk', 'm2.sks', 'perkuliahans.nilai')
            ->get();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data perkuliahan',
            'data' => $perkuliahan
        );
        return response()->json($response);
    }

    public function getDataById($nim)
    {
        $perkuliahan = Perkuliahan::join('mahasiswas as m', 'm.nim', '=', 'perkuliahans.nim')
            ->join('matakuliahs as m2', 'm2.kode_mk', '=', 'perkuliahans.kode_mk')
            ->select('perkuliahans.nim', 'm.nama', 'm.alamat', 'm.tanggal_lahir', 'm2.kode_mk', 'm2.mata_mk', 'm2.sks', 'perkuliahans.nilai')
            ->where('perkuliahans.nim', $nim)
            ->get();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data perkuliahan',
            'data' => $perkuliahan
        );
        return response()->json($response);
    }

    public function getDataByNimAndKodeMk($nim, $kode_mk)
    {
        $perkuliahan = Perkuliahan::join('mahasiswas as m', 'm.nim', '=', 'perkuliahans.nim')
            ->join('matakuliahs as m2', 'm2.kode_mk', '=', 'perkuliahans.kode_mk')
            ->select('perkuliahans.nim', 'm.nama', 'm.alamat', 'm.tanggal_lahir', 'm2.kode_mk', 'm2.mata_mk', 'm2.sks', 'perkuliahans.nilai')
            ->where('perkuliahans.nim', $nim)
            ->where('perkuliahans.kode_mk', $kode_mk)
            ->get();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengambil data perkuliahan',
            'data' => $perkuliahan
        );
        return response()->json($response);
    }

    public function createData(Request $request)
    {
        $perkuliahan = new Perkuliahan();
        $perkuliahan->nim = $request->nim;
        $perkuliahan->kode_mk = $request->kode_mk;
        $perkuliahan->nilai = $request->nilai;
        $perkuliahan->save();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil menambahkan data perkuliahan',
            'data' => $perkuliahan
        );
        return response()->json($response);
    }

    public function updateData(Request $request, $nim, $kode_mk)
    {
        $perkuliahan = Perkuliahan::where('nim', $nim)
            ->where('kode_mk', $kode_mk)
            ->first();
        $perkuliahan->nilai = $request->nilai;
        $perkuliahan->save();
        $response = array(
            'status' => 1,
            'message' => 'Berhasil mengubah data perkuliahan',
            'data' => $perkuliahan
        );
        return response()->json($response);
    }

    public function deleteData($nim, $kode_mk)
    {
        $perkuliahan = DB::table('perkuliahans')
            ->where('nim', $nim)
            ->where('kode_mk', $kode_mk)
            ->first();

        if ($perkuliahan) {
            DB::table('perkuliahans')
                ->where('nim', $nim)
                ->where('kode_mk', $kode_mk)
                ->delete();

            $response = [
                'status' => 1,
                'message' => 'Berhasil menghapus data perkuliahan'
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Data perkuliahan tidak ditemukan'
            ];
        }

        return response()->json($response);
    }
}
