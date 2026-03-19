@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Editar Categoria: {{ $categoria->nome }}</h2>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            @include('categorias._form')

            <button type="submit" class="btn btn-primary mt-3">Atualizar Categoria</button>
        </form>
    </div>
</div>
@endsection