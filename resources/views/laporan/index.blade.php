<div>
    <h1>Data Laporan</h1>
    <table>
        <tr>
            <th>Laporan ID</th>
            <th>Penduduk ID</th>
            <th>Jenis Laporan</th>
            <th>Deskripsi</th>
            <th>Tanggal Laporan</th>
            <th>Status Laporan</th>
            <th>Aksi</th>
        </tr>
        @foreach($laporan as $lap)
        <tr>
            <td>{{ $lap->laporan_id }}</td>
            <td>{{ $lap->penduduk_id }}</td>
            <td>{{ $lap->jenis_laporan }}</td>
            <td>{{ $lap->deskripsi_laporan }}</td>
            <td>{{ $lap->tanggal_laporan }}</td>
            <td>{{ $lap->status_laporan }}</td>
            <td>
                <a href="/laporan/{{ $lap->laporan_id }}/edit">Edit</a>
                <a href="/laporan/{{ $lap->laporan_id }}">Detail</a>
                <a>
                    <form action="/laporan/{{ $lap->laporan_id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>