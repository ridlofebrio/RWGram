@extends('umkm/template')
@section('content')
<div class="container mt-5 mb-5">
  <div class="row justify-content-between align-items-center">
    <div class="col-auto">
      <h2>Tambah UMKM</h2>
    </div>
    <div class="col-auto">
      <a class="btn btn-secondary" href="{{ route('umkm.index') }}">Kembali</a>
    </div>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <strong>Ops!</strong> Input gagal.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('umkm.store') }}" method="POST" enctype="multipart/form-data"> @csrf
    <div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="penduduk_id">Nama Nomor Penduduk:</label>
              <input type="text" name="penduduk_id" id="penduduk_id" class="form-control" placeholder="Masukkan Nomor" required>
        </div>
    </div>

      <div class="col-md-6">
        <div class="form-group">
          <label for="nama_umkm"> Nama UMKM:</label>
          <input type="text" name="nama_umkm" id="nama_umkm" class="form-control" placeholder="Masukkan nama" required>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="form-group">
          <label for="foto_umkm">Foto UMKM:</label>
          <input type="file" name="foto_umkm" id="foto_umkm" class="form-control">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="link_medsos">Link Medsos:</label>
          <input type="text" name="link_medsos" id="link_medsos" class="form-control" placeholder="Masukkan Link">
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <label for="deskripsi_umkm">Deskripsi UMKM:</label>
          <textarea name="deskripsi_umkm" id="deskripsi_umkm" class="form-control" rows="3" placeholder="Masukkan Deskripsi" required></textarea>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label for="lokasi_umkm">Lokasi UMKM:</label>
            <input type="text" name="lokasi_umkm" id="lokasi_umkm" class="form-control" placeholder="Masukkan Lokasi" required>
          </div>
        </div>
      </div>
      
    <div class="row justify-content-center">
      <div class="col-auto">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>
@endsection

