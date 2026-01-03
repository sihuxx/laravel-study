<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="이름">
        <input type="email" name="email" placeholder="이메일">
        <input type="password" name="password" placeholder="비밀번호">
        
        <button>회원가입</button>
    </form>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="email" name="email" placeholder="이메일">
        <input type="password" name="password" placeholder="비밀번호">
    
        <button>로그인</button>
        @error('email')
            <div style="color:red">{{ $message }}</div>
        @enderror
    </form>
</body>
</html>