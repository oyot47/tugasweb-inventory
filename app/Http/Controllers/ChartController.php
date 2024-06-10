<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function myControllerMethod()
    {
        // Contoh logika untuk mendapatkan total barang masuk, barang keluar, dan total produk
        $totalBarangMasuk = 100; // Misalnya, ganti dengan logika sesuai dengan kebutuhan aplikasi Anda
        $totalBarangKeluar = 80; // Misalnya, ganti dengan logika sesuai dengan kebutuhan aplikasi Anda
        $totalProduk = 120; // Misalnya, ganti dengan logika sesuai dengan kebutuhan aplikasi Anda

        // Melewatkan nilai ke tampilan 'nama_tampilan' menggunakan compact()
        return view('nama_tampilan', compact('totalBarangMasuk', 'totalBarangKeluar', 'totalProduk'));
    }
}
