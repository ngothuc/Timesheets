<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <div>
        <h1>Đăng ký</h1>
    </div>
    <div>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <label for="name">Tên người dùng</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Mật khẩu</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div>
                <button type="submit">Đăng ký</button>
            </div>
        </form>
    </div>
    </div>
</body>
</html>