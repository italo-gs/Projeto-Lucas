@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Nova Categoria</h2>
    <a href="{{ route('categorias.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('categorias.store') }}" method="POST">
            @csrf 
            
            @include('categorias._form')

            <button type="submit" class="btn btn-success mt-3">Salvar Categoria</button>
        </form>
    </div>
</div>
@endsection