<div>
    <h1>Data Persuratan</h1>
    <a href="/persuratan/create">Tambah</a>
    <table>
        <tr>
            <th>Persuratan ID</th>
            <th>Penduduk ID</th>
            <th>Nomor Surat</th>
            <th>Keterangan</th>
            <th>Tanggal Persuratan</th>
            <th>Aksi</th>
        </tr>
        @foreach($persuratan as $surat)
        <tr>
            <td>{{ $surat->persuratan_id }}</td>
            <td>{{ $surat->penduduk_id }}</td>
            <td>{{ $surat->nomor_surat }}</td>
            <td>{{ $surat->keterangan }}</td>
            <td>{{ $surat->tanggal_persuratan }}</td>
            <td>
                <a href="/persuratan/{{ $surat->persuratan_id }}/edit">Edit</a>
                <a href="/persuratan/{{ $surat->persuratan_id }}">Detail</a>
                <a>
                    <form action="/persuratan/{{ $surat->persuratan_id }}" method="POST">
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