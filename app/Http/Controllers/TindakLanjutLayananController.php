<?php

namespace App\Http\Controllers;

use App\Models\Tindak_lanjut_layanan;
use App\Models\Layanan_spbe;
use App\Models\User;
use Illuminate\Http\Request;

class TindakLanjutLayananController extends Controller
{
    public function index()
    {
        $tindakLanjut = Tindak_lanjut_layanan::with('layanan')->latest()->paginate(10);
        return view('tindak-lanjut.index', compact('tindakLanjut'));
    }

    public function create()
    {
        $layanan = Layanan_spbe::all();
        $petugas = User::where('role', 'staff')->get();
        return view('tindak-lanjut.create', compact('layanan', 'petugas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_layanan' => 'required|exists:layanan_spbe,id',
            'id_petugas' => 'required|array',
            'id_petugas.*' => 'exists:users,id',
            'keterangan' => 'nullable|string',
        ]);

        Tindak_lanjut_layanan::create([
            'id_layanan' => $request->id_layanan,
            'id_petugas' => $request->id_petugas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tindak-lanjut.index')->with('success', 'Tindak lanjut layanan berhasil dibuat!');
    }

    public function show($id)
    {
        $tindakLanjut = Tindak_lanjut_layanan::with('layanan')->findOrFail($id);
        return view('tindak-lanjut.show', compact('tindakLanjut'));
    }

    public function edit($id)
    {
        $tindakLanjut = Tindak_lanjut_layanan::findOrFail($id);
        $layanan = Layanan_spbe::all();
        $petugas = User::where('role', 'staff')->get();
        return view('tindak-lanjut.edit', compact('tindakLanjut', 'layanan', 'petugas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_layanan' => 'required|exists:layanan_spbe,id',
            'id_petugas' => 'required|array',
            'id_petugas.*' => 'exists:users,id',
            'keterangan' => 'nullable|string',
        ]);

        $tindakLanjut = Tindak_lanjut_layanan::findOrFail($id);
        $tindakLanjut->update([
            'id_layanan' => $request->id_layanan,
            'id_petugas' => $request->id_petugas,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tindak-lanjut.index')->with('success', 'Tindak lanjut layanan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $tindakLanjut = Tindak_lanjut_layanan::findOrFail($id);
        $tindakLanjut->delete();

        return redirect()->route('tindak-lanjut.index')->with('success', 'Tindak lanjut layanan berhasil dihapus!');
    }
}
