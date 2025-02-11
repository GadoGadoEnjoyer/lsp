<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
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
    <form action="/admin/user/update/{{$siswa->id}}" method="POST">
        @csrf
        @method('PATCH')
        <label for="nis">NIS:</label>
        <input type="text" name="nis" value="{{$siswa->nis}}" required>
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{$siswa->nama}}" required>
        <label for="kelas">Kelas:</label>
        <input type="text" name="kelas" value="{{$siswa->kelas}}" required>
        <label for="jurusan">Jurusan:</label>
        <input type="text" name="jurusan" value="{{$siswa->jurusan}}" required>
        <label for="username">Username:</label>
        <input type="text" name="username" value="{{$siswa->username}}" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <label for="admin">IsanAdmin?:</label>
        <input type="number" name="admin" value="{{$siswa->admin}}" max=1 min=0 required>
        <input type="submit"><br>
    </form>
</body>
</html>
