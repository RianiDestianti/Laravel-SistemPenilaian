<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Guru;
use App\Models\Murid;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use App\Exports\RekapNilaiExport; 
use Illuminate\Support\Facades\Response;


class NilaiController extends Controller
{
    
    public function index(Request $request)
{
    $query = Nilai::with(['guru', 'murid', 'mataPelajaran']);

    if ($request->filled('search')) {
        $query->whereHas('guru', fn($q) =>
            $q->where('nama', 'like', '%' . $request->search . '%')
        )->orWhereHas('murid', fn($q) =>
            $q->where('nama', 'like', '%' . $request->search . '%')
        )->orWhereHas('mataPelajaran', fn($q) =>
            $q->where('mata_pelajaran', 'like', '%' . $request->search . '%')
        );
    }

    if ($request->filled('semester')) {
        $query->where('semester', $request->semester);
    }

    if ($request->filled('sort_by') && $request->filled('sort_order')) {
        $query->orderBy($request->sort_by, $request->sort_order);
    } else {
        $query->latest(); 
    }

    $nilai = $query->paginate(10)->appends($request->all());

    return view('nilai.index', compact('nilai'));
}


    public function create()
    {
        $guru = Guru::all();
        $murid = Murid::all();
        $mataPelajaran = MataPelajaran::all();
        return view('nilai.create', compact('guru', 'murid', 'mataPelajaran'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_murid' => 'required',
            'id_mata_pelajaran' => 'required',
            'nilai' => 'required|numeric',
            'predikat' => 'required',
            'semester' => 'required',
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $nilai = Nilai::findOrFail($id);
        $guru = Guru::all();
        $murid = Murid::all();
        $mataPelajaran = MataPelajaran::all();
        return view('nilai.edit', compact('nilai', 'guru', 'murid', 'mataPelajaran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_guru' => 'required',
            'id_murid' => 'required',
            'id_mata_pelajaran' => 'required',
            'nilai' => 'required|numeric',
            'predikat' => 'required',
            'semester' => 'required',
        ]);

        $nilai = Nilai::findOrFail($id);
        $nilai->update($request->all());

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $nilai = Nilai::findOrFail($id);
        $nilai->delete();

        return redirect()->route('nilai.index')->with('success', 'Data nilai berhasil dihapus.');
    }

    public function rekap()
{
    $murid = Murid::with(['nilai.mataPelajaran'])->get();
    $rekap = [];

    foreach ($murid as $m) {
        $data = [];

        foreach ($m->nilai as $n) {
            $mapel = $n->mataPelajaran->mata_pelajaran ?? '-';
            $semester = $n->semester;

            $key = "$mapel - Semester $semester";

            if (!isset($data[$key])) {
                $data[$key] = [
                    'total' => 0,
                    'count' => 0,
                ];
            }

            $data[$key]['total'] += $n->nilai;
            $data[$key]['count'] += 1;
        }

        $totalNilai = array_sum(array_column($data, 'total'));
        $totalMapel = array_sum(array_column($data, 'count'));
        $rataRata = $totalMapel > 0 ? round($totalNilai / $totalMapel, 2) : 0;

        $rekap[] = [
            'murid' => $m,
            'nilai' => $data,
            'rata_rata' => $rataRata,
        ];
    }

    return view('nilai.rekap', compact('rekap'));
}
public function exportPdf()
{
    $rekap = $this->getRekapData();

    $pdf = Pdf::loadView('nilai.rekap_pdf', compact('rekap'));
    return $pdf->download('rekap-nilai-siswa.pdf');
}
public function exportExcel()
{
    return Excel::download(new RekapNilaiExport, 'rekap-nilai-siswa.xlsx');
}
public function exportWord()
{
    $rekap = $this->getRekapData();
    $phpWord = new PhpWord();
    $section = $phpWord->addSection();

    $section->addText("Rekap Nilai Siswa", ['bold' => true, 'size' => 14]);

    foreach ($rekap as $item) {
        $section->addText("Nama: " . $item['murid']->nama);
        foreach ($item['nilai'] as $mapel => $nilai) {
            $section->addText("- $mapel: " . round($nilai['total'] / $nilai['count'], 2));
        }
        $section->addText("Rata-rata: " . $item['rata_rata']);
        $section->addTextBreak();
    }

    $filename = 'rekap-nilai.docx';
    $tempFile = tempnam(sys_get_temp_dir(), $filename);
    $writer = IOFactory::createWriter($phpWord, 'Word2007');
    $writer->save($tempFile);

    return response()->download($tempFile, $filename)->deleteFileAfterSend(true);
}
private function getRekapData()
{
    $murid = Murid::with(['nilai.mataPelajaran'])->get();
    $rekap = [];

    foreach ($murid as $m) {
        $data = [];
        foreach ($m->nilai as $n) {
            $mapel = $n->mataPelajaran->mata_pelajaran ?? '-';
            $semester = $n->semester;
            $key = "$mapel - Semester $semester";

            if (!isset($data[$key])) {
                $data[$key] = ['total' => 0, 'count' => 0];
            }

            $data[$key]['total'] += $n->nilai;
            $data[$key]['count'] += 1;
        }

        $totalNilai = array_sum(array_column($data, 'total'));
        $totalMapel = array_sum(array_column($data, 'count'));
        $rataRata = $totalMapel > 0 ? round($totalNilai / $totalMapel, 2) : 0;

        $rekap[] = [
            'murid' => $m,
            'nilai' => $data,
            'rata_rata' => $rataRata,
        ];
    }

    return $rekap;
}

}
