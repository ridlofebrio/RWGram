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
        <h1 >DATA PENDUDUK</h1>
        @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
@endif
        <a href="/penduduk/create" class="btn btn-primary" >add</a>
        <table class="table">
            <tr>
                <th>
                    NIK
                </th>
                <th>
                    NKK
                </th>
                <th>
                    nama penduduk
                </th>
                <th>
                    tanggal lahir
                </th>
                <th>
                    status perkawinan
                </th>
                <th>
                    jenis kelamin 
                </th>
                <th>
                    alamat    
                </th>     
                <th>
                    agama    
                </th>    
                <th>
                    pekerjaan

                </th>
                <th>
                    status tinggal
                </th>
                <th>
                    status kematian
                </th>
                <th>
                    Action
                </th>
    
            </tr>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->NIK}}</td>
                <td>{{$item->kartuKeluarga->NKK}}</td>
                <td>{{$item->nama_penduduk}}</td>
                <td>{{$item->tanggal_lahir}}</td>
                <td>{{$item->status_perkawinan}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->agama}}</td>
                <td>{{$item->pekerjaan}}</td>
                <td>{{$item->status_tinggal}}</td>
                <td>{{$item->status_kematian=== 1?'Mati':'Hidup'}}</td>
                <td class="">
                    <div class="d-flex gap-3">
                        <a href="/penduduk/{{$item->penduduk_id}}/edit" class="btn btn-success" >edit</a>
                        <a href="/penduduk/{{$item->penduduk_id}}" class="btn btn-primary" >Detail</a>
                        <form action="{{url('penduduk/'.$item->penduduk_id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah anda ingin menghapus data ini ?')" >Delete</button>
                        </form>

                    </div>
                   
                </td>
            </tr>
            @endforeach
            
        </table>
    
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</nama_penduduk