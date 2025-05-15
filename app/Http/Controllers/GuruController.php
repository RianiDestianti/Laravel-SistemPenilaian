<?php

// GuruController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // pastikan ada
use App\Models\MataPelajaran;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
{
    $query = Guru::with('mapel');

    if ($search = $request->input('search')) {
        $query->where('nama', 'like', "%$search%")
              ->orWhere('nip', 'like', "%$search%")
              ->orWhereHas('mapel', function ($q) use ($search) {
                  $q->where('mata_pelajaran', 'like', "%$search%");
              });
    }

    $sort = $request->input('sort', 'nama');
    $direction = $request->input('direction', 'asc');

    $guru = $query->orderBy($sort, $direction)->paginate(10);

    return view('guru.index', compact('guru'));
}


    public function create()
    {
        $mapel = MataPelajaran::all();
        return view('guru.create', compact('mapel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'mata_pelajaran' => 'required|exists:mata_pelajaran,id',
            'id_user' => 'required|exists:users,id',
        ]);

        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'mata_pelajaran' => $request->mata_pelajaran,
            'id_user' => $request->id_user,
        ]);

        return redirect()->route('guru.index')->with('success', 'Guru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        $mapel = MataPelajaran::all();
        return view('guru.edit', compact('guru', 'mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'email' => 'required|email',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'required|date',
            'mata_pelajaran' => 'required|exists:mata_pelajaran,id',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'mata_pelajaran' => $request->mata_pelajaran,
        ]);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
