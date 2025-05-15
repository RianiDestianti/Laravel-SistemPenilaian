<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BantuanController extends Controller
{
    public function index()
    {
        $faq = [
            [
                'question' => 'Bagaimana cara menambahkan data guru?',
                'answer' => 'Masuk ke menu Guru, klik tombol "Tambah Guru", isi form kemudian simpan.'
            ],
            [
                'question' => 'Bagaimana cara mengedit data nilai siswa?',
                'answer' => 'Di menu Nilai, cari data siswa yang ingin diedit, klik tombol Edit, ubah data, lalu simpan.'
            ],
            [
                'question' => 'Bagaimana cara mengekspor data nilai ke Excel?',
                'answer' => 'Pada halaman Nilai, klik tombol Ekspor dan pilih format Excel.'
            ],
            [
                'question' => 'Bagaimana cara menghapus data?',
                'answer' => 'Klik tombol Hapus pada data yang ingin dihapus, lalu konfirmasi penghapusan.'
            ],
        ];

        $panduan = "1. Login ke sistem dengan akun yang sudah terdaftar.  
2. Tambahkan data guru, murid, dan mata pelajaran melalui menu masing-masing.  
3. Masukkan nilai siswa di menu Nilai.  
4. Gunakan fitur ekspor untuk mengunduh laporan nilai.  
5. Gunakan menu Bantuan jika membutuhkan panduan.";

        return view('bantuan.index', compact('faq', 'panduan'));
    }
}
