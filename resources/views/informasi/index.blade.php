<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Informasi</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Data Informasi</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-success" href="{{ url('informasi/create') }}">Add</a>
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
            <td>ID</td>
            <td>User</td>
            <td>Judul</td>
            <td>Deskripsi</td>
            <td>Foto</td>
            <td>Lokasi</td>
            <td>Tanggal</td>
            <td>Action</td>
        </tr>
        @foreach ($informasi as $info)
            <tr>
                <td>{{ $info->informasi_id }}</td>
                <td>{{ $info->user->nama_user }}</td>
                <td>{{ $info->judul }}</td>
                <td>{{ $info->deskrisi_informasi }}</td>
                <td> .... </td>
                <td>{{ $info->lokasi_informasi }}</td>
                <td>{{ $info->tanggal_informasi }}</td>
                <td class="text-center">
                    <form action="{{ route('informasi.destroy', $info->informasi_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('informasi.show', $info->informasi_id) }}">Show</a>
                        <a class="btn btn-primary btn-sm" href="{{ route('informasi.edit', $info->informasi_id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>                    
                </td>
            </tr>
        @endforeach
    </table>
    </div>
</body>
</html>