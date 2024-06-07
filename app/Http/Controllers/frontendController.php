<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Menggunakan model Task

class frontendController extends Controller
{
    public function index()
    {
        // Ambil semua data tasks dari database
        $tasks = Task::all();

        // Kirim data tasks ke view 'frontend.index'
        return view('frontend.index', ['tasks' => $tasks]);
    }

    public function store(Request $request)
    {
        // Validasi input data jika diperlukan
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'role' => 'required|string|max:255',
            'description' => 'required|string',
            // Tambahkan validasi untuk input lainnya jika diperlukan
        ]);

        // Simpan data ke dalam database menggunakan model Task
        Task::create($validatedData);

        // Redirect ke rute yang sesuai setelah penyimpanan data
        return redirect()->route('frontend')->with('status', 'Data task berhasil disimpan.');
    }
}
