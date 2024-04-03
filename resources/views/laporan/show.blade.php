<div>
    <h1>Data Laporan</h1>
    <a href="/laporan">Kembali</a>
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
        <tr>
            <td>{{ $laporan->laporan_id }}</td>
            <td>{{ $laporan->penduduk_id }}</td>
            <td>{{ $laporan->jenis_laporan }}</td>
            <td>{{ $laporan->deskripsi_laporan }}</td>
            <td>{{ $laporan->tanggal_laporan }}</td>
            <td>{{ $laporan->status_laporan }}</td>
        </tr>
    </table>
</div>