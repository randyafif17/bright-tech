<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'type' => 'nullable|string|max:255',
            'visit_at' => 'nullable|date',
            'post_at' => 'nullable|date',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:255',
            'payment_status' => 'nullable|string|max:255',
            'linkedin_link' => 'nullable|string|max:255',
        ]);

        // Simpan data ke dalam database
        Task::create([
            'name' => $request->name,
            'role' => $request->role,
            'address' => $request->address,
            'type' => $request->type,
            'visit_at' => $request->visit_at,
            'post_at' => $request->post_at,
            'description' => $request->description,
            'status' => $request->status,
            'payment_status' => $request->payment_status,
            'linkedin_link' => $request->linkedin_link,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()->route('frontend')->with('status', 'Task created successfully.');
    }
}
