<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
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
    <form action="/admin/buku/update/{{$buku->id}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="kode">Kode:</label>
        <input type="text" id="kode" name="kode" value="{{$buku->kode}}"required><br>
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" value="{{$buku->judul}}" required><br>
        <label for="pengarang">Pengarang:</label>
        <input type="text" id="pengarang" name="pengarang" value="{{$buku->pengarang}}" required><br>
        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" value="{{$buku->penerbit}}" required><br>
        <label for="tahun">Tahun:</label>
        <input type="text" id="tahun" name="tahun"value="{{$buku->tahun}}" required><br>
        <label for="dipinjam">Dipinjam (1 or 0):</label>
        <input type="number" id="dipinjam" name="dipinjam" value="{{$buku->dipinjam}}" required><br>
        <input type="submit"><br>
    </form>
</body>
</html>
