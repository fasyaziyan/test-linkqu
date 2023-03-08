<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function store (Request $request)
    {
        $data = $request->all();
        $nama = "";
        $umur = "";
        $kota = "";

        $penduduk_fe = $data['penduduk'];

        //Menghapus kata TAHUN, THN, atau TH dan juga mengenali besar kecil kata tersebut
        $penduduk_fe = preg_replace('/(tahun|thn|th)/i', '', $penduduk_fe);

        // memecah input berdasarkan spasi
        $pecah = explode(" ", $penduduk_fe);

        // Mmengecek apabila setelah spasi angka maka akan dianggap umur dan setelah angka akan dianggap kota
        foreach ($pecah as $key => $value) {
            if (is_numeric($value)) {
                $umur = $value;
                $kota = implode(" ", array_slice($pecah, $key + 1));
                break;
            }
        }

        // mengambil nama
        $nama = implode(" ", array_slice($pecah, 0, $key));

        // // Insert
        $penduduk = new Penduduk();
        $penduduk->name = $nama;
        $penduduk->age = $umur;
        $penduduk->city = $kota;
        $penduduk->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil disimpan',
        ], 200);
    }
}
