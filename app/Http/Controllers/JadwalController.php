<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\Rute;
use App\Models\Speedboad;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwals = Jadwal::all();
        return view('jadwal.index', compact('jadwals'));
    }

    public function create()
    {
        $this->authorizeAdmin();
        $speedboads = Speedboad::all();
        $rutes = Rute::all();
        return view('jadwal.create', compact('speedboads', 'rutes'));
    }

    public function store(Request $request)
    {
        $this->authorizeAdmin();

        $request->validate([
            'rute_id' => 'required|exists:rutes,id',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tujuan' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'speedboad_id' => 'nullable|exists:speedboads,id',
        ]);

        Jadwal::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan!');
    }

    public function edit($id)
{
    $this->authorizeAdmin();

    $jadwal = Jadwal::findOrFail($id);
    $rutes = Rute::all(); // <- tambahkan ini
    $speedboads = Speedboad::all();
    
    return view('jadwal.edit', compact('jadwal', 'rutes', 'speedboads'));
}


    public function update(Request $request, $id)
    {
        $this->authorizeAdmin();

        $request->validate([
            'rute_id' => 'required|exists:rutes,id',
            'tanggal' => 'required|date',
            'waktu' => 'required',
            'tujuan' => 'required|string|max:255',
            'kapasitas' => 'required|integer|min:1',
            'speedboad_id' => 'nullable|exists:speedboads,id', // <- dropdown speedboad_id
        ]);

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $this->authorizeAdmin();

        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }

    // 🔐 Fungsi reusable untuk mengecek apakah admin
    private function authorizeAdmin()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Anda tidak memiliki akses.');
        }
    }
}
