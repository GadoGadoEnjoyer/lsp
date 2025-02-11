<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku List</title>
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
            flex-wraP: wrap;
            background-color: rgb(50, 50, 46);
            height: 25%;
            width: 75%;
            min-width: fit-content;
        }
    </style>
</head>
<body>
    <div>
        {{$buku->judul}} oleh {{$buku->pengarang}} diterbitkan oleh {{$buku->penerbit}} di tahun {{$buku->tahun}} dan sedang @if($buku->dipinjam == 0) tidak dipinjam @else dipinjam @endif<br>
        <form action="/buku/pinjam/{{$buku->id}}" method="post">
            @csrf
            <input type="submit" value="Pinjam">
        </form>
    </div>

</body>
<script>document.getElementById('pinjam').valueAsDate = new Date();</script>
</html>
