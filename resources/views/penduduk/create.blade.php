<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html> <form action="/penduduk" method="POST">
    @csrf
    @method('POST')
    <div class="form-group">
        <label for="nkk">NKK</label>
        <input type="text" name="nkk" id="">
    </div>
    <div class="form-group">
        <label for="rt">RT</label>
        <input type="number" name="rt" id="">
    </div>
    <div class="form-group">
        <label for="nik">NIK</label>
        <input type="text" name="nik" id="">
    </div>

    <div class="form-group">
        <label for="nama">nama </label>
        <input type="text" name="nama" id="">
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">tanggal lahir </label>
        <input type="date" name="tanggal_lahir" id="">
    </div>

    <div class="form-group">
        <label for="perkawinan">status perkawinan </label>
        <select name="perkawinan" id="">
            <option value="kawin">Kawin </option>  
            <option value="belum kawin">Belum Kawin</option>  
            <option value="cerai">Cerai</option>  

        </select>
    </div>

    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin </label>
        <select name="jenis_kelamin" id="">
            <option value="L">Laki-laki</option>  
            <option value="P">Perempuan</option>  
        </select>
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="">
    </div>

    <div class="form-group">
        <label for="agama">Agama </label>
        <input type="text" name="agama" id="">
    </div>
    <div class="form-group">
        <label for="=no_telp">No Telepon </label>
        <input type="text" name="no_telp" id="">
    </div>

    <div class="form-group">
        <label for="pekerjaan">Pekerjaan </label>
        <input type="text" name="pekerjaan" id="">
    </div>
    <div class="form-group">
        <label for="status_tinggal">Status Tinggal </label>
        <select name="status_tinggal" id="">
            <option value="tetap">Tetap</option>  
            <option value="kontrak">Kontrak</option>  
        </select>
    </div>

    <div class="form-group">
        <label for="status_kematian">Status Kematian </label>
        <select name="status_kematian" id="">
            <option value="1">Meninggal</option>  
            <option value="0">Hidup</option>  
        </select>
    </div>


    <button type="submit">Submit</button>

</form>