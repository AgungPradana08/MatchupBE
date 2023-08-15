<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>CHECKOUT MABAR</h1>

    <form action="/checkout/store" method="post">
        @csrf
        <label for="nama">nama</label>
        <input type="text" name="nama"><br>
        <label for="alamat">alamat</label>
        <input type="text" name="alamat"><br>
        <label for="nomor_telepon">nomor telepon</label>
        <input type="text" name="nomor_telepon"><br>
    </form>

</body>
</html>