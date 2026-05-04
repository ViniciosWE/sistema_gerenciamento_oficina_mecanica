@extends('adm.layout.layout')

@section('title', 'Cadastrar Peça na OS - Oficina VW')
@section('page-title', 'Cadastrar peça na ordem de serviço')


@section('content')
    <div class="col-md-6 mx-auto">
        <div class="p-4 card-body border border-3 border-danger rounded-4 glow">
            <h4 class="card-title mb-4 text-center">
                Cadastrar nova peça na ordem de serviço
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

            <form method="POST" action="{{ route('os.pecas.store', $ordemServico) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Peça</label>
                    <select name="peca_id" class="form-select" required>
                        <option value="">Selecione</option>
                        @foreach($pecas as $p)
                            <option value="{{ $p->id }}">
                                {{ $p->nome }} (R$ {{ number_format($p->preco, 2, ',', '.') }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Quantidade</label>
                    <input type="number" name="quantidade" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('os.index') }}" class="btn btn-secondary">Voltar</a>
                    <button class="btn btn-primary">Cadastrar</button>
                </div>

            </form>

        </div>
    </div>
    <script src="{{ asset('js/script.js') }}"></script>
@endsection