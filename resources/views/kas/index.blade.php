<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <a href="/kas/create">add</a>

    <table>
        <tr>
            <th>
                kas id
            </th>
            <th>
                kartu keluarga id
            </th>
            <th>
                jumlah kas
            </th>
            <th>
                tanggal kas
            </th>
            <th>
                Action
            </th>

        </tr>
        @foreach ($data as $item)
        <tr>
            <td>{{$item->kas_id}}</td>
            <td>{{$item->kartu_keluarga_id}}</td>
            <td>{{$item->jumlah_kas}}</td>
            <td>{{$item->tanggal_kas}}</td>
            <td>
                <a href="">edit</a>
                <a href="">delete</a>
            </td>
        </tr>
        @endforeach
        
    </table>
</body>
</html>