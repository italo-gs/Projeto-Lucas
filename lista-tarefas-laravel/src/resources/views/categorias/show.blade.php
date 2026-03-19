@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detalhes da Categoria</h2>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-header bg-dark text-white">
        Informações do Registro
    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>ID:</strong> {{ $categoria->id }}</h5>
        <p class="card-text mt-3"><strong>Nome do Problema:</strong> {{ $categoria->nome }}</p>
        <p class="card-text"><strong>SLA (Prazo Estimado):</strong> {{ $categoria->sla_horas }} horas</p>
        <p class="card-text"><strong>Criado em:</strong> {{ $categoria->created_at->format('d/m/Y H:i') }}</p>
        <p class="card-text"><strong>Última Atualização:</strong> {{ $categoria->updated_at->format('d/m/Y H:i') }}</p>
        
        <div class="mt-4">
            <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>
            
            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection