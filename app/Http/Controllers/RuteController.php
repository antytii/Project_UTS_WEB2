<?php
namespace App\Http\Controllers;

use App\Models\Rute;
use Illuminate\Http\Request;

class RuteController extends Controller
{
    public function index()
    {
        $rutes = Rute::all();
        return view('rute.index', compact('rutes'));
    }

    public function create()
    {
        return view('rute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
        ]);

        Rute::create($request->all());
        return redirect()->route('rute.index')->with('success', 'Rute berhasil ditambahkan');
    }

    public function edit(Rute $rute)
    {
        return view('rute.edit', compact('rute'));
    }

    public function update(Request $request, Rute $rute)
    {
        $request->validate([
            'asal' => 'required',
            'tujuan' => 'required',
        ]);

        $rute->update($request->all());
        return redirect()->route('rute.index')->with('success', 'Rute berhasil diupdate');
    }

    public function destroy(Rute $rute)
    {
        $rute->delete();
        return back()->with('success', 'Rute berhasil dihapus');
    }
}
