@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detalhes do Chamado #{{ $chamado->id }}</h2>
    <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
        <span>Informações do Registro</span>
        @if($chamado->sla_estourado)
            <span class="badge bg-danger">SLA Atrasado</span>
        @else
            <span class="badge bg-success">No Prazo</span>
        @endif
    </div>
    <div class="card-body">
        <h4 class="card-title">{{ $chamado->titulo }}</h4>
        <hr>
        
        <div class="row mb-3">
            <div class="col-md-3">
                <strong>Prioridade:</strong><br>
                <span class="badge bg-{{ $chamado->prioridade == 'alta' ? 'danger' : ($chamado->prioridade == 'média' ? 'warning text-dark' : 'info text-dark') }}">
                    {{ ucfirst($chamado->prioridade) }}
                </span>
            </div>
            <div class="col-md-3">
                <strong>Status:</strong><br>
                <span class="badge bg-secondary">{{ ucfirst($chamado->status) }}</span>
            </div>
            <div class="col-md-3">
                <strong>Data de Abertura:</strong><br>
                {{ $chamado->data_abertura->format('d/m/Y') }}
            </div>
            <div class="col-md-3">
                <strong>Técnico Responsável:</strong><br>
                {{ $chamado->tecnico->nome }}
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Categoria do Problema:</strong><br>
                {{ $chamado->categoria->nome }} (SLA Estimado: {{ $chamado->categoria->sla_horas }}h)
            </div>
        </div>

        <div class="mb-4">
            <strong>Descrição do Problema:</strong>
            <div class="p-3 bg-light border rounded mt-2">
                {!! nl2br(e($chamado->descricao)) !!}
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('chamados.edit', $chamado->id) }}" class="btn btn-warning">Editar</a>
            
            <form action="{{ route('chamados.destroy', $chamado->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este chamado?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-muted text-end">
        Criado em: {{ $chamado->created_at->format('d/m/Y H:i') }} | Última atualização: {{ $chamado->updated_at->format('d/m/Y H:i') }}
    </div>
</div>
@endsection