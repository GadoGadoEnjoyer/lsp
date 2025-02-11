<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
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
    <form action="/admin/buat/buku" method="POST">
        @csrf
        <label for="kode">Kode:</label>
        <input type="text" id="kode" name="kode" required><br>
        <label for="judul">Judul:</label>
        <input type="text" id="judul" name="judul" required><br>
        <label for="pengarang">Pengarang:</label>
        <input type="text" id="pengarang" name="pengarang" required><br>
        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" required><br>
        <label for="tahun">Tahun:</label>
        <input type="text" id="tahun" name="tahun" required><br>
        <input type="submit"><br>
    </form>
</body>
</html>
