<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>

<body>
    <div>
        <h1>Đăng nhập</h1>
    </div>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div>
            <button type="submit">Đăng nhập</button>
        </div>
    </form>
    <div>
        <label>Bạn chưa có tài khoản?</label>
        <a href="{{route('register-form')}}">Đăng ký</a>
    </div>
</body>

</html>