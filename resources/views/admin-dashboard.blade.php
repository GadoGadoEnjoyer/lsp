<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/pain.css">
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
        input{
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
<div>
    <form action="/admin/buku" method="GET">
        <input type="submit" value="CRUD BUKU">
    </form>
    <form action="/admin/user" method="GET">
        <input type="submit" value="CRUD USER">
    </form>
    <form action="/admin/transaksi" method="GET">
        <input type="submit" value="CRUD TRANSAKSI">
    </form>
</div>
</body>
</html>
