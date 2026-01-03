<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('update', $msg->id) }}" method="POST">
        @csrf

        <input type="text" name="name" value="{{ $msg->name }}">
        <button>수정</button>
    </form>
</body>
</html>