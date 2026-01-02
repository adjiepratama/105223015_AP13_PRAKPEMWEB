<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;

class AspirasiController extends Controller
{
    // Menampilkan halaman utama + data aspirasi
    public function index()
    {
        // Ambil data dari yang terbaru
        $aspirasis = Aspirasi::latest()->get();
        // Hapus 'aspirasi.' jika file index.blade.php ada langsung di folder views
return view('index', compact('aspirasis'));
    }

    // Menyimpan aspirasi baru
    public function store(Request $request)
    {
        // Validasi input sederhana
        $request->validate([
            'nama_pengirim' => 'required|max:50',
            'kategori'      => 'required',
            'isi_laporan'   => 'required|min:10'
        ]);

        // Simpan ke database
        Aspirasi::create([
            'nama_pengirim' => $request->nama_pengirim,
            'kategori'      => $request->kategori,
            'isi_laporan'   => $request->isi_laporan
        ]);

        // Kembali ke halaman awal dengan pesan sukses
        return redirect()->back()->with('success', 'Terima kasih! Aspirasi Anda berhasil dikirim.');
    }
}