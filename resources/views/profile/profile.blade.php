<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <ladel>Имя {{$profile->name}}</ladel>

    <ladel>Пользователь {{$profile->name}}</ladel>

    <ladel>Возраст {{$profile->integer}}</ladel>

    <ladel>Ваш город Донецк? {{$profile->boolean?"Да":"Нет"}}</ladel>

    <ladel>Ваша цель {{$profile->json}}</ladel>
    <form action="/profile/{{$profile->id}}" method="post">
        @method("delete")
        @csrf

        <button type="submit">Delete</button>
    </form>
</div>


</body>
</html>
