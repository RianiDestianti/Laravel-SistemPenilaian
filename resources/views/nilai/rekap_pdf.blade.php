<!DOCTYPE html>
<html>
<head>
    <title>Rekap Nilai Siswa</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 5px; }
    </style>
</head>
<body>
    <h2>Rekap Nilai Siswa</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Rekap Nilai</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rekap as $item)
            <tr>
                <td>{{ $item['murid']->nama }}</td>
                <td>
                    <ul>
                        @foreach($item['nilai'] as $mapel => $nilai)
                            <li>{{ $mapel }}: {{ round($nilai['total'] / $nilai['count'], 2) }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $item['rata_rata'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
