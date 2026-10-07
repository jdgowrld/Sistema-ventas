<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('categoria.create')}}" method="POST">
        <input type="text" name="Categoria" placeholder="ingresa una categoria">
        @error('categoria')
            <small>{{$message}}</small>
        @enderror
        <button type="submit">
Guardad
        </button>
    </form>
</body>
</html>