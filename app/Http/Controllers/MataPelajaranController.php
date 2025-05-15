<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
   public function index(Request $request)
{
    $query = MataPelajaran::query();

    if ($search = $request->input('search')) {
        $query->where('kode', 'like', "%$search%")
              ->orWhere('mata_pelajaran', 'like', "%$search%");
    }

    $sort = $request->input('sort', 'mata_pelajaran');
    $direction = $request->input('direction', 'asc');

    $mapel = $query->orderBy($sort, $direction)->paginate(10);

    return view('mapel.index', compact('mapel'));
}


    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:mata_pelajaran,kode',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        return view('mapel.edit', compact('mapel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required',
            'mata_pelajaran' => 'required|string|max:255',
        ]);

        $mapel = MataPelajaran::findOrFail($id);
        $mapel->update($request->all());

        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $mapel = MataPelajaran::findOrFail($id);
        $mapel->delete();

        return redirect()->route('mata-pelajaran.index')->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
