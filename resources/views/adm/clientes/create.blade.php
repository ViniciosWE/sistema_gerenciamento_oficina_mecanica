@extends('adm.layout.layout')

@section('title', isset($cliente) ? 'Editar Cliente - Oficina VW' : 'Cadastrar Cliente - Oficina VW')
@section('page-title', isset($cliente) ? 'Editar Cliente' : 'Cadastrar Cliente')


@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                {{ isset($cliente) ? 'Editar Cliente' : 'Cadastrar novo Cliente' }}
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
                action="{{ isset($cliente) ? route('clientes.update', $cliente->id) : route('clientes.store') }}">
                @csrf
                @if(isset($cliente))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Nome</label>
                    <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome ?? '') }}"
                        required placeholder="Digite o nome do cliente">
                </div>

                <div class="mb-3">
                    <label class="form-label">Telefone</label>
                    <input type="number" name="telefone" class="form-control"
                        value="{{ old('telefone', $cliente->telefone ?? '') }}" placeholder="Digite o telefone do cliente">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email', $cliente->email ?? '') }}"
                        required placeholder="Digite o email do cliente">
                </div>

                <div class="mb-3">
                        <label class="form-label">Endereço</label>
                        <textarea name="endereco" class="form-control" rows="4" placeholder="Digite o endereço do cliente">{{ old('endereco', $cliente->endereco ?? '') }}</textarea>
                    </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ url('/clientes') }}" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-primary">{{ isset($cliente) ? 'Atualizar' : 'Cadastrar' }}</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>

@endsection