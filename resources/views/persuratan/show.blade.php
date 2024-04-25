<div>
    <h1>Data Persuratan</h1>
    <a href="/persuratan">Kembali</a>
    <table>
        <tr>
            <th>Persuratan ID</th>
            <th>Penduduk ID</th>
            <th>Nomor Surat</th>
            <th>Keterangan</th>
            <th>Tanggal Persuratan</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>{{ $persuratan->persuratan_id }}</td>
            <td>{{ $persuratan->penduduk_id }}</td>
            <td>{{ $persuratan->nomor_surat }}</td>
            <td>{{ $persuratan->keterangan }}</td>
            <td>{{ $persuratan->tanggal_persuratan }}</td>
        </tr>
    </table>
</div>