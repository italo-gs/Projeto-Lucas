@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Chamados</h2>
    <a href="{{ route('chamados.create') }}" class="btn btn-primary">Novo Chamado</a>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('chamados.index') }}" method="GET" class="row g-3">
            <div class="col-md-4">
                <select name="status" class="form-select">
                    <option value="">Todos os Status</option>
                    <option value="aberto" {{ request('status') == 'aberto' ? 'selected' : '' }}>Aberto</option>
                    <option value="em_atendimento" {{ request('status') == 'em_atendimento' ? 'selected' : '' }}>Em Atendimento</option>
                    <option value="resolvido" {{ request('status') == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
                    <option value="fechado" {{ request('status') == 'fechado' ? 'selected' : '' }}>Fechado</option>
                </select>
            </div>
            <div class="col-md-4">
                <select name="prioridade" class="form-select">
                    <option value="">Todas as Prioridades</option>
                    <option value="baixa" {{ request('prioridade') == 'baixa' ? 'selected' : '' }}>Baixa</option>
                    <option value="média" {{ request('prioridade') == 'média' ? 'selected' : '' }}>Média</option>
                    <option value="alta" {{ request('prioridade') == 'alta' ? 'selected' : '' }}>Alta</option>
                </select>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-secondary">Filtrar</button>
                <a href="{{ route('chamados.index') }}" class="btn btn-outline-secondary">Limpar</a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped align-middle">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Prioridade</th>
                    <th>Status</th>
                    <th>Técnico</th>
                    <th>SLA</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($chamados as $chamado)
                <tr>
                    <td>{{ $chamado->id }}</td>
                    <td>{{ $chamado->titulo }}</td>
                    <td>
                        @if($chamado->prioridade == 'alta')
                            <span class="badge bg-danger">Alta</span>
                        @elseif($chamado->prioridade == 'média')
                            <span class="badge bg-warning text-dark">Média</span>
                        @else
                            <span class="badge bg-info text-dark">Baixa</span>
                        @endif
                    </td>
                    <td><span class="badge bg-secondary">{{ ucfirst($chamado->status) }}</span></td>
                    <td>{{ $chamado->tecnico->nome }}</td>
                    <td>
                        @if($chamado->sla_estourado)
                            <span class="text-danger fw-bold" title="Atrasado!">⚠️ Estourado</span>
                        @else
                            <span class="text-success">No prazo</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('chamados.show', $chamado->id) }}" class="btn btn-sm btn-info text-white">Ver</a>
                        <a href="{{ route('chamados.edit', $chamado->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum chamado encontrado.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection