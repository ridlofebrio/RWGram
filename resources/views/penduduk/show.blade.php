<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>NIK : {{$data->NIK}}</h3>
    <h3>Nama Penduduk : {{$data->nama_penduduk}}</h3>
    <h3>Tanggal Lahir : {{$data->tanggal_lahir}}</h3>
    <h3>Status Perkawinan: {{$data->status_perkawinan}}</h3>
    <h3>Jenis Kelamin : {{$data->jenis_kelamin}}</h3>
    <h3>Alamat : {{$data->alamat}}</h3>
    <h3>Agama : {{$data->agama}}</h3>
    <h3>Pekerjaan : {{$data->pekerjaan}}</h3>
    <h3>Status Tinggal : {{$data->status_tinggal}}</h3>
    <h3>Status Kematian : {{$data->status_kematian=== 1 ? "Mati":"Hidup"}}</h3>
</body>
</html>