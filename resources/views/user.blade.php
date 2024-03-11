<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data user</title>
</head>
<body>
    <h1>Data user</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Id level pengguna</th>
            <th>aksi</th>

        </tr>
        {{-- @foreach ($data as $d) --}}
        @foreach ($data as $d)
            <tr>
                {{-- <td>{{$data->user_id}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->level_id}}</td> --}}
                <td>{{$d->user_id}}</td>
                <td>{{$d->username}}</td>
                <td>{{$d->nama}}</td>
                <td>{{$d->level_id}}</td>
                <td><a href={{route('/user/ubah',$d->user_id)}}>Ubah</a> | <a href={{ route('/user/hapus',$d->user_id)}}>Hapus</a></td>
            </tr>

        @endforeach

        <a href={{route('/user/tambah',$d->user_id)}}>tambah</a>


        {{-- <tr>
            <th>jumlah pengguna</th>
        </tr>
        <tr>
            <td>{{$data}}</td>
        </tr> --}}

        
    </table>   
</body>
</html>
