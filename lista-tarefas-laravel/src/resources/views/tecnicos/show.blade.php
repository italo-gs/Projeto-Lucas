@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Detalhes do Técnico</h2>
    <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-header bg-dark text-white">
        Informações do Registro
    </div>
    <div class="card-body">
        <h5 class="card-title"><strong>ID:</strong> {{ $tecnico->id }}</h5>
        <p class="card-text mt-3"><strong>Nome:</strong> {{ $tecnico->nome }}</p>
        <p class="card-text"><strong>E-mail:</strong> {{ $tecnico->email }}</p>
        <p class="card-text"><strong>Especialidade:</strong> {{ $tecnico->especialidade }}</p>
        
        <div class="mt-4">
            <a href="{{ route('tecnicos.edit', $tecnico->id) }}" class="btn btn-warning">Editar</a>
            
            <form action="{{ route('tecnicos.destroy', $tecnico->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Excluir</button>
            </form>
        </div>
    </div>
</div>
@endsection