@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Novo Chamado</h2>
    <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('chamados.store') }}" method="POST">
            @csrf 
            
            @include('chamados._form')

            <button type="submit" class="btn btn-success mt-4">Abrir Chamado</button>
        </form>
    </div>
</div>
@endsection