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
        @foreach($buku as $buck)
            {{$buck->judul}} oleh {{$buck->pengarang}}<br>
            <form action="/buku/{{$buck->id}}" method="get">
                <input type="submit" value="view detail">
            </form>
        @endforeach
    </div>

</body>
</html>
