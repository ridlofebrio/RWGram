<!DOCTYPE html>
<html>
<head>
    <title>Data Penerimaan Bantuan Sosial RW 06 Kelurahan Kalirejo, Kecamatan Lawang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <br/>
    <br/>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NKK</th>
                <th>Nama Pengaju</th>
                <th>Status</th>
                @foreach ($kriteria as $item)
                    <th>{{ $item->nama_kriteria }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach($bansos as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->kartuKeluarga->NKK }}</td>
                <td style="text-transform: capitalize;">{{ $data->nama_pengaju }}</td>
                <td style="text-transform: capitalize;">{{ $data->status }}</td>
                @foreach ($kriteria as $item)
                    <td>{{ $data['c'.$loop->iteration] }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
