<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
    <link rel="stylesheet" href="/pain.css">
    <style>
        html,body{
            margin: 0;
            padding: 0;
            height: 100vh;
            width: 100vw;
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wraP: wrap;
            background-color: rgb(50, 50, 46);
        }
        form{
            display: flex;
            flex-direction: column;
            height: 60%;
            width: 20%;
            background-color: #dad6d8;
            padding: 1%;
            border-radius: 2%;
            min-width: fit-content;
        }
    </style>
</head>
<body>
    <form action="/admin/transaksi/update/{{$transaksi->id}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="siswa">Siswa</label>
        <input type="number" name="siswa" value="{{$transaksi->siswa}}">
        <label for="buku">Buku</label>
        <input type="number" name="buku" value="{{$transaksi->buku}}">
        <label for="pinjam">Pinjam</label>
        <input type="date" name="pinjam" value="{{$transaksi->pinjam}}">
        <label for="kembali">Kembali</label>
        <input type="date" name="kembali" value="{{$transaksi->kembali}}">
        <input type="submit"><br>
    </form>
</body>
</html>
