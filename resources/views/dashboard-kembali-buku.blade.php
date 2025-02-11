<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengembalian</title>
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
        @foreach ($transaksi as $t)
            Kembalikan buku yang kamu pinjam di {{$t->pinjam}}
            <form action="/kembalikan/{{$t->id}}" method="post">
                @csrf
                <input type="submit" value="balikin">
            </form>
        @endforeach
    </div>

</body>
</html>
