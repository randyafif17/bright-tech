<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Menggunakan model Task
use Illuminate\Support\Carbon;


class frontendController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date', now()->toDateString()); // Mengambil tanggal dari request, defaultnya adalah hari ini
        $tasks = Task::whereDate('created_at', $date)->get(); // Mengambil data tasks berdasarkan tanggal
    
        return view('frontend.index', [
            'tasks' => $tasks,
            'selectedDate' => $date // Meneruskan tanggal yang dipilih ke view
        ]);
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
