<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('img/f.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Login</title>
</head>

<body>
    <main class="d-flex flex-column align-items-center justify-content-center">
        <img src="{{ asset('img/logo.png') }}" alt="Logo da Oficina">

        <div class="card login-card shadow p-4">
            <h3 class="text-center mb-4">Área de Login</h3>
            @if ($errors->any())
                <div class="alert alert-danger auto-close">
                    {{ $errors->first() }}
                </div>
            @endif
            <form action="/login" method="post">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite seu email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" placeholder="Digite sua senha" required>
                </div>
                <button type="submit" class="btn btn-danger w-100">Entrar</button>
                <a href="/" class="btn btn-dark w-100 mt-2">Voltar</a>
            </form>
        </div>

    </main>
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>