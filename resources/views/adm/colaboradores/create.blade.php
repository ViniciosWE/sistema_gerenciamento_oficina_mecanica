@extends('adm.layout.layout')

@section('title', isset($user) ? 'Editar Colaborador - Oficina VW' : 'Cadastrar Colaborador - Oficina VW')
@section('page-title', isset($user) ? 'Editar Colaborador' : 'Cadastrar Colaborador')


@section('content')

    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                {{ isset($user) ? 'Editar colaborador' : 'Cadastrar novo colaborador' }}
            </h4>

            @if($errors->any())
                <div class="alert alert-danger auto-close">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST"
                action="{{ isset($user) ? route('colaboradores.update', $user->id) : route('colaboradores.store') }}">
                @csrf
                @if(isset($user))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name ?? '') }}"
                        required placeholder="Digite o nome do colaborador">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email ?? '') }}"
                        required placeholder="Digite o email do colaborador">
                </div>

                <div class="mb-3">
                    <label class="form-label">Perfil</label>
                    <select name="role" class="form-select" required>
                        <option value="mecanico" {{ old('role', $user->role ?? '') === 'mecanico' ? 'selected' : '' }}>
                            Mecânico</option>
                        <option value="caixa" {{ old('role', $user->role ?? '') === 'caixa' ? 'selected' : '' }}>Caixa
                        </option>
                        <option value="admin" {{ old('role', $user->role ?? 'mecanico') === 'admin' ? 'selected' : '' }}>
                            Admin</option>


                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" {{ isset($user) ? '' : 'required' }}
                        placeholder="Digite a senha do colaborador">
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirmar Senha</label>
                    <input type="password" name="password_confirmation" class="form-control" {{ isset($user) ? '' : 'required' }} placeholder="Confirme a senha do colaborador">
                </div>
                @if(isset($user))
                    <div class="mb-3 text-muted">
                        Deixe a senha em branco para manter a senha atual.
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('colaboradores.index') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">
                        {{ isset($user) ? 'Atualizar' : 'Cadastrar' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection