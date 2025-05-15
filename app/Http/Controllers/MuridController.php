<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // pastikan ada
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index(Request $request)
{
    $query = Murid::query();

    if ($search = $request->input('search')) {
        $query->where(function($q) use ($search) {
            $q->where('nama', 'like', "%$search%")
              ->orWhere('nis', 'like', "%$search%")
              ->orWhere('kelas', 'like', "%$search%");
        });
    }

    if ($jk = $request->input('jenis_kelamin')) {
        $query->where('jenis_kelamin', $jk);
    }

    $sort = $request->input('sort', 'nama');
    $direction = $request->input('direction', 'asc');
    $query->orderBy($sort, $direction);

    $murid = $query->paginate(10);

    return view('murid.index', compact('murid'));
}


    public function create()
    {
        return view('murid.create');
    }

   public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'nis' => 'required',
        'kelas' => 'required',
        'no_telp' => 'required',
        'jenis_kelamin' => 'required|in:L,P',
        'tanggal_lahir' => 'required|date',
    ]);

    Murid::create([
        'nama' => $request->nama,
        'nis' => $request->nis,
        'kelas' => $request->kelas,
        'no_telp' => $request->no_telp,
        'jenis_kelamin' => $request->jenis_kelamin,
        'tanggal_lahir' => $request->tanggal_lahir,
        'id_user' => Auth::id(), // <--- INI WAJIB DIISI
    ]);

    return redirect()->route('murid.index')->with('success', 'Data murid berhasil ditambahkan.');
}
    public function edit($id)
    {
        $murid = Murid::findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    public function update(Request $request, $id)
    {
       $request->validate([
    'nama' => 'required',
    'nis' => 'required',
    'kelas' => 'required',
    'no_telp' => 'required',
    'jenis_kelamin' => 'required|in:L,P', 
    'tanggal_lahir' => 'required|date',
]);


        $murid = Murid::findOrFail($id);
        $murid->update($request->all());

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $murid = Murid::findOrFail($id);
        $murid->delete();

        return redirect()->route('murid.index')->with('success', 'Data murid berhasil dihapus.');
    }
}
