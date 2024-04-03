@extends('umkm/template')
@section('content')
<div class="container mt-5 mb-5">
  <div class="row justify-content-between align-items-center">
    <div class="col-auto">
      <h2>Edit UMKM</h2>
    </div>
    <div class="col-auto">
      <a class="btn btn-secondary" href="{{ route('umkm.index') }}">Kembali</a>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Ops!</strong> Kesalahan pada input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('umkm.update', $umkm->umkm_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="penduduk_id">ID Penduduk:</label>
          <input type="text" name="penduduk_id" value="{{ $umkm->penduduk_id }}" class="form-control" placeholder="Masukkan ID Penduduk" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="nama_umkm">Nama UMKM:</label>
          <input type="text" name="nama_umkm" value="{{ $umkm->nama_umkm }}" class="form-control" placeholder="Masukkan Nama UMKM" required>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="foto_umkm">Foto UMKM:</label>
          <input type="file" name="foto_umkm" id="foto_umkm" class="form-control">
          @if ($umkm->foto_umkm)
            <p>Foto saat ini: {{ $umkm->foto_umkm }}</p>
          @endif
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="link_medsos">Link Medsos:</label>
          <input type="text" name="link_medsos" value="{{ $umkm->link_medsos }}" class="form-control" placeholder="Masukkan Link Medsos">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="deskripsi_umkm">Deskripsi UMKM:</label>
          <textarea name="deskripsi_umkm" class="form-control" rows="3" placeholder="Masukkan Deskripsi UMKM" required>{{ $umkm->deskripsi_umkm }}</textarea>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="lokasi_umkm">Lokasi UMKM:</label>
          <input type="text" name="lokasi_umkm" value="{{ $umkm->lokasi_umkm }}" class="form-control" placeholder="Masukkan Lokasi UMKM" required>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Perbarui</button>
      </div>
    </div>
  </form>
</div>
@endsection
