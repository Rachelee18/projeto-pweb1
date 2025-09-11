<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aluno</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login-box">
        <h2>Login</h2>
        <form action="{{ route('home.aluno') }}" method="post">
            @csrf
            <input type="text" name="user" placeholder="User or Email" required>
            <input type="password" name="password" placeholder="Your Password" required>
            <button type="submit">Enter</button>
        </form>
    </div>
</body>
</html>
