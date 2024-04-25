<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Bansos</title>
</head>
<body>
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-lg-12 margin-tb">
                <div class="float-left">
                    <h2>Data Penerimaan Bansos</h2>
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
            <td>Nama Pengaju</td>
            <td>Nomer KK</td>
            <td>Total Pendapatan</td>
            <td>Jumlah Tanggungan</td>
            <td>Jumlah Kendaraan</td>
            <td>Jumlah Watt</td>
            <td>Luas Tanah</td>
            <td>Luas Rumah</td>
            <td>Status</td>
            <td>Tanggal Pengajuan</td>
            <td>Action</td>
        </tr>
        @foreach ($bansos as $data)
            <tr>
                <td>{{ $data->bansos_id }}</td>
                <td>{{ $data->nama_pengaju }}</td>
                <td>{{ $data->kartuKeluarga->NKK }}</td>
                <td>{{ $data->total_pendapatan }}</td>
                <td>{{ $data->jumlah_tanggungan }}</td>
                <td>{{ $data->jumlah_kendaraan }}</td>
                <td>{{ $data->jumlah_watt }}</td>
                <td>{{ $data->luas_tanah }}</td>
                <td>{{ $data->luas_rumah }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->tanggal_bansos }}</td>
                <td class="text-center">
                    <form action="{{ route('bansos.destroy', $data->bansos_id) }}" method="POST">
                        <a class="btn btn-info btn-sm" href="{{ route('bansos.show', $data->bansos_id) }}">Show</a>
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