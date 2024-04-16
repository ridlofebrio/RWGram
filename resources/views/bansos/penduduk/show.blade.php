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
                    <h2>Detail Penerimaan Bansos</h2>
                </div>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('bansos.penduduk.request') }}">Kembali</a>
                </div>
            </div>
        </div>
    
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID:</strong>
                    {{ $bansos->bansos_id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Pengaju:</strong>
                    {{ $bansos->nama_pengaju }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomer KK:</strong>
                    {{ $bansos->kartuKeluarga->NKK }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Pendapatan:</strong>
                    {{ $bansos->total_pendapatan }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Tanggungan:</strong>
                    {{ $bansos->jumlah_tanggungan }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Kendaraan:</strong>
                    {{ $bansos->jumlah_kendaraan }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Watt:</strong>
                    {{ $bansos->jumlah_watt }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Luas Tanah:</strong>
                    {{ $bansos->luas_tanah }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Luas Rumah:</strong>
                    {{ $bansos->luas_rumah }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    {{ $bansos->status }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Pengajuan:</strong>
                    {{ $bansos->tanggal_bansos }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>