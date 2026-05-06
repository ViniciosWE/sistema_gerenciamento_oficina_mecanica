<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/f.ico') }}" type="image/x-icon">
    <title>@yield('title', 'Dashboard ADM')</title>
</head>

<body>
    <div class="d-flex min-vh-100">
        <aside class="sidebar">
            <img src="{{ asset('img/Logo.png') }}" alt="Logo da oficina">

            <nav class="nav flex-column">

                @auth

                    <a href="{{ route('adm.dashboard') }}"
                        class="text-white nav-link {{ request()->routeIs('adm.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-house p-1"></i> Dashboard
                    </a>

                    @if(in_array(auth()->user()->role, ['admin']))
                        <a href="{{ route('colaboradores.index') }}"
                            class="text-white nav-link {{ request()->is('colaboradores*') ? 'active' : '' }}">
                            <i class="bi bi-person-badge p-1"></i> Colaboradores
                        </a>

                        <a href="{{ route('relatorios.index') }}"
                            class="text-white nav-link {{ request()->is('relatorios*') ? 'active' : '' }}">
                            <i class="bi bi-file-earmark-pdf p-1"></i> Relatórios
                        </a>
                    @endif

                    @if(in_array(auth()->user()->role, ['admin', 'caixa']))

                        <a href="{{ route('clientes.index') }}"
                            class="text-white nav-link {{ request()->is('clientes*') ? 'active' : '' }}">
                            <i class="bi bi-people p-1"></i> Clientes
                        </a>

                        <a href="{{ route('veiculos.index') }}"
                            class="text-white nav-link {{ request()->is('veiculos*') ? 'active' : '' }}">
                            <i class="bi bi-car-front p-1"></i> Veículos
                        </a>

                        <a href="{{ route('servicos.index') }}"
                            class="text-white nav-link {{ request()->is('servicos*') ? 'active' : '' }}">
                            <i class="bi bi-tools p-1"></i> Serviços
                        </a>

                        <a href="{{ route('pecas.index') }}"
                            class="text-white nav-link {{ request()->is('pecas*') ? 'active' : '' }}">
                            <i class="bi bi-gear p-1"></i> Peças
                        </a>

                    @endif

                    @if(in_array(auth()->user()->role, ['admin', 'caixa', 'mecanico']))
                        <a href="{{ route('os.index') }}"
                            class="text-white nav-link {{ request()->is('os*') ? 'active' : '' }}">
                            <i class="bi bi-clipboard-check p-1"></i> Ordens de Serviço
                        </a>
                    @endif

                    <div class="mt-auto"></div>

                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link text-white w-100 text-start border-0 bg-transparent">
                            <i class="bi bi-box-arrow-right p-1"></i> Sair
                        </button>
                    </form>

                @endauth

            </nav>
        </aside>
        <main class="flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
                <span class="navbar-brand mb-0 h1 p-3">
                    @yield('page-title', 'Dashboard')
                </span>

                @auth
                    <span class="navbar-text ms-auto me-3">
                        Bem-vindo, {{ Auth::user()->name }}!
                    </span>
                @endauth
            </nav>
            @if(session('success'))
                <div class="alert alert-success auto-close m-3">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger auto-close m-3">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>