<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseOnController extends Controller
{
        public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'data' => 'required|array',
            'data.*.kode_satusehat' => 'required|string',
            'data.*.kode_sarana' => 'required|string',
            'data.*.nama' => 'required|string',
            'data.*.telp' => 'nullable|string',
            'data.*.email' => 'nullable|email',
            'data.*.website' => 'nullable|string',
            'data.*.longitude' => 'nullable|string',
            'data.*.latitude' => 'nullable|string',
            'data.*.operasional' => 'required|boolean',
            'data.*.wilayah_perairan_darat' => 'nullable|string',
            'data.*.wilayah_karakteristik' => 'nullable|string',
            'data.*.sarana_administrasi' => 'nullable|array',
            'data.*.sarana_administrasi.*.kode' => 'nullable|string',
            'data.*.sarana_administrasi.*.nama' => 'nullable|string',
            'data.*.sarana_administrasi.*.kode_sarana' => 'nullable|string',
            'data.*.sarana_administrasi.*.status_aktif' => 'nullable|boolean',
            'data.*.sarana_administrasi.*.status_sarana' => 'nullable|string',
            'data.*.alamat' => 'nullable|string',
            'data.*.provinsi' => 'nullable|array',
            'data.*.provinsi.kode' => 'nullable|integer',
            'data.*.provinsi.nama' => 'nullable|string',
            'data.*.provinsi.kode_bps' => 'nullable|string',
            'data.*.provinsi.kode_lama' => 'nullable|string',
            'data.*.kabkota' => 'nullable|array',
            'data.*.kabkota.kode' => 'nullable|integer',
            'data.*.kabkota.nama' => 'nullable|string',
            'data.*.kabkota.kode_bps' => 'nullable|string',
            'data.*.kabkota.kode_lama' => 'nullable|string',
            'data.*.jenis_sarana' => 'nullable|array',
            'data.*.jenis_sarana.kode' => 'nullable|string',
            'data.*.jenis_sarana.nama' => 'nullable|string',
            'data.*.jenis_sarana.nama_alt' => 'nullable|string',
            'data.*.subjenis' => 'nullable|array',
            'data.*.subjenis.kode' => 'nullable|string',
            'data.*.subjenis.nama' => 'nullable|string',
            'data.*.subjenis.nama_alt' => 'nullable|string',
            'data.*.kelas_sarana' => 'nullable|array',
            'data.*.kelas_sarana.kode' => 'nullable|string',
            'data.*.kelas_sarana.nama' => 'nullable|string',
            'data.*.status_sarana' => 'nullable|string',
            'data.*.status_aktif' => 'required|boolean',
        ]);

        // Simpan data ke database
        $data = $validatedData['data'];
        foreach ($data as &$item) {
            // Simpan item ke database
            // ...
        }

        // Format response JSON
        $response = [
            'status_code' => 200,
            'message' => 'Data berhasil disimpan',
            'data' => $data,
        ];

        return response()->json($response);
    }
}
