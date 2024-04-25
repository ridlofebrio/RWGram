@extends('umkm/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Tes CRUD UMKM</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('umkm.create') }}">Input User</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">UMKM id</th>
            <th width="150px" class="text-center">Penduduk id</th>
            <th width="200px" class="text-center">Nama UMKM</th>
            <th width="200px" class="text-center">Foto UMKM</th>
            <th width="150px" class="text-center">Link Medsos</th>
            <th width="150px" class="text-center">Deskripsi UMKM</th>
            <th width="150px" class="text-center">Lokasi UMKM</th>
            <th width="150px" class="text-center">Tanggal UMKM</th>
        </tr>
        @foreach ($umkm as $m_umkm)
            <tr>
                <td>{{ $m_umkm->umkm_id }}</td>
                <td>{{ $m_umkm->penduduk_id }}</td>
                <td>{{ $m_umkm->nama_umkm }}</td>
                <td>{{ $m_umkm->foto_umkm }}</td>
                <td>{{ substr($m_umkm->link_medsos, 0, 10) . "..." }}</td>
                <td>{{ substr($m_umkm->deskripsi_umkm, 0, 10) . "..." }}</td>
                <td>{{ $m_umkm->lokasi_umkm }}</td>
                <td>{{ $m_umkm->tanggal_umkm }}</td>
                <td class="text-center d-flex justify-content-center align-items-center">
                    <form action="{{ route('umkm.destroy', $m_umkm->umkm_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('umkm.show', $m_umkm->umkm_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('umkm.edit', $m_umkm->umkm_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection