@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Editar Chamado #{{ $chamado->id }}</h2>
    <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
</div>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('chamados.update', $chamado->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            @include('chamados._form')

            <button type="submit" class="btn btn-primary mt-4">Atualizar Chamado</button>
        </form>
    </div>
</div>
@endsection