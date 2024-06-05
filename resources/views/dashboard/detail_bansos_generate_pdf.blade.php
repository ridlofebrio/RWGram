<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Langkah Pengerjaan SAW dan TOPSIS</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1, h2, h3 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <h2>{{ $date }}</h2>

    <h3>Metode SAW</h3>
    @foreach ($sawSteps as $step)
        @if (isset($step['maxValues']) && isset($step['minValues']))
            <h4>Nilai Maksimum dan Minimum</h4>
            <table>
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Max Value</th>
                        <th>Min Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $k)
                        <tr>
                            <td>{{ $k->nama_kriteria }}</td>
                            <td>{{ $step['maxValues']['c' . $k->kriteria_id] }}</td>
                            <td>{{ $step['minValues']['c' . $k->kriteria_id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        @if (isset($step['normalizedMatrix']) && isset($step['weightedMatrix']))
            <h4>Nilai Ternormalisasi</h4>
            <table>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $k)
                            <th>{{ $k->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['normalizedMatrix'] as $bansos_id => $normalizedValues)
                        <tr>
                            <td>{{ 'A' . $bansos_id }}</td>
                            @foreach ($kriteria as $k)
                                <td>{{ number_format($normalizedValues['c' . $k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Nilai Ternormalisasi Berbobot</h4>
            <table>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        @foreach ($kriteria as $k)
                            <th>{{ $k->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['weightedMatrix'] as $bansos_id => $weightedValues)
                        <tr>
                            <td>{{ 'A' . $bansos_id }}</td>
                            @foreach ($kriteria as $k)
                                <td>{{ number_format($weightedValues['c' . $k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h4>Nilai SAW</h4>
            <table>
                <thead>
                    <tr>
                        <th>Alternatif</th>
                        <th>Nilai SAW</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['sawScores'] as $bansos_id => $sawScore)
                        <tr>
                            <td>{{ 'A' . $bansos_id }}</td>
                            <td>{{ number_format($sawScore, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach

    <h3>Metode TOPSIS</h3>
    @foreach ($topsisSteps as $step)
        @if (isset($step['sumSquares']))
            <h4>Jumlah Kuadrat</h4>
            <table>
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Sum Squares</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $k)
                        <tr>
                            <td>{{ $k->nama_kriteria }}</td>
                            <td>{{ $step['sumSquares']['c' . $k->kriteria_id] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif (isset($step['normalizedMatrix']))
            <h4>Matriks Ternormalisasi</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        @foreach ($kriteria as $k)
                            <th>{{ $k->nama_kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['normalizedMatrix'] as $index => $normalizedItem)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            @foreach ($kriteria as $k)
                                <td>{{ number_format($normalizedItem['c' . $k->kriteria_id], 4) }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif (isset($step['idealPositive']) && isset($step['idealNegative']))
            <h4>Solusi Ideal Positif dan Negatif</h4>
            <table>
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Ideal Positif</th>
                        <th>Ideal Negatif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kriteria as $k)
                        <tr>
                            <td>{{ $k->nama_kriteria }}</td>
                            <td>{{ number_format($step['idealPositive']['c' . $k->kriteria_id], 4) }}</td>
                            <td>{{ number_format($step['idealNegative']['c' . $k->kriteria_id], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif (isset($step['distances']))
            <h4>Jarak terhadap Solusi Ideal</h4>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jarak Positif</th>
                        <th>Jarak Negatif</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['distances'] as $index => $distance)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ number_format($distance['positive'], 4) }}</td>
                            <td>{{ number_format($distance['negative'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @elseif (isset($step['preferences']))
            <h4>Nilai Preferensi</h4>
            <table>
                <thead>
                    <tr>
                        <th>Ranking</th>
                        <th>Nilai Preferensi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($step['preferences'] as $index => $preference)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ number_format($preference, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach
</body>
</html>
