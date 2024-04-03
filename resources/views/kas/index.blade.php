<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    
   
   
    <div class="container pt-5">
        <h1 >DATA KAS</h1>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
        <a href="/kas/create" class="btn btn-primary" >add</a>
        <table class="table">
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
                <td class="d-flex gap-3">
                    <a href="/kas/{{$item->kas_id}}/edit" class="btn btn-success" >edit</a>
                    <a href="/kas/{{$item->kas_id}}" class="btn btn-primary" >Detail</a>
                    <form action="{{url('kas/'.$item->kas_id)}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" >Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            
        </table>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>