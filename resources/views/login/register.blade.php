<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>ini register</h3>

    <form action="/registerr/store" method="post">
        @csrf
        <input type="text" name="name" placeholder="masukkan nama">
        <input type="email" name="email" placeholder="masukkan email">
        <input type="password" name="password" placeholder="masukkan password">
        <button type="submit" value="save" >signup</button>
    </form>
</body>
</html>