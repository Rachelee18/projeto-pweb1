<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar como</title>
    <link rel="stylesheet" href="{{ asset('css/select-role.css') }}">
</head>

<body>
    <div class="container">
        <h2>Acessar como:</h2>
        <div class="options">
            <a href="{{ route('login.aluno') }}" class="card">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="40" height="40">
                        <path
                            d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                    </svg>
                </span>
                <p>Aluno</p>
            </a>

            <a href="{{ route('login.bibliotecario') }}" class="card">
                <span class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="40" height="40">
                        <path
                            d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z" />
                    </svg>
                </span>
                <p>Bibliotecário</p>
            </a>
        </div>
    </div>
</body>

</html>