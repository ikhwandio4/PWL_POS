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

        </tr>
        {{-- @foreach ($data as $d) --}}
            <tr>
                <td>{{$data->user_id}}</td>
                <td>{{$data->username}}</td>
                <td>{{$data->nama}}</td>
                <td>{{$data->level_id}}</td>
            </tr>
        {{-- @endforeach --}}
    </table>   
</body>
</html>
