<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ini tambah</h1>

   

    <form action="/kas" method="POST">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="kartu_keluarga">Kartu Keluarga ID</label>
            <input type="text" name="kartu_keluarga" id="">
        </div>
        <div class="form-group">
            <label for="kas">Jumlah Kas</label>
            <input type="text" name="kas" id="">
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal Kas</label>
            <input type="date" name="tanggal" id="">
        </div>

        <button type="submit">Submit</button>

    </form>
</body>
</html>