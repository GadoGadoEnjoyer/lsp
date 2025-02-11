<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi List</title>
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
        div{
            display: flex;
            align-items: center;
            justify-content: space-around;
            flex-wrap: wrap;
            flex-direction: column;
            background-color: rgb(50, 50, 46);
            height: 25%;
            width: 75%;
            min-width: fit-content;
        }
    </style>
</head>
<body>
    <form action="/admin/buat/transaksi" method="get">
        <input type="submit" value="Buat Transaksi">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Pinjam</th>
                <th>Kembali</th>
            </tr>
        </thead>
        <tbody>
        @foreach($transaksi as $t)
        <tr>
            <td>{{$t->id}}</td>
            <td>{{$t->user->nis}}</td>
            <td>{{$t->user->nama}}</td> 
            <td>{{$t->user->kelas}}</td> 
            <td>{{$t->user->jurusan}}</td> 
            <td>{{$t->pinjam}}</td>  
            <td>{{$t->kembali}}</td> 
            <td>
            <form action="/admin/transaksi/update/{{$t->id}}" method="get">
                <input type="submit" value="update transaksi">
            </form>
            </td>
            <td>
            <form action="/admin/transaksi/hapus/{{$t->id}}" method="post">
                @csrf
                @method("DELETE")
                <input type="submit" value="delete transaksi">
            </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


</body>
</html>
