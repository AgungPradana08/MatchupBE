<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>ini tambah data versus</h1>
    <form action="/usersparring/versus/{{$versus->id}}" method="POST">
        @method('put')
        @csrf
        <input name="nama_tim_lawan" type="text" placeholder="masukkan nama..."><br>
        <button type="submit" value="save">ambil sparring</button>
    </form>
</body>
</html>