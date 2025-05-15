<?php
namespace App\Exports;

use App\Models\Murid;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class RekapNilaiExport implements FromArray, WithHeadings
{
    public function array(): array
    {
        $murid = Murid::with(['nilai.mataPelajaran'])->get();
        $data = [];

        foreach ($murid as $m) {
            $rekap = [];

            foreach ($m->nilai as $n) {
                $mapel = $n->mataPelajaran->mata_pelajaran ?? '-';
                $semester = $n->semester;
                $key = "$mapel - Semester $semester";

                if (!isset($rekap[$key])) {
                    $rekap[$key] = ['total' => 0, 'count' => 0];
                }

                $rekap[$key]['total'] += $n->nilai;
                $rekap[$key]['count'] += 1;
            }

            $row = ['Nama' => $m->nama];
            foreach ($rekap as $mapel => $nilai) {
                $row[$mapel] = round($nilai['total'] / $nilai['count'], 2);
            }

            $row['Rata-rata'] = count($rekap) ? round(array_sum(array_column($rekap, 'total')) / array_sum(array_column($rekap, 'count')), 2) : 0;
            $data[] = $row;
        }

        return $data;
    }

    public function headings(): array
    {
        return ['Nama', '...Mapel - Semester...', 'Rata-rata'];
    }
}
