<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            height: 40%;
            width: 15%;
            min-width: fit-content;
            background-color: #dad6d8;
            padding: 1%;
            border-radius: 2%;
        }
        #why{
            margin-top: 50%;
        }
    </style>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id  ="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" id="why"><br>
    </form>
</body>
</html>
