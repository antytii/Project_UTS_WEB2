<?php

namespace App\Http\Controllers;

use App\Models\Speedboad;
use Illuminate\Http\Request;

class SpeedboadController extends Controller
{
    public function index()
    {
        $speedboads = Speedboad::all();
        return view('speedboad.index', compact('speedboads'));
    }

    public function create()
    {
        return view('speedboad.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable',
        ]);

        Speedboad::create($request->all());

        return redirect()->route('speedboad.index')->with('success', 'Speedboad berhasil ditambahkan!');
    }

    public function edit(Speedboad $speedboad)
    {
        return view('speedboad.edit', compact('speedboad'));
    }

    public function update(Request $request, Speedboad $speedboad)
    {
        $request->validate([
            'nama' => 'required',
            'kapasitas' => 'required|integer',
            'deskripsi' => 'nullable',
        ]);

        $speedboad->update($request->all());

        return redirect()->route('speedboad.index')->with('success', 'Speedboad berhasil diupdate!');
    }

    public function destroy(Speedboad $speedboad)
    {
        $speedboad->delete();

        return redirect()->route('speedboad.index')->with('success', 'Speedboad berhasil dihapus!');
    }
}
