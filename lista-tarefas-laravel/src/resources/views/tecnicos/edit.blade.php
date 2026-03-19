@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Editar Técnico: {{ $tecnico->nome }}</h2>
    <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tecnicos.update', $tecnico->id) }}" method="POST">
            @csrf
            @method('PUT') 
            
            @include('tecnicos._form')

            <button type="submit" class="btn btn-primary mt-3">Atualizar Técnico</button>
        </form>
    </div>
</div>
@endsection