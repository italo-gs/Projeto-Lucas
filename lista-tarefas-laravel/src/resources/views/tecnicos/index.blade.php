@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Técnicos</h2>
    <a href="{{ route('tecnicos.create') }}" class="btn btn-primary">Novo Técnico</a>
</div>

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tecnicos as $tecnico)
                <tr>
                    <td>{{ $tecnico->id }}</td>
                    <td>{{ $tecnico->nome }}</td>
                    <td>{{ $tecnico->email }}</td>
                    <td>{{ $tecnico->especialidade }}</td>
                    <td>
                        <a href="{{ route('tecnicos.show', $tecnico->id) }}" class="btn btn-sm btn-info text-white">Ver</a>
                        <a href="{{ route('tecnicos.edit', $tecnico->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('tecnicos.destroy', $tecnico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhum técnico cadastrado ainda.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection