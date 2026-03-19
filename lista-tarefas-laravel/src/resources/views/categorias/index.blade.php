@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Categorias de Chamados</h2>
    <a href="{{ route('categorias.create') }}" class="btn btn-primary">Nova Categoria</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>SLA (Horas)</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nome }}</td>
                    <td>{{ $categoria->sla_horas }}h</td>
                    <td>
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Nenhuma categoria cadastrada ainda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection