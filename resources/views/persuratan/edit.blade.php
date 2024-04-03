<div>
    <h1>Edit Persurat</h1>
    <a href="/persuratan">Kembali</a>
    <div>
        <form action="{{ route('persuratan.update', $persuratan->persuratan_id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="penduduk_id"> Penduduk ID</label>
            <input type="text" name="penduduk_id" id="penduduk_id" value="{{ $persuratan->penduduk_id }}">
            <label for="nomor_surat"> Nomor Surat</label>
            <input type="text" name="nomor_surat" id="nomor_surat" value="{{ $persuratan->nomor_surat }}">
            <label for="keterangan"> Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" value="{{ $persuratan->keterangan }}">
            <label for="tanggal_persuratan"> Tanggal Persuratan</label>
            <input type="datetime" name="tanggal_persuratan" id="tanggal_persuratan" value="{{ $persuratan->tanggal_persuratan }}">
            <button type="submit">Submit</button>
        </form>
    </div>
</div>