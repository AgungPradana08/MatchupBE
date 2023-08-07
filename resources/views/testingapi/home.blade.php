<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>halo dek</h1>
    <h1>Halo Juga</h1>
    <ul>
        @foreach ($data as $item)
          <li>{{ $item['title'] }} - {{ $item['nama_tim'] }}</li>
        @endforeach
      </ul>
</body>
</html>