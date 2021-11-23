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

@isset($errors)
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endisset


<form action="/profile/{{$profile->id}}" method="post">
    @csrf
    @method("PUT")
    <div>
        <ladel>Имя</ladel>
        <input type="text" name="name" value="{{$profile->name}}">
    </div>

    <div>
        <ladel>Пользователь</ladel>
        <select name="user_id" id="">
            @foreach($users as $user)
                @if($user->id == $profile->user_id)
                    <option value="{{$user->id}}" selected>{{$user->name}}</option>
                @else
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div>
        <ladel>Возраст</ladel>
        <input type="number" name="integer" value="{{$profile->integer}}">
    </div>
    <div>
        <ladel>Ваш город Донецк?</ladel>
        <input type="checkbox" name="boolean" {{$profile->boolean?"checked":""}}>
    </div>
    <div>
        <ladel>Ваша цель</ladel>
        <input type="text" name="json" value="{{$profile->json}}">
    </div>
    <button type="submit">Отправить</button>
</form>
</body>
</html>
