@extends('layouts.template')

@section('content')
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
                    <h2>Pengajuan Penerimaan Bansos</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('bansos.index') }}">Kembali</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('error'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
        @endif
    
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ops</strong> Input gagal<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <form action="{{ route('bansos.store') }}" method="POST">
            @csrf
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Kartu Keluarga:</strong>
                    <input type="text" name="nomer_kk" class="form-control" placeholder="Masukkan Nomor Kartu Keluarga">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Pengaju:</strong>
                    <input type="text" name="nama_pengaju" class="form-control" placeholder="Masukkan Nama Pengaju">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Pendapatan:</strong>
                    <input type="number" name="total_pendapatan" class="form-control" placeholder="Masukkan Total Pendapatan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Tanggungan:</strong>
                    <input type="number" name="jumlah_tanggungan" class="form-control" placeholder="Masukkan Jumlah Tanggungan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Kendaraan:</strong>
                    <input type="number" name="jumlah_kendaraan" class="form-control" placeholder="Masukkan Jumlah Kendaraan">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Watt Listrik:</strong>
                    <input type="number" name="jumlah_watt" class="form-control" placeholder="Masukkan Jumlah Watt">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Luas Tanah (m^2):</strong>
                    <input type="number" name="luas_tanah" class="form-control" placeholder="Masukkan Luas Tanah">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Luas Rumah (m^2):</strong>
                    <input type="number" name="luas_rumah" class="form-control" placeholder="Masukkan Luas Rumah">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
@endsection
