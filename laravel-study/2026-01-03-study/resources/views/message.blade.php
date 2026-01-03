<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        li {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <a href="{{ route('auth') }}">회원가입/로그인</a>
        <form action="{{ route('message') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="메시지">
        <input type="file" name="image">
        <button>전송</button>
    </form>
    <ul>
        @foreach($msgs as $msg)
        <li>
            @if($msg->image)
            <img src="{{ asset('storage/' . $msg->image) }}" width="200px" alt="">
            @endif

            {{ $msg->name }}
            <a href="{{ route('edit', $msg->id) }}">수정</a>
            <form action="{{ route('destroy', $msg->id) }}" method="POST">@csrf <button>X</button></form>
        </li>
        @endforeach
    </ul>
</body>
</html>
