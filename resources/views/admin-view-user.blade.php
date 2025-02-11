<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
         html,body{
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
            background-color: rgb(50, 50, 46);
            display: flex;
            align-items: center;
            justify-content: center;
            color:white;
        }
        table{
            background-color: rgb(50, 50, 46);
            height: 25%;
            width: 75%;
            min-width: fit-content;
        }
        th,
        td {
            border: 1px solid rgb(160 160 160);
            padding: 8px 10px;
        }
    </style>
</head>
<body>
    <form action="/admin/buat/buku" method="get">
        <input type="submit" value="Buat user baru">
    </form>
    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Username</th>
                <th>Level</th>
            </tr>
        </thead>
        <tbody>
        @foreach($siswa as $s)
        <tr>
            <td>{{$s->nis}}</td>
            <td>{{$s->nama}}</td>
            <td>{{$s->kelas}}</td>
            <td>{{$s->jurusan}}</td>
            <td>{{$s->username}}</td>
            @if($s->admin == 1)
            <td>Admin</td>
            @else
            <td>Non Admin</td>
            @endif
            <td>
            <form action="/admin/user/update/{{$s->id}}" method="get">
                <input type="submit" value="update user">
            </form>
            </td>
            <td>
            <form action="/admin/user/hapus/{{$s->id}}" method="post">
                @csrf
                @method("DELETE")
                <input type="submit" value="delete user">
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

</body>
</html>
