<div>
    <h1>Membuat Laporan</h1>
    <a href="/laporan">Kembali</a>
    <div>
        <form action="{{ route('laporan.update', $laporan->laporan_id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="penduduk_id"> Penduduk ID</label>
            <input type="text" name="penduduk_id" id="penduduk_id" value="{{ $laporan->penduduk_id }}">
            <label for="jenis_laporan"> Jenis Laporan</label>
            <input type="text" name="jenis_laporan" id="jenis_laporan" value="{{ $laporan->jenis_laporan }}">
            <label for="keterangan"> Deskripsi Laporan</label>
            <input type="text" name="deskripsi_laporan" id="deskripsi_laporan" value="{{ $laporan->deskripsi_laporan }}">
            <label for="tanggal_laporan"> Tanggal Laporan</label>
            <input type="datetime" name="tanggal_laporan" id="tanggal_laporan" value="{{ $laporan->tanggal_laporan }}">
            <input type="text" name="status_laporan" id="status_laporan" value="{{ $laporan->status_laporan }}">
            <button type="submit">Submit</button>
        </form>
    </div>
</div>