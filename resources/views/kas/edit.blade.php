<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{url('/kas/'.$data->kas_id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kartu_keluarga">Kartu Keluarga ID</label>
            <input type="text" name="kartu_keluarga"  value="{{$data->kartu_keluarga_id}}" id="">
        </div>
        <div class="form-group">
            <label for="kas">Jumlah Kas</label>
            <input type="text" name="kas" value="{{$data->jumlah_kas}}"  id="">
        </div>
    
        <div class="form-group">
            <label for="tanggal">Tanggal Kas</label>
            <input type="date" name="tanggal" value="{{$data->tanggal_kas}}" id="">
        </div>
      
    
        <button type="submit">Submit</button>

    </form>
</body>
</html>