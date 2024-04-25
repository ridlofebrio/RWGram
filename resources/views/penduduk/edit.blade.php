<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/penduduk/'.$data->penduduk_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nkk">NKK</label>
            <input type="text" name="nkk" value="{{$data->kartuKeluarga->NKK}}" id="">
        </div>
        <div class="form-group">
            <label for="rt">RT</label>
            <input type="number" name="rt" id="" value="{{$data->kartuKeluarga->rt->nomor_rt}}">
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" value="{{$data->NIK}}" id="">
        </div>
    
        <div class="form-group">
            <label for="nama">nama </label>
            <input type="text" name="nama" value="{{$data->nama_penduduk}}" id="">
        </div>
    
        <div class="form-group">
            <label for="tanggal_lahir">tanggal lahir </label>
            <input type="date" name="tanggal_lahir" value="{{$data->tanggal_lahir}}" id="">
        </div>
    
        <div class="form-group">
            <label for="perkawinan">status perkawinan </label>
            <select name="perkawinan"  id="">
                <option value="kawin" {{$data->status_perkawinan == 'kawin'? 'selected':''}} >Kawin </option>  
                <option value="belum kawin" {{$data->status_perkawinan == 'belum kawin'? 'selected':''}} >Belum Kawin</option>  
                <option value="cerai" {{$data->status_perkawinan == 'cerai'? 'selected':''}} >Cerai</option>  
    
            </select>
        </div>
    
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin </label>
            <select name="jenis_kelamin" id="">
                <option value="L" {{$data->jenis_kelamin == 'L'? 'selected':''}} >Laki-laki</option>  
                <option value="P" {{$data->jenis_kelamin == 'P'? 'selected':''}} >Perempuan</option>  
            </select>
        </div>
    
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" value="{{$data->alamat}}" name="alamat" id="">
        </div>
    
        <div class="form-group">
            <label for="agama">Agama </label>
            <input type="text" value="{{$data->agama}}"  name="agama" id="">
        </div>
        <div class="form-group">
            <label for="=no_telp">No Telepon </label>
            <input type="text" name="no_telp" value="{{$data->kartuKeluarga->no_telepon}}"  id="">
        </div>
    
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan </label>
            <input type="text" name="pekerjaan" value="{{$data->pekerjaan}}"  id="">
        </div>
        <div class="form-group">
            <label for="status_tinggal">Status Tinggal </label>
            <select name="status_tinggal" id="">
                <option value="tetap" {{$data->status_tinggal == 'tetap'? 'selected':''}} >Tetap</option>  
                <option value="kontrak" {{$data->status_tinggal == 'kontrak'? 'selected':''}} >Kontrak</option>  
            </select>
        </div>
    
        <div class="form-group">
            <label for="status_kematian">Status Kematian </label>
            <select name="status_kematian" id="">
                <option value="1" {{$data->status_kematian == '1'? 'selected':''}} >Meninggal</option>  
                <option value="0" {{$data->status_kematian == '0'? 'selected':''}} >Hidup</option>  
            </select>
        </div>
    
    
        <button type="submit">Submit</button>
</body>
</html>