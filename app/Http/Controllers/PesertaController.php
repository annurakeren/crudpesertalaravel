<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PesertaController extends Controller
{
    // READ - Tampilkan semua data
    public function index()
    {
        $pesertas = Peserta::latest()->paginate(10);
        return view('pesertas.index', compact('pesertas'));
    }

    // Tampilkan form tambah
    public function create()
    {
        return view('pesertas.create');
    }

    // CREATE - Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'foto'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'nama'       => 'required|string|max:255',
            'no_ujian'   => 'required|string|unique:pesertas',
            'nilai_ujian'=> 'required|numeric|min:0|max:100',
        ]);

        // Upload foto
        $foto = $request->file('foto');
        $foto->storeAs('public/pesertas', $foto->hashName());

        Peserta::create([
            'foto'        => $foto->hashName(),
            'nama'        => $request->nama,
            'no_ujian'    => $request->no_ujian,
            'nilai_ujian' => $request->nilai_ujian,
        ]);

        return redirect()->route('pesertas.index')
                         ->with('success', 'Data peserta berhasil ditambahkan!');
    }

    // Tampilkan form edit
    public function edit(Peserta $peserta)
    {
        return view('pesertas.edit', compact('peserta'));
    }

    // UPDATE - Perbarui data
    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'foto'       => 'image|mimes:jpeg,png,jpg|max:2048',
            'nama'       => 'required|string|max:255',
            'no_ujian'   => 'required|string|unique:pesertas,no_ujian,' . $peserta->id,
            'nilai_ujian'=> 'required|numeric|min:0|max:100',
        ]);

        // Cek apakah ada foto baru
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $foto->storeAs('public/pesertas', $foto->hashName());

            // Hapus foto lama
            Storage::delete('public/pesertas/' . $peserta->foto);

            $peserta->update([
                'foto'        => $foto->hashName(),
                'nama'        => $request->nama,
                'no_ujian'    => $request->no_ujian,
                'nilai_ujian' => $request->nilai_ujian,
            ]);
        } else {
            $peserta->update([
                'nama'        => $request->nama,
                'no_ujian'    => $request->no_ujian,
                'nilai_ujian' => $request->nilai_ujian,
            ]);
        }

        return redirect()->route('pesertas.index')
                         ->with('success', 'Data peserta berhasil diperbarui!');
    }

    // DELETE - Hapus data
    public function destroy(Peserta $peserta)
    {
        Storage::delete('public/pesertas/' . $peserta->foto);
        $peserta->delete();

        return redirect()->route('pesertas.index')
                         ->with('success', 'Data peserta berhasil dihapus!');
    }
}